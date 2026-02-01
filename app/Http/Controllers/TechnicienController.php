<?php
namespace App\Http\Controllers;

use App\Models\Technicien;
use Illuminate\Http\Request;

class TechnicienController extends Controller
{
    public function index()
    {
        $techniciens = Technicien::all();
        return view('techniciens.index', compact('techniciens'));
    }

    public function create()
    {
        return view('techniciens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'specialite' => 'required',
        ]);

        Technicien::create($request->all());
        return redirect()->route('techniciens.index')->with('success', 'Technicien ajouté');
    }

    public function edit(Technicien $technicien)
    {
        return view('techniciens.edit', compact('technicien'));
    }

    public function update(Request $request, Technicien $technicien)
    {
        $request->validate([
            'nom' => 'required',
            'specialite' => 'required',
        ]);

        $technicien->update($request->all());
        return redirect()->route('techniciens.index')->with('success', 'Technicien mis à jour');
    }

    public function destroy(Technicien $technicien)
    {
        $technicien->delete();
        return redirect()->route('techniciens.index')->with('success', 'Technicien supprimé');
    }
}