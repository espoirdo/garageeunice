<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;
use Barryvdh\DomPDF\Facade\Pdf;

class VehiculeController extends Controller
{
    /**
     * Liste des véhicules
     */
    public function index()
    {
        $vehicules = Vehicule::all();
        return view('vehicules.index', compact('vehicules'));
    }

    /**
     * Formulaire de création
     */
    public function create()
    {
        return view('vehicules.create');
    }

    /**
     * Enregistrement d’un véhicule
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'marque'          => 'required|string|max:255',
            'modele'          => 'required|string|max:255',
            'couleur'         => 'required|string|max:255',
            'carrosserie'     => 'required|string|max:255',
            'energie'         => 'required|string|max:255',
            'kilometrage'     => 'required|integer',
            'annee'           => 'required|integer',
            'immatriculation' => 'required|string|max:255|unique:vehicules',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $filename);
            $validated['image'] = $filename;
        } else {
            $validated['image'] = 'default-car.jpg';
        }

        Vehicule::create($validated);

        return redirect()->route('vehicules.index')
                         ->with('success', 'Véhicule ajouté avec succès !');
    }

    /**
     * Affiche un véhicule
     */
    public function show(Vehicule $vehicule)
    {
        return view('vehicules.show', compact('vehicule'));
    }

    /**
     * Formulaire d’édition
     */
    public function edit(Vehicule $vehicule)
    {
        return view('vehicules.edit', compact('vehicule'));
    }

    /**
     * Mise à jour d’un véhicule
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        $validated = $request->validate([
            'marque'          => 'required|string|max:255',
            'modele'          => 'required|string|max:255',
            'couleur'         => 'required|string|max:255',
            'carrosserie'     => 'required|string|max:255',
            'energie'         => 'required|string|max:255',
            'kilometrage'     => 'required|integer',
            'annee'           => 'required|integer',
            'immatriculation' => 'required|string|max:255|unique:vehicules,immatriculation,' . $vehicule->id,
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $filename);
            $validated['image'] = $filename;
        }

        $vehicule->update($validated);

        return redirect()->route('vehicules.index')
                         ->with('success', 'Véhicule mis à jour avec succès !');
    }

    /**
     * Suppression d’un véhicule
     */
    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();
        return redirect()->route('vehicules.index')
                         ->with('success', 'Véhicule supprimé avec succès !');
    }

    /**
     * Formulaire d’achat (infos personnelles)
     */
    public function formAcheter(Vehicule $vehicule)
    {
        return view('vehicules.acheter-form', compact('vehicule'));
    }

    /**
     * Génération du reçu PDF après saisie des infos
     */
    public function acheter(Request $request, Vehicule $vehicule)
    {
        $validated = $request->validate([
            'nom'       => 'required|string|max:255',
            'email'     => 'required|email',
            'telephone' => 'required|string|max:20',
        ]);

        $recu = [
            'date'            => now()->format('d/m/Y H:i'),
            'vehicule'        => $vehicule->marque . ' ' . $vehicule->modele,
            'immatriculation' => $vehicule->immatriculation,
            'prix'            => number_format(rand(2000, 15000), 0, ',', ' ') . ' €',
            'acheteur'        => $validated['nom'],
            'email'           => $validated['email'],
            'telephone'       => $validated['telephone'],
        ];

        $pdf = Pdf::loadView('vehicules.recu-pdf', compact('recu'));
        return $pdf->download('recu_vehicule_'.$vehicule->id.'.pdf');
    }
}