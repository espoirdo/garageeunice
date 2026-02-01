@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center flex items-center justify-center"
     style="background-image: url('{{ asset('images/bg-reparation.jpg') }}');">

    <div class="bg-white w-full max-w-lg p-8 rounded-lg shadow-lg
                animate_animated animate_fadeInUp">

        <h2 class="text-3xl font-bold text-center mb-6">
            Modifier la Réparation
        </h2>

        <form action="{{ route('reparations.update', $reparation->id) }}"
              method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <select name="vehicule_id" class="w-full border p-2 rounded" required>
                @foreach($vehicules as $vehicule)
                    <option value="{{ $vehicule->id }}"
                        @selected($reparation->vehicule_id == $vehicule->id)>
                        {{ $vehicule->marque }} {{ $vehicule->modele }}
                    </option>
                @endforeach
            </select>

            <select name="technicien_id" class="w-full border p-2 rounded" required>
                @foreach($techniciens as $tech)
                    <option value="{{ $tech->id }}"
                        @selected($reparation->technicien_id == $tech->id)>
                        {{ $tech->nom }} {{ $tech->prenom }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="date"
                   value="{{ $reparation->date }}"
                   class="w-full border p-2 rounded" required>

            <input type="number" name="duree_main_oeuvre"
                   value="{{ $reparation->duree_main_oeuvre }}"
                   class="w-full border p-2 rounded" required>

            <textarea name="objet_reparation"
                      class="w-full border p-2 rounded"
                      required>{{ $reparation->objet_reparation }}</textarea>

            <div class="flex gap-3">
                <button type="submit"
                    class="flex-1 bg-green-600 hover:bg-green-800
                           text-white py-2 rounded transition transform hover:scale-105">
                    Modifier
                </button>

                <a href="{{ route('reparations.index') }}"
                   class="flex-1 bg-gray-500 hover:bg-gray-700
                          text-white py-2 rounded text-center transition">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection