<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

        <!-- Fonts -->

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        

    </head>
    <body class="antialiased">
        <header>
            <h1>📦 Le Bon Coin 📦</h1>
        </header>
        <nav>
            <a href="/">🏡 Accueil</a>
            <a href="/create">➕ Créer une annonce</a>
        </nav>