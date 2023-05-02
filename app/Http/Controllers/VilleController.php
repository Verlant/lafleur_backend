<?php

namespace App\Http\Controllers;

use App\Models\Fleur;
use App\Models\Ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('villes.index', [
            'villes' => Ville::all(),
            "fleurs" => Fleur::all()
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
        $ville = Ville::find($id);
        return view('villes.edit', [
            'ville' => $ville,
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
            "est-livrable" => "required|bool"
        ])) {
            $est_livrable = $request->input('est-livrable');
            $ville = Ville::find($id);
            $ville->est_livrable = $est_livrable;
            $ville->save();
            return redirect()->route("villes.index");
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
