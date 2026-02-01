<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Garage Admin</title>
    @vite('resources/css/app.css') <!-- Tailwind via Vite -->
</head>
<body class="bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 min-h-screen flex flex-col text-white">

    <!-- Barre de navigation -->
    <header class="sticky top-0 z-50 bg-black bg-opacity-60 backdrop-blur-md shadow-lg">
        <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold tracking-wide">🚗 Garage Admin</h1>
            <ul class="flex space-x-6 text-lg font-medium">
                <li><a href="{{ url('/') }}" class="hover:text-yellow-300 transition">🏠 Accueil</a></li>
                <li><a href="{{ route('vehicules.index') }}" class="hover:text-yellow-300 transition">🚘 Véhicules</a></li>
                <li><a href="{{ route('techniciens.index') }}" class="hover:text-yellow-300 transition">👨‍🔧 Techniciens</a></li>
                <li><a href="{{ route('reparations.index') }}" class="hover:text-yellow-300 transition">🔧 Réparations</a></li>
                
            </ul>
        </nav>
    </header>

    <!-- Contenu principal -->
    <main class="flex-grow p-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-black bg-opacity-50 text-center py-4 text-sm">
        &copy; {{ date('Y') }} Garage Management — Tous droits réservés
    </footer>

</body>
</html>