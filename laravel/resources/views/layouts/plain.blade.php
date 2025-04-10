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
