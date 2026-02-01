<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Garage Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Barre de navigation -->
    <nav class="flex justify-between items-center p-6 bg-white shadow">
        <h1 class="text-2xl font-bold text-red-600">KALIP'S</h1>
        <ul class="flex gap-6 text-lg font-semibold">
            <li><a href="/" class="hover:text-red-500">Accueil</a></li>
             <a href="{{ route('vehicules.index') }}" class="hover:text-red-500"> Véhicules</a><br>
<li><a href="{{ route('techniciens.index') }}" class="hover:text-red-500"> Techniciens</a></li><br>
<li><a href="{{ route('reparations.index') }}" class="hover:text-red-500">Réparations</a></li>
    </nav>

    <!-- Contenu principal -->
    <main class="p-6 mt-6">
        @yield('content')
    </main>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet"
 href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</body>
</html>