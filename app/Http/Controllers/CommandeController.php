<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $commandes = Commande::orderBy('date_livraison', 'ASC')->get();
        return view('commandes.index', [
            'commandes' => $commandes,
        ]);
        // $commandesClients = DB::table('commandes')
        //     ->select(
        //         'commande_client.commande_id',
        //         'commande_client_produit.quantite_vente',
        //         'date_commande',
        //         'date_livraison',
        //         'etat_paiement',
        //         'etat_livraison',
        //         'frais_livraison',
        //         'nom_personne',
        //         'prenom_personne',
        //         'nom_lot',
        //         'prix_vente',
        //         'rue',
        //         'nom_destinataire',
        //         'cp',
        //         'nom_ville'
        //     )
        //     ->join('commande_client', 'commandes.id', 'commande_client.commande_id')
        //     ->join('clients', 'commande_client.client_personne_id', 'clients.personne_id')
        //     ->join('personnes', 'clients.personne_id', 'personnes.id')
        //     ->join('loteries', 'commande_client.loterie_id', 'loteries.id')
        //     ->join('commande_client_produit', 'commande_client.commande_id', 'commande_client_produit.commande_client_id')
        //     ->join('produits', 'commande_client_produit.produit_id', 'produits.id')
        //     ->join('adresses', 'commande_client.adresse_livraison_id', 'adresses.id')
        //     ->join('villes', 'adresses.ville_id', 'villes.id')
        //     ->join('codes_postaux', 'adresses.code_postal_id', 'villes.id')
        //     ->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $commande = Commande::find($id);
        return view('commandes.show', [
            'commande' => $commande,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $commande = Commande::find($id);
        return view('commandes.edit', [
            'commande' => $commande,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->validate([
            "etat-paiement" => "required|string|min:1|max:1",
            "etat-livraison" => "required|string|min:1|max:1",
        ])) {
            $etat_paiement = $request->input('etat-paiement');
            $etat_livraison = $request->input('etat-livraison');
            $commande = Commande::find($id);
            $commande->etat_paiement = $etat_paiement;
            $commande->etat_livraison = $etat_livraison;
            if ($commande->etat_paiement == 'B') {
                $commande->etat_livraison = $etat_paiement;
            }
            $commande->save();
            return redirect()->route("commandes.index");
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
    }
}
