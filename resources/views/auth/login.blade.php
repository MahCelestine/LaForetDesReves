<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Élevage de la Forêt des Rêves - back office</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="robots" content="noindex, nofollow">
</head>
<body class="login-body">
    <div class="login-card">
        <img src="{{ asset('images/logo/logo_couleur.png') }}" alt="Logo Élevage de la Forêt des Rêves" class="login-logo" />

        <form action="{{ route('login') }}" method="POST" class="login-form">
            @csrf
            <div class="form-field">
                <label>Adresse e-mail *</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="marie@exemple.com" required autofocus>
            </div>

            <div class="form-field">
                <label>Mot de passe *</label>
                <input type="password" name="password" placeholder="••••••" required>
            </div>

            <div class="login-remember">
                <input type="checkbox" name="remember" id="remember" />
                <label for="remember">Se souvenir de moi</label>
            </div>

            <button type="submit" class="form-submit">
                Se connecter
            </button>
        </form>
    </div>
</body>
</html>