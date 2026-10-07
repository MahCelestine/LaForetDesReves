<x-layout>
    <div class="md:py-10 py-4 xl:px-40 md:px-5 max-md:px-2">
        <h2 class="sub-title">Nos races</h2>
        <h1 class="title">Trois races d'élite</h1>
        <h3 class="title-description">Chacune sélectionnée pour ses qualités caractérielles, sa santé et ses aptitude
        </h3>
    </div>
    <section class="md:px-5 max-md:px-2 xl:px-40">
        <div class="race-feature border-2 border-border-grey rounded-4xl overflow-hidden mb-10">
            <img src="{{ asset('images/races/samo.png') }}" alt="photo d'un samoyède"
                class="race-feature-img object-cover" />

            <div class="race-feature-body">

                <div>
                    <h3 class="card-sub-title">Standard FCI n°212</h3>
                    <h2 class="card-title">Samoyède</h2>
                    <h4 class="card-title-description">Adjectif de la race</h4>
                </div>

                <div class="race-feature-middle mt-4">
                    <p class="text-dark-purple text-card-race">Tout a commencé en 2008 dans les sous-bois de
                        Fontainebleau, quand Sophie et Julien Moreau ont accueilli leur premier Berger Blanc Suisse,
                        Elios. Ce qui n'était au départ qu'un coup de cœur est devenu, au fil des années, une vocation
                        profonde et une discipline exigeante.</p>

                    <div class="race-feature-stats mb-4">
                        <div class="race-stat border-2 border-border-grey rounded-lg">
                            <small class="title-sub-card-text text-purple tracking-widest">Espérance de vie</small>
                            <p class="font-title text-dark-purple font-semibold descrip-sub-card-text">12 à 14 ans</p>
                        </div>
                        <div class="race-stat border-2 border-border-grey rounded-lg">
                            <small class="title-sub-card-text text-purple tracking-widest">Taille adulte</small>
                            <p class="font-title text-dark-purple font-semibold descrip-sub-card-text">48 - 60 cm</p>
                        </div>
                    </div>
                </div>
                <div class="race-feature-footer">
                    <a href="{{ route('front.breeds.show', 'samoyede') }}"
                        class="btn-purple-normal tracking-wider">Découvrir la race <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
        <div class="race-feature race-feature--reverse border-2 border-border-grey rounded-4xl overflow-hidden mb-10">
            <div class="race-feature-body">
                <div>
                    <h3 class="card-sub-title">Standard FCI n°76</h3>
                    <h2 class="card-title">Staffordshire Bull Terrier</h2>
                    <h4 class="card-title-description">Adjectif de la race</h4>
                </div>
                <div class="race-feature-middle mt-4">
                    <p class="text-dark-purple text-card-race">Tout a commencé en 2008 dans les sous-bois de
                        Fontainebleau, quand Sophie et Julien Moreau ont
                        accueilli leur premier Berger Blanc Suisse, Elios. Ce qui n'était au départ qu'un coup de cœur
                        est
                        devenu, au fil des années, une vocation profonde et une discipline exigeant</p>
                    <div class="race-feature-stats mb-4">
                        <div class="race-stat border-2 border-border-grey rounded-lg">
                            <small class="title-sub-card-text text-purple tracking-widest">Espérance de vie</small>
                            <p class="font-title text-dark-purple font-semibold descrip-sub-card-text">12 à 14 ans</p>
                        </div>
                        <div class="race-stat border-2 border-border-grey rounded-lg">
                            <small class="title-sub-card-text text-purple tracking-widest">Taille adulte</small>
                            <p class="font-title text-dark-purple font-semibold descrip-sub-card-text">33 - 41 cm</p>
                        </div>
                    </div>
                    <div class="race-feature-footer">
                        <a href="{{ route('front.breeds.show', 'staffordshire-bull-terrier') }}"
                            class="btn-purple-normal tracking-wider">Découvrir la race <span aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
            <img src="{{ asset('images/races/staf.png') }}" alt="photo d'un Staffordshire Bull Terrier"
                class="race-feature-img object-cover" />
        </div>
        <div class="race-feature border-2 border-border-grey rounded-4xl overflow-hidden mb-10">
            <img src="{{ asset('images/races/berge.png') }}" alt="photo d'un berger américain"
                class="race-feature-img object-cover" />
            <div class="race-feature-body">
                <div>
                    <h3 class="card-sub-title">Standard FCI n°367</h3>
                    <h2 class="card-title">Berger Américain</h2>
                    <h4 class="card-title-description">Adjectif de la race</h4>
                </div>
                <div class="race-feature-middle mt-4">
                    <p class="text-dark-purple text-card-race">Tout a commencé en 2008 dans les sous-bois de
                        Fontainebleau, quand Sophie et Julien Moreau ont
                        accueilli leur premier Berger Blanc Suisse, Elios. Ce qui n'était au départ qu'un coup de cœur
                        est
                        devenu, au fil des années, une vocation profonde et une discipline exigeant</p>
                    <div class="race-feature-stats mb-4">
                        <div class="race-stat border-2 border-border-grey rounded-lg">
                            <small class="title-sub-card-text text-purple tracking-widest">Espérance de vie</small>
                            <p class="font-title text-dark-purple font-semibold descrip-sub-card-text">12 à 13 ans</p>
                        </div>
                        <div class="race-stat border-2 border-border-grey rounded-lg">
                            <small class="title-sub-card-text text-purple tracking-widest">Taille adulte</small>
                            <p class="font-title text-dark-purple font-semibold descrip-sub-card-text">33 - 46 cm</p>
                        </div>
                    </div>
                    <div class="race-feature-footer">
                        <a href="{{ route('front.breeds.show', 'berger-americain') }}"
                            class="btn-purple-normal tracking-wider">Découvrir la race <span aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer-dossier />
</x-layout>