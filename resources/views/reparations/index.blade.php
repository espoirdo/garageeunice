@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center"
     style="background-image: url('{{ asset('images/voi1.jpeg') }}');">

    <div class="container mx-auto px-2 md:px-4 py-6 md:py-10">

        <h1 class="text-2xl md:text-4xl font-bold text-white text-center mb-8 animate_animated animate_fadeInDown">
            Gestion des Réparations
        </h1>

        {{-- Message de succès --}}
        @if(session('success'))
            <div class="bg-green-600 text-white px-4 py-3 rounded mb-6 shadow-lg animate_animated animate_fadeInDown">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-6">
            <a href="{{ route('reparations.create') }}"
               class="bg-blue-600 hover:bg-blue-800 text-white px-3 md:px-5 py-2 rounded shadow transition transform hover:scale-105 text-sm md:text-base">
                 Nouvelle réparation
            </a>
        </div>

        <div class="overflow-x-auto max-w-full bg-white rounded-lg shadow-lg animate_animated animate_fadeInUp">
            <table class="min-w-full text-xs md:text-sm text-center">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="p-2 md:p-3">Véhicule</th>
                        <th class="p-2 md:p-3">Technicien</th>
                        <th class="p-2 md:p-3">Objet</th>
                        <th class="p-2 md:p-3">Date</th>
                        <th class="p-2 md:p-3">Durée (h)</th>
                        <th class="p-2 md:p-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($reparations as $rep)
                    <tr class="border-b hover:bg-gray-100 transition">
                        <td>{{ $rep->vehicule->marque }} {{ $rep->vehicule->modele }}</td>
                        <td>{{ $rep->technicien->nom }} {{ $rep->technicien->prenom }}</td>
                        <td>{{ $rep->objet_reparation }}</td>
                        <td>{{ \Carbon\Carbon::parse($rep->date)->format('d/m/Y') }}</td>
                        <td>{{ $rep->duree_main_oeuvre }}</td>
                        <td class="space-x-2">
                            <a href="{{ route('reparations.edit', $rep->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-700 text-white px-3 py-1 rounded text-xs">
                                Modifier
                            </a>

                            <form action="{{ route('reparations.destroy', $rep->id) }}"
                                  method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Supprimer ?')"
                                        class="bg-red-600 hover:bg-red-800 text-white px-3 py-1 rounded text-xs">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-gray-500 py-4">Aucune réparation enregistrée pour le moment.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection