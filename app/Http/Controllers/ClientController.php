<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\Client;
use App\Models\Personne;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = [];
        foreach (Client::all() as $client) {
            $clients[] = Personne::find($client->personne_id);
        }
        return view('clients.index', [
            'clients' => $clients
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
        $client = Client::find($id);
        return view('clients.show', [
            'id_client' => $id,
            'client' => $client
        ]);
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

    /**
     * Attache une adresse a un client.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function attach(Request $request, $id_client)
    {
        //TODO
        if ($request->validate([
            "new_adresse-client" => "required|string|max:255|min:1"
        ])) {
            // $nom = $request->input("new_adresse-client");
            $adresse = Adresse::firstOrCreate([
                // "nom" => $nom
            ]);
            $id_adresse = $adresse->id;
            $client = Client::find($id_client);
            if ($client->adresses->contains($id_adresse)) {
                // echo "Ce adresse est déjà attaché à ce client.";
                // die;
                return redirect()->back();
            } else {
                $client->adresses()->attach($id_adresse);
                return redirect()->route("client.show", $id_client);
            }
        } else {
            echo "erreur";
            die;
        }
    }


    /**
     * Detache une adresse a un client.
     * @param  int  $id_client
     * @param  int  $id_adresse
     * @return \Illuminate\Http\Response
     */
    public function detach($id_client, $id_adresse)
    {
        $client = Client::find($id_client);
        $client->adresses()->detach($id_adresse);
        return redirect()->back();
    }
}
