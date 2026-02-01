<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu d'Achat</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; }
        h1 { text-align: center; }
        p { margin: 5px 0; }
    </style>
</head>
<body>
    <div style="border:1px solid #ccc; padding:20px; font-family:DejaVu Sans;">
    <h1 style="text-align:center; color:#2c3e50;">Garage Pro - Reçu d'Achat</h1>
    <hr>
    <p><strong>Date :</strong> {{ $recu['date'] }}</p>
    <p><strong>Véhicule :</strong> {{ $recu['vehicule'] }}</p>
    <p><strong>Immatriculation :</strong> {{ $recu['immatriculation'] }}</p>
    <p><strong>Prix :</strong> {{ $recu['prix'] }}</p>
    <p><strong>Acheteur :</strong> {{ $recu['acheteur'] }}</p>
    <hr>
    <p style="text-align:center; font-size:12px; color:#888;">
        Merci de votre confiance – Garage Pro
    </p>
</div>
</body>
</html>