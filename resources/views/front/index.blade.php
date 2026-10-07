<x-layout>
    <section
        class="relative w-full min-h-[70vh] lg:min-h-[90vh] flex items-center justify-center overflow-hidden py-15 px-4">
        <div>
            <img src="{{ asset('images/banniere/banniere.png') }}" alt="Bannière Élevage de la Forêt des Rêves"
                class="absolute inset-0 w-full h-full object-cover" />
        </div>
        <div class="absolute inset-0 bg-dark-purple/65 backdrop-blur-[2.5px]"></div>
        <div class="relative z-10 flex flex-col items-center justify-center text-white text-center">
            <span class="text-light-blue tracking-widest md:text-base text-sm lg:text-lg">Depuis 2000</span>
            <h1 class="title-banniere xl:w-[60%]">Élevage de la <br><i>Forêt des Rêves</i></h1>
            <p class="text-light-grey text-xs md:w-[75%] lg:w-[65%] md:text-sm lg:text-base xl:text-lg tracking-wider">
                Des chiots d'exception, élevés avec passion dans un cadre naturel et familial. Trois races d'élite
                sélectionnées pour leur caractère équilibré et leur santé irréprochable.
            </p>
            <div class="md:flex tracking-wider mt-2 md:mt-4">
                <a href="/nos-races" class="btn-banniere purple md:m-0 mb-3">Découvrir nos races <span aria-hidden="true">→</span></a>
                <a href="/nous-contacter" class="btn-banniere transparent md:m-0 mb-3">Prendre contact <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </section>
    <section class="py-15">
        <div class="text-center mt-8">
            <h3 class="sub-title">Nos races</h3>
            <h2 class="title">Trois races d'exception</h2>
            <h4 class="title-description">Chacune sélectionnée pour ses qualités caractérielles, sa santé et ses
                aptitudes</h4>
        </div>

        <div class="flex justify-center items-center gap-6 my-16 w-full max-w-[1600px] mx-auto px-4 races-container">
            <a href="/nos-races/staffordshire-bull-terrier"
                class="race-card bg-white border border-border-grey rounded-2xl overflow-hidden shadow-[0_10px_30px_-5px_rgba(0,0,0,0.15)]">
                <div class="relative w-full overflow-hidden race-image-container">
                    <img src="{{ asset('images/dog/staf.jpg') }}" alt="photo de Staffordshire Bull Terrier"
                        class="w-full h-full object-cover rounded-t-2xl" />
                    <div class="absolute inset-0 bg-dark-blue/40 transition-opacity duration-300 card-overlay"></div>
                    <h2 class="race-title absolute text-white font-title z-10">Staffordshire Bull Terrier</h2>
                </div>
                <div>
                    <span class="race-tag text-light-blue tracking-wider">Social</span>
                    <p class="race-text text-grey">Le Staffordshire Bull Terrier est un chien affectueux, loyal et
                        courageux.</p>
                    <span class="race-link inline-block text-purple tracking-wider">Voir la race <span aria-hidden="true"><span aria-hidden="true"><span aria-hidden="true"><span aria-hidden="true">→</span></span></span></span></span>
                </div>
            </a>

            <a href="/nos-races/samoyede"
                class="race-card active-card bg-white border border-border-grey rounded-2xl overflow-hidden shadow-[0_10px_30px_-5px_rgba(0,0,0,0.15)] z-10">
                <div class="relative w-full overflow-hidden race-image-container">
                    <img src="{{ asset('images/dog/samo.jpg') }}" alt="photo de Samoyède"
                        class="w-full h-full object-cover rounded-t-2xl" />
                    <div class="absolute inset-0 bg-dark-blue/40 transition-opacity duration-300 card-overlay"></div>
                    <h2 class="race-title absolute text-white font-title z-10">Samoyède</h2>
                </div>
                <div>
                    <span class="race-tag text-light-blue tracking-wider">Social</span>
                    <p class="race-text text-grey">Le Samoyède est un chien affectueux, loyal et courageux.</p>
                    <span class="race-link inline-block text-purple tracking-wider">Voir la race <span aria-hidden="true"><span aria-hidden="true"><span aria-hidden="true"><span aria-hidden="true"><span aria-hidden="true">→</span></span></span></span></span></span>
                </div>
            </a>

            <a href="/nos-races/berger-americain"
                class="race-card bg-white border border-border-grey rounded-2xl overflow-hidden shadow-[0_10px_30px_-5px_rgba(0,0,0,0.15)]">
                <div class="relative w-full overflow-hidden race-image-container">
                    <img src="{{ asset('images/dog/berge.jpg') }}" alt="photo de Berger Américain"
                        class="w-full h-full object-cover rounded-t-2xl" />
                    <div class="absolute inset-0 bg-dark-blue/40 transition-opacity duration-300 card-overlay"></div>
                    <h2 class="race-title absolute text-white font-title z-10">Berger Américain</h2>
                </div>
                <div>
                    <span class="race-tag text-light-blue tracking-wider">Social</span>
                    <p class="race-text text-grey">Le Berger Américain est un chien affectueux, loyal et courageux.</p>
                    <span class="race-link inline-block text-purple tracking-wider">Voir la race <span aria-hidden="true"><span aria-hidden="true"><span aria-hidden="true"><span aria-hidden="true"><span aria-hidden="true">→</span></span></span></span></span></span>
                </div>
            </a>
        </div>
    </section>
    <section class="bg-[#EEF7FF] py-15">
        <div class="text-center pb-10">
            <h3 class="sub-title">Notre histoire</h3>
            <h2 class="title">Une famille, une passion partagée</h2>
            <h4 class="title-description">Chacune sélectionnée pour ses qualités caractérielles, sa santé et ses
                aptitude </h4>
        </div>

        <div class="story-grid max-w-7xl mx-auto px-4 py-12 relative">

            <div class="story-image-col">
                <div class="story-image-wrap relative rounded-2xl overflow-hidden">
                    <img src="{{ asset('images/dog/famille.png') }}" alt="photo des membres de l'élevage"
                        class="w-full h-full object-cover" />
                </div>
            </div>

            <div class="story-badge bg-white text-purple rounded-xl shadow-lg">
                <p class="story-badge-number mb-1 font-title">2 ans</p>
                <small class="story-badge-text tracking-wider">de passion et d'amour pour nos chiens</small>
            </div>

            <div class="story-text-col">
                <p class="story-text">
                    Tout a commencé en 2008 dans les sous-bois de Fontainebleau, quand Sophie et Julien Moreau ont
                    accueilli leur premier Berger Blanc Suisse, Elios. Ce qui n'était au départ qu'un coup de cœur est
                    devenu, au fil des années, une vocation profonde et une discipline exigeante.
                </p>
                <p class="story-text">
                    Tout a commencé en 2008 dans les sous-bois de Fontainebleau, quand Sophie et Julien Moreau ont
                    accueilli leur premier Berger Blanc Suisse, Elios. Ce qui n'était au départ qu'un coup de cœur est
                    devenu, au fil des années, une vocation profonde et une discipline exigeante.
                </p>
                <p class="story-text">
                    Tout a commencé en 2008 dans les sous-bois de Fontainebleau, quand Sophie et Julien Moreau ont
                    accueilli leur premier Berger Blanc Suisse, Elios. Ce qui n'était au départ qu'un coup de cœur est
                    devenu.
                </p>
            </div>
        </div>
    </section>
    <section class="lg:py-15 pt-15 pb-5 overflow-x-clip">
        <div class="text-center pb-10">
            <h3 class="sub-title">Notre engagement</h3>
            <h2 class="title">La qualité avant tout</h2>
            <h4 class="title-description">Chacune sélectionnée pour ses qualités caractérielles, sa santé et ses
                aptitude </h4>
        </div>

        <div class="engagement-wrap ">

            <svg class="engagement-wave wave-desktop" aria-hidden="true" viewBox="0 0 1200 200" preserveAspectRatio="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M-205,40 C-90,40 -90,160 25,160 C140,160 140,40 255,40 C370,40 370,160 485,160 C600,160 600,40 715,40 C830,40 830,160 945,160 C1060,160 1060,40 1175,40" />
            </svg>

            <svg class="engagement-wave wave-tablet" aria-hidden="true" viewBox="0 0 200 800" preserveAspectRatio="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M40,73 L160,291 L40,509 L160,727" />
            </svg>

            <div class="engagement-grid">

                <div class="engagement-card">
                    <div class="engagement-head">
                        <img src="{{ asset('images/icon/Vector.png') }}" aria-hidden="true" class="engagement-icon">
                        <h4 class="engagement-title">Élevage certifié<span>LOF</span></h4>
                    </div>
                    <p class="engagement-text">Tous nos reproducteurs sont inscrits au Livre des Origines Français
                        et testés génétiquement selon les protocoles SCC.</p>
                </div>

                <div class="engagement-card">
                    <div class="engagement-head">
                        <img src="{{ asset('images/icon/Heart with Pulse.png') }}" aria-hidden="true"
                            class="engagement-icon">
                        <h4 class="engagement-title">Suivis de santé<span>rigoureux</span></h4>
                    </div>
                    <p class="engagement-text">Dysplasie, cardiopathies héréditaires, tests ADN — nos protocoles
                        préventifs garantissent la santé de chaque chiot.</p>
                </div>

                <div class="engagement-card">
                    <div class="engagement-head">
                        <img src="{{ asset('images/icon/Users.png') }}" aria-hidden="true" class="engagement-icon">
                        <h4 class="engagement-title">Socilisé le<span>chiot</span></h4>
                    </div>
                    <p class="engagement-text">Dès la naissance, des stimulations sensorielle régulière et des
                        expositions variées à d'autres animaux et ce jusqu'au départ.</p>
                </div>

                <div class="engagement-card">
                    <div class="engagement-head">
                        <img src="{{ asset('images/icon/Heart.png') }}" aria-hidden="true" class="engagement-icon">
                        <h4 class="engagement-title">Suivis post-<span>adoption</span></h4>
                    </div>
                    <p class="engagement-text">Élevés avec amour, nous suivons l'évolution de nos chiots avec grand
                        plaisir. Nous aimons recevoir de leurs nouvelles ou répondre à vos questions.</p>
                </div>

            </div>
        </div>
    </section>
    <x-footer-dossier />
</x-layout>