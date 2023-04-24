<?php

namespace App\Http\Controllers;

use App\Models\CommandeClient;
use App\Models\CommandeClientProduit;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    //             // die;
    //             return redirect()->back();
    //         } else {
    //             $commande_client->produits()->attach($id_produit);
    //             $commande_client_produit = CommandeClientProduit::all();
    //             $commande_client_produit->find([$id_produit, $id_commande_client]);
    //             return redirect()->route("commande_client.show", $id_commande_client);
    //         }
    //     } else {
    //         echo "erreur";
    //         die;
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
