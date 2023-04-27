<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\CommandeClient;
use App\Models\CommandeClientProduit;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $commandesClients = DB::table('commandes')
            ->join('commande_client', 'commandes.id', 'commande_client.commande_id')
            ->join('clients', 'commande_client.client_personne_id', 'clients.personne_id')
            ->join('personnes', 'clients.personne_id', 'personnes.id')
            ->join('loteries', 'commande_client.loterie_id', 'loteries.id')
            ->join('commande_client_produit', 'commande_client.commande_id', 'commande_client_produit.commande_client_id')
            ->join('produits', 'commande_client_produit.produit_id', 'produits.id')
            ->join('adresses', 'commande_client.adresse_livraison_id', 'adresses.id')
            ->join('villes', 'adresses.ville_id', 'villes.id')
            ->join('codes_postaux', 'adresses.code_postal_id', 'villes.id')
            // ->select(
            //     'commande_client.commande_id',
            //     'commande_client_produit.quantite_vente',
            //     'date_commande',
            //     'date_livraison',
            //     'etat_paiement',
            //     'etat_livraison',
            //     'frais_livraison',
            //     'nom_personne',
            //     'prenom_personne',
            //     'nom_lot',
            //     'prix_vente',
            //     'rue',
            //     'nom_destinataire',
            //     'cp',
            //     'nom_ville'
            // )
            ->get();
        $commandes = Commande::all();
        // $commandesClients = CommandeClient::all();
        // dump($commandes[0]);
        // dd($commandesClients[0]->commande);
        return view('commandesClients.index', [
            'commandesClients' => $commandesClients,
            'commandes' => $commandes
        ]);
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // /**
    //  * Attache un produit a une commande_client.
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function attach(Request $request, $id_commande_client)
    // {
    //     //TODO
    //     if ($request->validate([
    //         "new_produit-commande_client" => "required|string|max:255|min:1"
    //     ])) {
    //         // $nom = $request->input("new_produit-commande_client");
    //         $produit = Produit::firstOrCreate([
    //             // "quantite_vente" => 5
    //         ]);
    //         $id_produit = $produit->id;
    //         $commande_client = CommandeClient::find($id_commande_client);
    //         if ($commande_client->produits->contains($id_produit)) {
    //             // echo "Ce produit est déjà attaché à ce commande_client.";
    //             // 
    //             return redirect()->back();
    //         } else {
    //             $commande_client->produits()->attach($id_produit);
    //             $commande_client_produit = CommandeClientProduit::all();
    //             $commande_client_produit->find([$id_produit, $id_commande_client]);
    //             return redirect()->route("commande_client.show", $id_commande_client);
    //         }
    //     } else {
    //         echo "erreur";
    //         
    //     }
    // }


    /**
     * Detache un produit a une commande_client.
     * @param  int  $id_commande_client
     * @param  int  $id_produit
     * @return \Illuminate\Http\Response
     */
    public function detach($id_commande_client, $id_produit)
    {
        $commande_client = CommandeClient::find($id_commande_client);
        $commande_client->produits()->detach($id_produit);
        return redirect()->back();
    }
}
