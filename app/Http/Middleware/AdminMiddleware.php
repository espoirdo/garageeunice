<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration Garage</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <ul class="flex space-x-6">
            <li><a href="{{ route('vehicules.index') }}">Véhicules</a></li>
            <li><a href="{{ route('techniciens.index') }}">Techniciens</a></li>
            <li><a href="{{ route('reparations.index') }}">Réparations</a></li>
        </ul>
    </nav>

    <main class="p-6">
        @yield('content')
    </main>
</body>
</html><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration Garage</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <ul class="flex space-x-6">
            <li><a href="{{ route('vehicules.index') }}">Véhicules</a></li>
            <li><a href="{{ route('techniciens.index') }}">Techniciens</a></li>
            <li><a href="{{ route('reparations.index') }}">Réparations</a></li>
        </ul>
    </nav>

    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>