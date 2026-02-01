@extends('layouts.app')

@section('content')
<link rel="stylesheet"
 href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<div class="min-h-screen bg-cover bg-center"
     style="background-image:url('{{ asset('images/car5.jpg') }}')">

    <div class="min-h-screen bg-black/70 p-6">
        <div class="max-w-7xl mx-auto animate__animated animate__fadeInDown">

            <!-- En-tête -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-4xl font-bold text-white">
                     Gestion des Véhicules
                </h1>

                <a href="{{ route('vehicules.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow-lg transition">
                    + Nouveau véhicule
                </a>
            </div>

            <!-- Grille des véhicules -->
            <div class="grid md:grid-cols-3 gap-8 px-4">
                @foreach($vehicules as $vehicule)
                    <div class="bg-white/90 backdrop-blur rounded-2xl shadow-xl
                                animate__animated animate__zoomIn
                                hover:scale-105 transition duration-300">

                        <!-- Image -->
                        <img src="{{ $vehicule->image ? asset('images/'.$vehicule->image) : asset('images/default-car.jpg') }}"
                             class="h-48 w-full object-cover rounded-t-2xl"
                             alt="Image du véhicule">

                        <!-- Infos -->
                        <div class="p-6">
                            <h2 class="text-2xl font-bold mb-2">
                                {{ $vehicule->marque }}
                            </h2>

                            <p class="text-gray-700">Modèle : {{ $vehicule->modele }}</p>
                            <p class="text-gray-700">Couleur : {{ $vehicule->couleur }}</p>
                            <p class="text-gray-700">Énergie : {{ $vehicule->energie }}</p>
                            <p class="text-gray-700">Année : {{ $vehicule->annee }}</p>
                            <p class="text-gray-700">Km : {{ $vehicule->kilometrage }}</p>
                            <p class="text-gray-700">Immatriculation : {{ $vehicule->immatriculation }}</p>

                            <!-- Actions -->
                            <div class="mt-4 flex flex-wrap gap-4 items-center">
                                <!-- Modifier -->
                                <a href="{{ route('vehicules.edit',$vehicule) }}"
                                   class="text-blue-600 font-semibold hover:underline">
                                     Modifier
                                </a>

                                <!-- Supprimer -->
                                <form action="{{ route('vehicules.destroy',$vehicule) }}" method="POST"
                                      onsubmit="return confirm('Voulez-vous vraiment supprimer ce véhicule ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 font-semibold hover:underline">
                                        Supprimer
                                    </button>
                                </form>

                                <!-- Acheter -->
                                <a href="{{ route('vehicules.formAcheter',$vehicule) }}"
                                   class="text-green-600 font-semibold hover:underline">
                                    Acheter
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection