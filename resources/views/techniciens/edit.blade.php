@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset('images/electriccar.jpg') }}');">
    <div class="bg-white p-8 rounded shadow-lg w-full max-w-lg animate_animated animate_fadeInUp">
        <h1 class="text-3xl font-bold mb-6 text-center">Modifier Technicien</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('techniciens.update', $technicien->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="text" name="nom" value="{{ $technicien->nom }}" placeholder="Nom" class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-500">
            <input type="text" name="prenom" value="{{ $technicien->prenom }}" placeholder="Prénom" class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-500">
            <input type="email" name="email" value="{{ $technicien->email }}" placeholder="Email" class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-500">
            <input type="text" name="telephone" value="{{ $technicien->telephone }}" placeholder="Téléphone" class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-500">
            <input type="text" name="specialite" value="{{ $technicien->specialite }}" placeholder="electricien" class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="w-full bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded shadow transition transform hover:scale-105">
                Modifier
            </button>
        </form>
    </div>
</div>
@endsection