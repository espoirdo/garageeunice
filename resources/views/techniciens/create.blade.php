@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Ajouter un Technicien</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('techniciens.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="nom" class="block text-gray-700">Nom</label>
            <input type="text" name="nom" id="nom" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="prenom" class="block text-gray-700">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="telephone" class="block text-gray-700">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="specialite" class="block text-gray-700">Spécialité</label>
            <input type="text" name="specialite" id="specialite" class="w-full border rounded px-3 py-2" placeholder="Ex: Électricien" required>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                Ajouter
            </button>
        </div>
    </form>
</div>
@endsection
