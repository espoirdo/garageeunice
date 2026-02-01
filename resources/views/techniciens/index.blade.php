@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/car2.jpg') }}')">

    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-white mb-8 text-center animate_animated animate_fadeInDown">Liste des Techniciens</h1>

        @if(session('success'))
            <div class="mb-4 text-green-500 font-semibold animate_animated animate_fadeIn">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-6">
            <a href="{{ route('techniciens.create') }}" 
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition transform hover:scale-105 animate_animated animate_fadeInRight">
                Ajouter un Technicien
            </a>
        </div>

        <div class="overflow-x-auto animate_animated animate_fadeIn">
            <table class="min-w-full bg-white rounded shadow-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Prénom</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Téléphone</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($techniciens as $tech)
                    <tr class="border-b hover:bg-gray-100 transition">
                        <td class="px-4 py-2">
                            @if($tech->image)
                 <div class="min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/car3.jpg') }}')">

                            @else
                                N/A
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $tech->nom }}</td>
                        <td class="px-4 py-2">{{ $tech->prenom }}</td>
                        <td class="px-4 py-2">{{ $tech->email }}</td>
                        <td class="px-4 py-2">{{ $tech->telephone }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('techniciens.edit', $tech->id) }}" 
                               class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 rounded shadow transition transform hover:scale-105">
                                Modifier
                            </a>
                            <form action="{{ route('techniciens.destroy', $tech->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded shadow transition transform hover:scale-105"
                                        onclick="return confirm('Voulez-vous vraiment supprimer ce technicien ?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection