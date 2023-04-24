<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use App\Models\Fleur;
use App\Models\Produit;
use App\Models\TypeProduit;
use App\Models\Unite;
use Illuminate\Http\Request;

class FleurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fleurs = Fleur::orderBy('quantite_stock', 'ASC')->get();
        return view('fleurs.index', [
            'fleurs' => $fleurs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $couleurs = Couleur::all();
        $unites = Unite::all();
        return view('fleurs.create', [
            'couleurs' => $couleurs,
            'unites' => $unites
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->validate([
            "nom-fleur" => "required|string|max:45",
            "quantite-stock-fleur" => "required|int",
            "couleur-fleur" => "required|int",
            "unite-fleur" => "required|int",
        ])) {
            $nom_fleur = $request->input('nom-fleur');
            $quantite_stock = $request->input("quantite-stock-fleur");
            $couleur_fleur = $request->input("couleur-fleur");
            $unite_fleur = $request->input("unite-fleur");
            $fleur = new Fleur();
            $fleur->nom_fleur = $nom_fleur;
            $fleur->quantite_stock = $quantite_stock;
            $fleur->couleur_id = $couleur_fleur;
            $fleur->unite_id = $unite_fleur;
            $fleur->save();
            return redirect()->route("fleurs.index");
        } else {
            return redirect()->back();
            die;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $fleur = Fleur::find($id);
        return view('fleurs.show', [
            'fleur' => $fleur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $fleur = Fleur::find($id);
        $couleurs = Couleur::all();
        $unites = Unite::all();
        return view('fleurs.edit', [
            'fleur' => $fleur,
            'couleurs' => $couleurs,
            'unites' => $unites
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->validate([
            "nom-fleur" => "required|string|max:45",
            "quantite-stock-fleur" => "required|int",
            "couleur-fleur" => "required|int",
            "unite-fleur" => "required|int",
        ])) {
            $nom_fleur = $request->input('nom-fleur');
            $quantite_stock = $request->input("quantite-stock-fleur");
            $couleur_fleur = $request->input("couleur-fleur");
            $unite_fleur = $request->input("unite-fleur");
            $fleur = Fleur::find($id);
            $fleur->nom_fleur = $nom_fleur;
            $fleur->quantite_stock = $quantite_stock;
            $fleur->couleur_id = $couleur_fleur;
            $fleur->unite_id = $unite_fleur;
            $fleur->save();
            return redirect()->route("fleurs.index");
        } else {
            return redirect()->back();
            die;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // dd(Fleur::find($id)->produits()->detach());
        Fleur::destroy($id);
        return redirect()->route("fleurs.index");
    }
}
