<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Technicien;
use App\Models\Reparation;
use Illuminate\Http\Request;

class ReparationController extends Controller
{
    public function index()
    {
        $reparations = Reparation::all();
        return view('reparations.index', compact('reparations'));
    }

    public function create()
    {
        // Charger les véhicules et techniciens pour le formulaire
        $vehicules = Vehicule::all();
        $techniciens = Technicien::all();

        return view('reparations.create', compact('vehicules', 'techniciens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'technicien_id' => 'required|exists:techniciens,id',
            'objet_reparation' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        Reparation::create($request->all());

        return redirect()->route('reparations.index')
                         ->with('success', 'Réparation ajoutée avec succès');
    }
    public function edit(Reparation $reparation)
{
    // Charger les véhicules et techniciens pour le formulaire
    $vehicules = Vehicule::all();
    $techniciens = Technicien::all();

    // Retourner la vue d’édition avec la réparation existante
    return view('reparations.edit', compact('reparation', 'vehicules', 'techniciens'));
}
public function update(Request $request, Reparation $reparation)
{
    $request->validate([
        'vehicule_id' => 'required|exists:vehicules,id',
        'technicien_id' => 'required|exists:techniciens,id',
        'objet_reparation' => 'required|string|max:255',
        'date' => 'required|date',
        'duree_main_oeuvre' => 'required|numeric',
    ]);

    $reparation->update($request->all());

    return redirect()->route('reparations.index')
                     ->with('success', 'Réparation mise à jour avec succès');
}
}
