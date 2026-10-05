<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Élevage de la Forêt des Rêves - Samoyèdes, Staffordshire Bull Terrier et Bergers Américains' }}
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="description"
        content="{{ $attributes->get('meta-description', 'Bienvenue à l\'élevage familial de la Forêt des Rêves, votre élevage de Samoyèdes, Staffordshire Bull Terrier et Bergers Américains.') }}">
</head>

<body class="flex flex-col min-h-screen">
    <header x-data="{ open: false }" class="sticky top-0 z-50 bg-white/80 backdrop-blur-xl shadow-sm">
        <nav aria-label="Navigation principale"
            class="flex justify-between items-center px-4 sm:px-8 lg:px-16 xl:px-24 py-3">
            <a href="/" class="flex items-center gap-2 xl:ml-35">
                <img src="{{ asset('images/logo/logo_couleur.png') }}" alt="Logo Élevage de la Forêt des Rêves"
                    class="w-12 sm:w-16 lg:w-14 xl:w-16 pr-1" />
                <div class="flex flex-col">
                    <span class="font-title text-purple text-lg sm:text-2xl font-semibold leading-tight">Élevage de la
                        Forêt des Rêves</span>
                    <small class="text-light-blue text-base sm:text-xs tracking-wide">ÉLEVAGE CERTIFIÉ LOF</small>
                </div>
            </a>
            <ul class="hidden lg:flex items-center gap-6 text-dark-grey text-base lg:text-sm xl:text-base font-medium xl:mr-10">
                <li class="pt-2">
                    <a href="/nos-races" class="hover-fill-text {{ request()->is('nos-races*') ? 'active' : '' }}">
                        Nos races
                    </a>
                </li>
                <li class="pt-2">
                    <a href="/le-guide-de-l-adoption"
                        class="hover-fill-text {{ request()->is('le-guide-de-l-adoption*') ? 'active' : '' }}">
                        Guide de l'adoption
                    </a>
                </li>
                <li class="pt-2">
                    <a href="/le-coin-conseil"
                        class="hover-fill-text {{ request()->is('le-coin-conseil*') ? 'active' : '' }}">
                        Le coin conseil
                    </a>
                </li>
                <li class="pt-2">
                    <a href="/nous-contacter"
                        class="btn-purple inline-block {{ request()->is('nous-contacter*') ? 'bg-white !text-purple' : 'text-white bg-purple hover:bg-white hover:!text-purple' }}">
                        Nous contacter
                    </a>
                </li>
            </ul>

            <button @click="open = !open" type="button" class="lg:hidden text-purple focus:outline-none"
                aria-label="Ouvrir le menu">
                <i class="bi mr-3 text-2xl " :class="open ? 'bi-x-lg' : 'bi-list'"></i>
            </button>
        </nav>

        <div x-show="open" x-cloak @click.away="open = false"
            class="lg:hidden bg-white border-t text-dark-grey text-lg border-gray-100 px-6 py-4 space-y-4 text-center">
            <a href="/nos-races"
                class="block py-2 {{ request()->is('nos-races*') ? 'text-purple font-semibold' : '' }}">Nos
                races</a>
            <a href="/le-guide-de-l-adoption"
                class="block py-2 {{ request()->is('le-guide-de-l-adoption*') ? 'text-purple font-semibold' : '' }}">Guide
                de l'adoption</a>
            <a href="/le-coin-conseil"
                class="block py-2 {{ request()->is('le-coin-conseil*') ? 'text-purple font-semibold' : '' }}">Le
                coin conseil</a>
            <a href="/nous-contacter" class="btn-purple block w-full py-2.5 text-center my-2">Nous contacter</a>
        </div>
    </header>

    <main class="flex-grow">
        {{ $slot }}
    </main>

 <footer class="bg-dark-purple text-light-purple px-6 md:px-12 lg:px-20 xl:px-35 pt-12 lg:pt-15 pb-3">
    <!-- APRÈS (corrigé) -->
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-8 lg:gap-10 xl:gap-15 mb-6">
        
        <!-- Bloc 1 : Description -->
        <section>
            <h3 class="title-footer pb-2">Élevage de la Forêt des Rêves</h3>
            <p class="text-sm">Des chiots d'exception, élevés avec passion dans un cadre naturel et familial. Trois
                races d'élite sélectionnées pour leur caractère équilibré et leur santé irréprochable.</p>
        </section>

        <!-- Bloc 2 : Navigation -->
        <section class="lg:ml-10 xl:ml-20">
            <h5 class="!text-light-blue mb-4 !font-medium">Navigation</h5>
            <ul class="text-sm list-none p-0 m-0">
                <li class="my-2 transition-colors duration-300 hover:text-white"><a href="/">Accueil</a></li>
                <li class="my-2 transition-colors duration-300 hover:text-white"><a href="/nos-races">Nos races</a></li>
                <li class="my-2 transition-colors duration-300 hover:text-white"><a href="/le-guide-de-l-adoption">Guide de l'adoption</a></li>
                <li class="my-2 transition-colors duration-300 hover:text-white"><a href="/le-coin-conseil">Le coin conseil</a></li>
                <li class="mt-2 transition-colors duration-300 hover:text-white"><a href="/nous-contacter">Contact</a></li>
            </ul>
        </section>

        <!-- Bloc 3 : Espace vide (uniquement sur PC) -->
        <div class="hidden xl:block"></div>

        <!-- Bloc 4 : Coordonnées -->
        <section>
            <h5 class="!text-light-blue mb-4">Nous retrouver</h5>
            <address class="text-sm not-italic">
                <div class="my-2 flex items-center">
                    <i class="bi bi-telephone text-light-blue pr-2 text-base" aria-hidden="true"></i>
                    <span>+33 6 00 00 00 00</span>
                </div>
                <div class="my-2 transition-colors duration-300 hover:text-white flex items-center">
                    <a href="mailto:elevageforetdesreves@gmail.com">
                        <i class="bi bi-envelope text-light-blue pr-2 text-base" aria-hidden="true"></i>
                        elevageforetdesreves@gmail.com
                    </a>
                </div>
                <div class="my-2 flex items-start">
                    <i class="bi bi-geo-alt text-light-blue pr-2 pt-1" aria-hidden="true"></i>
                    <span>139 VC Cappelle Straete, 59470 Volckerinckhove</span>
                </div>
            </address>
            <div class="text-sm mt-3">
                <h6>Horaires d'ouverture :</h6>
                <p>Lun - Sam · Sur RDV</p>
            </div>
        </section>
    </div>

    <!-- Réseaux sociaux -->
    <div class="flex justify-center items-center gap-6 pb-3">
        <a href="" aria-label="Suivez-nous sur Facebook"><i
                class="bi bi-facebook text-light-blue text-2xl transition-colors duration-300 hover:text-white"></i></a>
        <a href="" aria-label="Suivez-nous sur Instagram"><i
                class="bi bi-instagram text-light-blue text-2xl transition-colors duration-300 hover:text-white"></i></a>
        <a href="" aria-label="Suivez-nous sur Tiktok"><i
                class="bi bi-tiktok text-light-blue text-2xl transition-colors duration-300 hover:text-white"></i></a>
    </div>

    <span class="separator bg-[#8675D2]"></span>

    <div class="footer-bottom text-xs flex flex-col sm:flex-row justify-between items-center text-[#8675D2] gap-2">
        <p class="mt-2">© {{ date('Y') }} Élevage de la Forêt des Rêves · Tous droits réservés.</p>
        <nav aria-label="Liens légaux" class="mt-2">
            <a href="/mentions-legales" class="footer-link">Mentions légales</a> ·
            <a href="/politique-de-confidentialite" class="footer-link">Politique de confidentialité</a>
        </nav>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>