<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Fleur;
use App\Models\FleurProduit;
use App\Models\Produit;
use App\Models\TypeProduit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produits = Produit::orderBy('date_creation', 'DESC')->get();
        return view('produits.index', [
            'produits' => $produits,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('produits.create', [
            "typeProduits" => TypeProduit::all(),
            "categories" => Categorie::all(),
            "fleurs" => Fleur::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->validate([
            "prix-vente-produit" => "required|numeric|between:0.00,99999999.99",
            "type-produit" => "required|int",
            "categorie-produit" => "required|int",
            "fleur-produit" => "required|array",
            "quantite-fleur-produit" => "required|int"
        ])) {
            $prix_vente = $request->input('prix-vente-produit');
            $type_produit_id = $request->input('type-produit');
            $categorie_id = $request->input('categorie-produit');
            $produit = new Produit();
            $produit->prix_vente = $prix_vente;
            $produit->type_produit_id = $type_produit_id;
            $produit->categorie_id = $categorie_id;
            $produit->save();
            $quantite_fleur = $request->input("quantite-fleur-produit");
            foreach ($request->input("fleur-produit") as $fleur_id) {
                $produit->fleurs()->attach($fleur_id, [
                    "quantite_fleur" => $quantite_fleur
                ]);
            }
            return redirect()->route("produits.index");
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $produit = Produit::find($id);
        return view('produits.show', [
            'produit' => $produit
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $produit = Produit::find($id);
        $typeProduits = TypeProduit::all();
        $categories = Categorie::all();
        $fleurs = Fleur::all();
        return view('produits.edit', [
            'produit' => $produit,
            'typeProduits' => $typeProduits,
            'categories' => $categories,
            'fleurs' => $fleurs
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->validate([
            "prix-vente-produit" => "required|numeric|between:0.00,99999999.99",
            "type-produit" => "required|int",
            "categorie-produit" => "required|int",
        ])) {
            $prix_vente = $request->input('prix-vente-produit');
            $type_produit_id = $request->input('type-produit');
            $categorie_id = $request->input('categorie-produit');
            $produit = Produit::find($id);
            $produit->prix_vente = $prix_vente;
            $produit->type_produit_id = $type_produit_id;
            $produit->categorie_id = $categorie_id;
            $produit->save();
            return redirect()->route("produits.show", $id);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $produit = Produit::find($id);
        foreach ($produit->fleurs as $fleur) {
            # code...
            $produit->fleurs()->detach($fleur->id);
        }
        Produit::destroy($id);
        return redirect()->route("produits.index");
    }

    /**
     * Attache une adresse a un client.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function attach(Request $request, $id_produit)
    {
        //TODO
        if ($request->validate([
            "fleur-produit" => "required|array",
            "quantite-fleur-produit" => "required|int"
        ])) {
            $quantite_fleur = $request->input("quantite-fleur-produit");
            $produit = Produit::find($id_produit);
            foreach ($request->input("fleur-produit") as $id_fleur) {
                if ($produit->fleurs->contains($id_fleur)) {
                    if ($produit->fleurs->find($id_fleur)->pivot->quantite_fleur != $quantite_fleur) {
                        $produit->fleurs->find($id_fleur)->pivot->quantite_fleur = $quantite_fleur;
                        $produit->fleurs->find($id_fleur)->pivot->save();
                    }
                } else {
                    $produit->fleurs()->attach([
                        $id_fleur => [
                            "quantite_fleur" => $quantite_fleur
                        ]
                    ]);
                }
            }
            return redirect()->route("produits.index");
        } else {
            return redirect()->route("produits.edit", $id_produit);
        }
    }


    /**
     * Detache une adresse a un client.
     * @param  int  $id_client
     * @param  int  $id_adresse
     * @return \Illuminate\Http\Response
     */
    public function detach($id_produit, $id_fleur)
    {
        $produit = Produit::find($id_produit);
        $produit->fleurs()->detach($id_fleur);
        return redirect()->back();
    }
}
