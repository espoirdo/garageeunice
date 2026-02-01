@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center flex items-center justify-center"
     style="background-image: url('{{ asset('images/sportcar.jpg') }}');">

    <div class="bg-white w-full max-w-lg p-8 rounded-lg shadow-lg
                animate_animated animate_fadeInUp">

        <h2 class="text-3xl font-bold text-center mb-6">
            Ajouter une Réparation
        </h2>

        <form action="{{ route('reparations.store') }}" method="POST"
              class="space-y-4">
            @csrf

            <select name="vehicule_id" class="w-full border p-2 rounded" required>
                <option value="">-- Véhicule --</option>
                @foreach($vehicules as $vehicule)
                    <option value="{{ $vehicule->id }}">
                        {{ $vehicule->marque }} {{ $vehicule->modele }}
                    </option>
                @endforeach
            </select>

            <select name="technicien_id" class="w-full border p-2 rounded" required>
                <option value="">-- Technicien --</option>
                @foreach($techniciens as $tech)
                    <option value="{{ $tech->id }}">
                        {{ $tech->nom }} {{ $tech->prenom }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="date"
                   class="w-full border p-2 rounded" required>

            <input type="number" name="duree_main_oeuvre"
                   placeholder="Durée main d'œuvre (heures)"
                   class="w-full border p-2 rounded" required>

            <textarea name="objet_reparation"
                      placeholder="Objet de la réparation"
                      class="w-full border p-2 rounded" required></textarea>

            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-800
                       text-white py-2 rounded transition transform hover:scale-105">
                Enregistrer
            </button>
        </form>
    </div>
</div>
@endsection