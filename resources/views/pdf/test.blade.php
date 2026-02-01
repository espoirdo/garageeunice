<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; padding: 20px; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>{{ $titre }}</h1>
    <p><strong>Nom :</strong> {{ $nom }}</p>
    <p><strong>Date :</strong> {{ $date }}</p>
    <p>{{ $message }}</p>
</body>
</html>