C'est @extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-lg rounded-xl p-6 mt-10">
    <h1 class="text-2xl font-bold mb-4 text-center">Informations d'Achat</h1>

    <form action="{{ route('vehicules.acheter', $vehicule) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Nom complet</label>
            <input type="text" name="nom" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Téléphone</label>
            <input type="text" name="telephone" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg w-full">
            Générer le reçu
        </button>
    </form>
</div>
@endsection