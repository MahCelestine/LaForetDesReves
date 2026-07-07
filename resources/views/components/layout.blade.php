<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>{{ $title ?? 'Élevage de la Forêt des Rêves - Samoyèdes, Staffordshire Bull Terrier et Bergers Américains' }}</title>
    @vite('resources/css/app.css')
    <meta name="description" content="{{ $attributes->get('meta-description', 'Bienvenue à l\'élevage familial de la Forêt des Rêves, votre élevage de Samoyèdes, Staffordshire Bull Terrier et Bergers Américains.') }}">
</head>

<body>
    <header>
        <nav aria-label="Navigation principale">
            <a href="/">
                <img src="{{ asset('images/logo/logo_couleur.png') }}" alt="Logo Élevage de la Forêt des Rêves" />
                <div>
                    <span>Élevage de la Forêt des Rêves</span>
                    <small>Élevage Certifié LOF</small>
                </div>
            </a>
            <ul>
                <li><a href="/">Nos races</a></li>
                <li><a href="/">Guide de l'adoption</a></li>
                <li><a href="/">Le coin conseil</a></li>
                <li><a href="/">Nous contacter</a></li>
            </ul>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <div class="footer-content">
            <section>
                <h3>Élevage de la Forêt des Rêves</h3>
                <p>Des chiots d'exception, élevés avec passion dans un cadre naturel et familial. Trois races d'élite sélectionnées pour leur caractère équilibré et leur santé irréprochable.</p>
            </section>
            
            <section>
                <h4>Navigation</h4>
                <ul>
                    <li><a href="/">Accueil</a></li>
                    <li><a href="/">Nos races</a></li>
                    <li><a href="/">Guide de l'adoption</a></li>
                    <li><a href="/">Le coin conseil</a></li>
                    <li><a href="/">Contact</a></li>
                </ul>
            </section>
            
            <section>
                <h4>Nous retrouver</h4>
                <address>
                    <div><i class="bi bi-telephone" aria-hidden="true"></i> <span>+33 6 00 00 00 00</span></div>
                    <div><a href="mailto:elevageforetdesreves@gmail.com"><i class="bi bi-envelope" aria-hidden="true"></i> elevageforetdesreves@gmail.com</a></div>
                    <div><i class="bi bi-geo-alt" aria-hidden="true"></i> <span>139 VC Cappelle Straete, 59470 Volckerinckhove</span></div>
                </address>
                <div>
                    <h3>Horaires d'ouverture :</h3>
                    <p>Lun - Sam · Sur RDV</p>
                </div>
            </section>
        </div>

        <div>
            <a href="" aria-label="Suivez-nous sur Facebook"><i class="bi bi-facebook"></i></a>
            <a href="" aria-label="Suivez-nous sur Instagram"><i class="bi bi-instagram"></i></a>
            <a href="" aria-label="Suivez-nous sur Tiktok"><i class="bi bi-tiktok"></i></a>
        </div>
        <span>
        <div class="footer-bottom">
            <p>© 2026 Élevage de la Forêt des Rêves · Tous droits réservés.</p>
            <nav aria-label="Liens légaux">
                <a href="">Mentions légales</a> · 
                <a href="">Politique de confidentialité</a>
            </nav>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>