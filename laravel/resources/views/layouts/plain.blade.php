<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'HOA Platform')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ✅ Feuille de style Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- ✅ Barre de navigation (déplacée ici) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="/">HOA Platform</a>

            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Se déconnecter</button>
            </form>
            @else
            <div>
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Se connecter</a>
                <a href="{{ route('register') }}" class="btn btn-primary">S'inscrire</a>
            </div>
            @endauth
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!-- ✅ Script JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>