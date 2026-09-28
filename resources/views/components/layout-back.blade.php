<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ $title ?? 'Élevage de la Forêt des Rêves - back office' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="description" content="{{ $attributes->get('meta-description', 'Back office de l\'élevage de la Forêt des Rêves') }}">
</head>

<body>
    <div>
        <div>
            <small>Back-office</small>
            <h1>La Forêt des rêves</h1>
        </div>
        <span></span>
        <nav>
            <div>
                <img src="{{ asset('images/icon/dog.png') }}" aria-hidden="true">
                <a href="/back-chien">Chiens</a>
            </div>
            <div>
                <img src="{{ asset('images/icon/pup.png') }}" aria-hidden="true">
                <a href="/back-chiot">Chiots</a>
            </div>
            <div>
                <img src="{{ asset('images/icon/doc.png') }}" aria-hidden="true">
                <a href="/back-content">Contenues</a>
            </div>
        </nav>
    </div>
    <div>
        {{ $slot }}
    </div>
</body>

</html>