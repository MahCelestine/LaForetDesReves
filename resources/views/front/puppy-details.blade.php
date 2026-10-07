<x-layout>
    <section class="relative w-full min-h-[60vh] flex flex-col justify-end overflow-hidden">
        <div>
            <img src="{{ asset('storage/' . $puppy->image_path) }}" alt="photo d'un samoyède"
                class="absolute inset-0 w-full h-full object-cover object-[center_15%]" />
        </div>
        <div class="absolute inset-0 bg-dark-purple/65 backdrop-blur-[2.5px]"></div>
        <div class="relative justify-end mb-8 max-md:px-4 md:px-5 xl:ml-40">
            <a href="{{ route('front.breeds.puppies', $breed->slug) }}" class="link-grey"><span aria-hidden="true">←</span> Tous nos chiots</a>
            <h1 class="race-title-des">{{ $puppy->name }}</h1>
        </div>
    </section>
    <section class="flex xl:mx-40 justify-around max-md:my-2 md:my-4">
        <div class="text-center">
            <p class="text-purple font-title md:text-2xl lg:text-3xl font-bold max-md:mb-0! md:mb-2">
                {{ $puppy->birth_date->format('d/m/Y') }}
            </p>
            <small class="text-dark-purple tracking-widest esperance-detail">date de naissance</small>
        </div>
        <div class="text-center">
            <p class="text-purple font-title md:text-2xl lg:text-3xl font-bold max-md:mb-0! md:mb-2">{{ $puppy->color }}
            </p>
            <small class="text-dark-purple tracking-widest esperance-detail">Couleur</small>
        </div>
        <div class="text-center">
            <p class="text-purple font-title md:text-2xl lg:text-3xl font-bold max-md:mb-0! md:mb-2">
                {{ $puppy->birth_weight }}g
            </p>
            <small class="text-dark-purple tracking-widest esperance-detail">Poids à la naissance</small>
        </div>
    </section>
    <div class="max-md:px-4 md:px-5 lg:px-40">
        <span class="separator bg-light-grey"></span>
    </div>
    <section class="max-md:px-4 md:px-5 dog-detail-section">
        <div class="md:my-5 max-md:my-3 w-[100%] xl:w-[60%]">
            <small class="sub-title">Le chiots</small>
            <h2 class="title">A propos</h2>
            <p class="text-detail-race text-dark-purple text-lg">{{ $puppy->description }}</p>
        </div>
        <div class="race-detail-table-col flex justify-center puppy-info-block">
            <table class="temperament-table">
                <thead>
                    <tr>
                        <td colspan="2">Informations</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="flex">
                        <td>Sexe</td>
                        <td class="value">{{ $puppy->sex == 'male' ? 'Mâle' : 'Femelle' }}</td>
                    </tr>
                    <tr class="flex">
                        <td>Numéro d'identification</td>
                        <td class="value">{{ $puppy->identification_number }}</td>
                    </tr>
                    <tr class="flex">
                        <td>Statut</td>
                        <td class="value">{{ $puppy->status }}</td>
                    </tr>
                    <tr class="flex">
                        <td>Date de disponibilité</td>
                        <td class="value">{{ $puppy->adoption_date->format('d/m/Y') }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="puppy-price-block">
                <h5 class="puppy-price">{{ $puppy->price }} €</h5>
                <a href="/nous-contacter" class="btn-purple-normal">Déposer son dossier <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </section>
    <section class="max-md:px-4 md:px-5 dog-detail-section-parents">
        <h2 class="title">Parents</h2>

        @php
            $mom = $puppy->litter->mom;
            $dad = $puppy->litter->dad;
        @endphp

        <div class="litter-group">
            <div class="litter-header">
                <span class="litter-label hide-on-mobile">Chiots de</span>
                <div class="litter-parents-wrapper">
                    <div class="litter-parent-card">
                        <img src="{{ asset('storage/' . $dad->image_path) }}" alt="photo de {{ $dad->name_affix }}"
                            class="litter-parent-img">

                        <div class="litter-parent-body">
                            <h4 class="litter-parent-name">{{ $dad->name_affix }}
                                @if ($dad->is_external)
                                    - Externe à l'élevage
                                @endif
                            </h4>
                            <p class="litter-parent-meta">{{ $dad->sex == 'male' ? 'Mâle' : 'Femelle' }}</p>

                            <div class="litter-parent-footer">
                                <span class="litter-parent-date">{{ $dad->birth_date->format('d/m/Y') }}</span>
                                <a href="{{ route('front.breeds.dog-details', ['slug' => $breed->slug, 'dogSlug' => $dad->slug]) }}"
                                    class="litter-parent-link" aria-label="Voir la fiche du père {{ $dad->name_affix }}">Voir le parent <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    </div>
                    <span class="litter-separator-et">et</span>
                    <div class="litter-parent-card">
                        <img src="{{ asset('storage/' . $mom->image_path) }}" alt="photo de {{ $mom->name_affix }}"
                            class="litter-parent-img">

                        <div class="litter-parent-body">
                            <h4 class="litter-parent-name">{{ $mom->name_affix }}
                                @if ($mom->is_external)
                                    - Externe à l'élevage
                                @endif
                            </h4>
                            <p class="litter-parent-meta">{{ $mom->sex == 'male' ? 'Mâle' : 'Femelle' }}</p>

                            <div class="litter-parent-footer">
                                <span class="litter-parent-date">{{ $mom->birth_date->format('d/m/Y') }}</span>
                                <a href="{{ route('front.breeds.dog-details', ['slug' => $breed->slug, 'dogSlug' => $mom->slug]) }}"
                                    class="litter-parent-link" aria-label="Voir la fiche de la mère {{ $mom->name_affix }}">Voir le parent <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="siblings-group">
            <h3 class="title">Autres chiots de la portée</h3>

            <div class="reproducteurs-list my-4">
                @foreach ($puppy->litter->puppies as $sibling)
                    @if ($sibling->id !== $puppy->id)
                        <div class="reproducteur-card">
                            <div class="relative">
                                <img src="{{ asset('storage/' . $sibling->image_path) }}"
                                    alt="photo du chiot {{ $sibling->name }}" class="reproducteur-card-img">
                                @if($sibling->status)
                                    @php
                                        $statusLower = strtolower($sibling->status);
                                        $statusClass = 'available';
                                        if (str_contains($statusLower, 'réservé') || str_contains($statusLower, 'reserve')) {
                                            $statusClass = 'reserved';
                                        } elseif (str_contains($statusLower, 'vendu')) {
                                            $statusClass = 'sold';
                                        }
                                    @endphp
                                    <span class="puppy-status-badge {{ $statusClass }}">{{ $sibling->status }}</span>
                                @endif
                            </div>
                            <div class="reproducteur-card-body">
                                <div>
                                    <h3 class="reproducteur-card-name">{{ $sibling->name }}</h3>
                                    <p class="reproducteur-card-litters">Né le {{ $sibling->birth_date->format('d/m/Y') }} ·
                                        {{ $sibling->sex === 'male' ? 'Mâle' : 'Femelle' }}
                                    </p>
                                </div>
                                <div class="reproducteur-card-footer">
                                    <small class="reproducteur-card-meta">{{ $sibling->color }}</small>
                                    <span class="price-card">{{ $sibling->price }} €</span>
                                </div>
                            </div>
                            <div class="p-3 pt-0">
                                <a href="{{ route('front.breeds.puppy-details', ['slug' => $breed->slug, 'puppySlug' => $sibling->slug]) }}"
                                    class="link-purple-card-list" aria-label="Voir les détails du chiot {{ $sibling->name }}">Voir plus <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    @if (!empty($puppy->pictures) && count($puppy->pictures) > 0)
        <section class="py-6 w-full overflow-hidden" x-data="{
                        activeSlide: 0,
                        realTotal: {{ count($puppy->pictures) }},
                        timer: null,
                        isTransitioning: true,
                        startAutoPlay() {
                            this.timer = setInterval(() => {
                                this.next();
                            }, 1500); // Vitesse : 1.5 seconde
                        },
                        stopAutoPlay() {
                            clearInterval(this.timer);
                        },
                        next() {
                            this.isTransitioning = true;
                            this.activeSlide++;

                            // Si on arrive à la fin de la première boucle d'images
                            if (this.activeSlide >= this.realTotal) {
                                setTimeout(() => {
                                    this.isTransitioning = false;
                                    this.activeSlide = 0;
                                }, 500);
                            }
                        },
                        prev() {
                            if (this.activeSlide === 0) {
                                this.isTransitioning = false;
                                this.activeSlide = this.realTotal;
                                setTimeout(() => {
                                    this.isTransitioning = true;
                                    this.activeSlide = this.realTotal - 1;
                                }, 50);
                            } else {
                                this.isTransitioning = true;
                                this.activeSlide--;
                            }
                        }
                    }" x-init="startAutoPlay()" @mouseenter="stopAutoPlay()" @mouseleave="startAutoPlay()">

            <div class="relative w-full group">
                <!-- Container des images -->
                <div class="flex" :class="isTransitioning ? 'transition-transform duration-500 ease-out' : ''"
                    :style="`transform: translateX(-${activeSlide * 33.333333}%);`">

                    {{-- 1. Toutes les images principales du chiot --}}
                    @foreach ($puppy->pictures as $picture)
                        <div class="w-1/3 flex-shrink-0 px-1">
                            <img src="{{ asset('storage/' . $picture->image_path) }}" alt="Photo de {{ $puppy->name }}"
                                class="w-full h-[300px] md:h-[450px] object-cover" />
                        </div>
                    @endforeach

                    {{-- 2. Clones automatiques des 3 premières images (pour la boucle infinie sans trou) --}}
                    @php
                        $clones = $puppy->pictures->take(3);
                        while ($clones->count() < 3 && $puppy->pictures->count() > 0) {
                            $clones = $clones->concat($puppy->pictures)->take(3);
                        }
                    @endphp

                    @foreach ($clones as $picture)
                        <div class="w-1/3 flex-shrink-0 px-1">
                            <img src="{{ asset('storage/' . $picture->image_path) }}" alt="Photo de {{ $puppy->name }}"
                                class="w-full h-[300px] md:h-[450px] object-cover" />
                        </div>
                    @endforeach
                </div>

                <!-- Flèche Précédent (Bouton violet rond) -->
                <button @click="prev()" type="button" aria-label="Image précédente"
                    style="background-color: rgba(79, 52, 199, 0.65); border-radius: 9999px;"
                    class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center text-white shadow-lg hover:opacity-100 focus:outline-none transition-opacity z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <!-- Flèche Suivant (Bouton violet rond) -->
                <button @click="next()" type="button" aria-label="Image suivante"
                    style="background-color: rgba(79, 52, 199, 0.65); border-radius: 9999px;"
                    class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center text-white shadow-lg hover:opacity-100 focus:outline-none transition-opacity z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Indicateurs (Points gris & violet actif 100% arrondis) -->
            <div class="flex justify-center items-center gap-2 mt-4">
                @foreach ($puppy->pictures as $index => $picture)
                    <button @click="activeSlide = {{ $index }}" type="button" aria-label="Aller à l'image {{ $index + 1 }}"
                        class="h-3 transition-all duration-300" :style="`
                                                            border-radius: 9999px;
                                                            width: ${(activeSlide % realTotal) === {{ $index }} ? '32px' : '12px'};
                                                            background-color: ${(activeSlide % realTotal) === {{ $index }} ? '#4F34C7' : '#D1D5DB'};
                                                        `">
                    </button>
                @endforeach
            </div>
        </section>
    @endif
    <x-footer-dossier />
</x-layout>