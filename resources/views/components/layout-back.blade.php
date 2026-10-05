<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Élevage de la Forêt des Rêves - back office' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="robots" content="noindex, nofollow">
    @livewireStyles
    <meta name="description" content="{{ $attributes->get('meta-description', 'Back office de l\'élevage de la Forêt des Rêves') }}">
</head>

<body class="backoffice-body" x-data="{ sidebarOpen: false }">

    <!-- Bouton Hamburger mobile (affiché uniquement sur petit écran) -->
    <button class="backoffice-menu-btn" @click="sidebarOpen = !sidebarOpen" aria-label="Menu">
        <i class="bi bi-list"></i>
    </button>

    <!-- Fond grisé semi-transparent (Overlay) quand le menu est ouvert sur mobile -->
    <div class="backoffice-backdrop" 
         x-show="sidebarOpen" 
         x-transition.opacity 
         @click="sidebarOpen = false"
         style="display: none;">
    </div>

    <!-- Sidebar (Cachée par défaut sur mobile, s'ouvre en tiroir) -->
    <div class="backoffice-sidebar" :class="{ 'open': sidebarOpen }">
        <div class="backoffice-brand">
            <small>Back-office</small>
            <h1>La Forêt des rêves</h1>
        </div>
        <span class="backoffice-separator"></span>
        <nav class="backoffice-nav">
            <div class="backoffice-nav-item" @click="sidebarOpen = false">
                <img src="{{ asset('images/icon/dog.png') }}" aria-hidden="true">
                <a href="/back-chien">Chiens</a>
            </div>
            <div class="backoffice-nav-item" @click="sidebarOpen = false">
                <img src="{{ asset('images/icon/pup.png') }}" aria-hidden="true">
                <a href="/back-chiot">Chiots</a>
            </div>
            <div class="backoffice-nav-item" @click="sidebarOpen = false">
                <img src="{{ asset('images/icon/doc.png') }}" aria-hidden="true">
                <a href="/back-content">Contenues</a>
            </div>
        </nav>
    </div>

    <!-- Contenu principal -->
    <div class="backoffice-content">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>