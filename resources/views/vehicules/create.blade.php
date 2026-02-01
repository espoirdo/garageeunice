@extends('layouts.app')

@section('content')
<link rel="stylesheet"
 href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<div class="min-h-screen bg-cover bg-center"
     style="background-image:url('{{ asset('images/car7.jpg') }}')">

    <div class="min-h-screen bg-black/70 flex items-center justify-center p-6">

        <form method="POST" action="{{ route('vehicules.store') }}"
              enctype="multipart/form-data"
              class="bg-white/95 backdrop-blur p-8 rounded-2xl shadow-2xl
                     w-full max-w-3xl animate_animated animate_fadeInUp">

            @csrf

            <h2 class="text-3xl font-bold mb-6 text-center">
                Nouveau Véhicule
            </h2>

            <div class="grid md:grid-cols-2 gap-4">
                @foreach(['marque','modele','couleur','carrosserie','energie'] as $field)
                    <div>
                        <label class="font-semibold capitalize">{{ $field }}</label>
                        <input type="text" name="{{ $field }}"
                               value="{{ old($field) }}"
                               class="w-full border rounded-lg p-2">
                        @error($field)
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach

                <div>
                    <label class="font-semibold">Kilométrage</label>
                    <input type="number" name="kilometrage"
                           value="{{ old('kilometrage') }}"
                           class="w-full border rounded-lg p-2">
                    @error('kilometrage')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="font-semibold">Année</label>
                    <input type="number" name="annee"
                           value="{{ old('annee') }}"
                           class="w-full border rounded-lg p-2">
                    @error('annee')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="font-semibold">Immatriculation</label>
                    <input type="text" name="immatriculation"
                           value="{{ old('immatriculation') }}"
                           class="w-full border rounded-lg p-2">
                    @error('immatriculation')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Champ image -->
            <div class="mt-4">
                <label class="font-semibold">Image</label>
                <input type="file" name="image"
                       class="w-full border rounded-lg p-2 bg-gray-50">
                @error('image')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex justify-between">
                <a href="{{ route('vehicules.index') }}"
                   class="text-gray-600 hover:text-gray-800">⬅ Retour</a>

                <button class="bg-blue-600 hover:bg-blue-700
                               text-white px-6 py-3 rounded-xl shadow">
                    Enregistrer
                </button>
            </div>
        </form>

    </div>
</div>
@endsection