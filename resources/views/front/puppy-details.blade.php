<x-layout>
    <section>
        <a href="{{ route('front.breeds.puppies', $breed->slug) }}">← Toutes nos chiots</a>
        <h1>{{ $puppy->name }}</h1>
    </section>
    <section>
        <div>
            <p>{{ $puppy->birth_date->format('d/m/Y') }}</p>
            <small>date de naissance</small>
        </div>
        <div>
            <p>{{ $puppy->color }}</p>
            <small>Couleur</small>
        </div>
        <div>
            <p>{{ $puppy->birth_weight }}g</p>
            <small>Poids à la naissance</small>
        </div>
    </section>
    <span></span>
    <section>
        <div>
            <small>Le chiots</small>
            <h2>A propos</h2>
            <p>{{ $puppy->description }}</p>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Informations</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sexe</td>
                        <td>{{ $puppy->sex == 'male' ? 'Mâle' : 'Femelle' }}</td>
                    </tr>
                    <tr>
                        <td>Numéro d'identification</td>
                        <td>{{ $puppy->identification_number }}</td>
                    </tr>
                    <tr>
                        <td>Statut</td>
                        <td>{{ $puppy->status }}</td>
                    </tr>
                    <tr>
                        <td>Date de disponibilité</td>
                        <td>{{ $puppy->adoption_date->format('d/m/Y') }}</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <h5>{{ $puppy->price }} €</h5>
                <a href="/nous-contacter">Déposer son dossier →</a>
            </div>
        </div>
    </section>
    <section>
        <h2>Parents</h2>
        <div>
            <p>Chiots de</p>
            @php
                $mom = $puppy->litter->mom;
                $dad = $puppy->litter->dad;
            @endphp
            <div>
                <img src="{{ asset('storage/' . $dad->image_path) }}" alt="photo de {{ $dad->name_affix }}">
                <div>
                    <h4>{{ $dad->name_affix }}
                        @if ($dad->is_external)
                            - Externe à l'élevage
                        @endif
                    </h4>
                    <p>{{ $dad->sex == 'male' ? 'Mâle' : 'Femelle' }}</p>
                    <div>
                        <small>{{ $dad->birth_date->format('d/m/Y') }}</small>
                        <a
                            href="{{ route('front.breeds.dog-details', ['slug' => $breed->slug, 'dogSlug' => $dad->slug]) }}">Voir
                            le parent →</a>
                    </div>
                </div>
            </div>
            <p>et</p>
            <div>
                <img src="{{ asset('storage/' . $mom->image_path) }}" alt="photo de {{ $mom->name_affix }}">
                <div>
                    <h4>{{ $mom->name_affix }}
                        @if ($mom->is_external)
                            - Externe à l'élevage
                        @endif
                    </h4>
                    <p>{{ $mom->sex == 'male' ? 'Mâle' : 'Femelle' }}</p>
                    <div>
                        <small>{{ $mom->birth_date->format('d/m/Y') }}</small>
                        <a
                            href="{{ route('front.breeds.dog-details', ['slug' => $breed->slug, 'dogSlug' => $mom->slug]) }}">Voir
                            le parent →</a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h3>Autres chiots de la portée</h3>
            <div>
                @foreach ($puppy->litter->puppies as $sibling)
                    @if ($sibling->id !== $puppy->id)
                        <div>
                            <div>
                                <img src="{{ asset('storage/' . $sibling->image_path) }}"
                                    alt="photo du chiot {{ $sibling->name }}">
                                <span>{{ $sibling->status }}</span>
                            </div>
                            <div>
                                <h4>{{ $sibling->name }}</h4>
                                <div>
                                    <div>
                                        <p>{{ $sibling->sex == 'male' ? 'Mâle' : 'Femelle' }}</p>
                                        <small>{{ $sibling->birth_date->format('d/m/Y') }}</small>
                                    </div>
                                    <p>{{ $sibling->price }} €</p>
                                </div>
                            </div>
                            <a
                                href="{{ route('front.breeds.puppy-details', ['slug' => $breed->slug, 'puppySlug' => $sibling->slug]) }}">Voir
                                plus →</a>
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
                            <img src="{{ asset('storage/' . $picture->image_path) }}" alt="Photo de {{ $puppy->common_name }}"
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
                            <img src="{{ asset('storage/' . $picture->image_path) }}" alt="Photo de {{ $puppy->common_name }}"
                                class="w-full h-[300px] md:h-[450px] object-cover" />
                        </div>
                    @endforeach
                </div>

                <!-- Flèche Précédent (Bouton violet rond) -->
                <button @click="prev()" type="button"
                    style="background-color: rgba(79, 52, 199, 0.65); border-radius: 9999px;"
                    class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center text-white shadow-lg hover:opacity-100 focus:outline-none transition-opacity z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <!-- Flèche Suivant (Bouton violet rond) -->
                <button @click="next()" type="button"
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
                    <button @click="activeSlide = {{ $index }}" type="button" class="h-3 transition-all duration-300" :style="`
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