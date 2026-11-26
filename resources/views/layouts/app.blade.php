<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('titre', 'Chat')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav>
        <a href="/salons">Salons</a>
        @auth
            {{ auth()->user()->name }}
            <form method="POST" action="/logout">@csrf <button>Déconnexion</button></form>
        @else
            <a href="/login">Connexion</a>
        @endauth
    </nav>

    <main>@yield('contenu')</main>
</body>
</html>
