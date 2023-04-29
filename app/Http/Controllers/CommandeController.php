<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Fleur;
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
            'fleurs' => Fleur::all()
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
        $commande = Commande::find($id);
        return view('commandes.show', [
            'commande' => $commande,
            'fleurs' => Fleur::all()
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
            'fleurs' => Fleur::all()
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
