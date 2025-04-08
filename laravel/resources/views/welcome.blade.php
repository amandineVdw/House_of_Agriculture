<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue sur HOA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="text-center">
        <h1 class="mb-4">👩‍🌾 Bienvenue sur <strong>HOA</strong></h1>
        <p class="mb-4 text-muted">Votre plateforme d'apprentissage collaboratif en agroécologie</p>

        <a href="{{ route('register') }}" class="btn btn-success btn-lg me-2">S’inscrire</a>
        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg">Se connecter</a>
    </div>

</body>
</html>
