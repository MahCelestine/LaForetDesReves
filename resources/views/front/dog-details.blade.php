<x-layout>
    <section>
        <a href="{{ route('front.breeds.dogs', $breed->slug) }}">← Toutes nos reproducteurs</a>
        <h1>{{ $dog->name_affix }}
            @if ($dog->is_external)
                - Externe à l'élevage
            @endif
        </h1>
    </section>
    <section>
        <div>
            <p>{{ \Carbon\Carbon::parse($dog->birth_date)->age }} ans</p>
            <small>Age</small>
        </div>
        <div>
            <p>{{ $dog->color }}</p>
            <small>Couleur</small>
        </div>
        <div>
            <p>{{ $dog->common_name }}</p>
            <small>Nom d'usage</small>
        </div>
    </section>
    <span></span>
    <section>
        <div>
            <small>Le chien</small>
            <h2>A propos</h2>
            <p>{{ $dog->description }}</p>
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
                        <td>{{ $dog->sex == 'male' ? 'Mâle' : 'Femelle' }}</td>
                    </tr>
                    <tr>
                        <td>Couleur</td>
                        <td>{{ $dog->color }}</td>
                    </tr>
                    <tr>
                        <td>Numéro d'identification</td>
                        <td>{{ $dog->identification_number }}</td>
                    </tr>
                    <tr>
                        <td>Inscrit au LOF ?</td>
                        <td>{{ $dog->LOF == 1 ? 'Oui' : 'Non' }}</td>
                    </tr>
                    <tr>
                        <td>Cotation</td>
                        <td>{{ $dog->cotation }}</td>
                    </tr>
                    <tr>
                        <td>Retraité ?</td>
                        <td>{{ $dog->retirement == 1 ? 'Oui' : 'Non' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <section>
        <div>
            <div>
                <small>Portée</small>
                <h2>Chiots</h2>
            </div>
            <a href="{{ route('front.breeds.puppies', $breed->slug) }}">Voir plus →</a>
        </div>
        <div>
            <div>
                <small>Disponibles</small>
                @forelse ($availablePuppies as $puppy)
                    <div>
                        <img src="{{ asset('storage/' . $puppy->image_path) }}" alt="photo du chiot {{ $puppy->name }}" />
                        <div>
                            <p>{{ $puppy->name }}</p>
                            <div>
                                <div>
                                    <small>{{ $puppy->sex == 'male' ? 'Mâle' : 'Femelle' }}</small>
                                    <small>{{ $puppy->birth_date->format('d/m/Y') }}</small>
                                </div>
                                <p>{{ $puppy->price }} €</p>
                            </div>
                        </div>
                        </a>
                    </div>
                @empty
                    <p>Aucun chiot disponible pour le moment.</p>
                @endforelse
            </div>
            <div>
                <small>Ancienne</small>
                @forelse ($otherPuppies as $puppy)
                    <div>
                        <img src="{{ asset('storage/' . $puppy->image_path) }}" alt="photo du chiot {{ $puppy->name }}" />
                        <div>
                            <p>{{ $puppy->name }}</p>
                            <small>{{ $puppy->sex == 'male' ? 'Mâle' : 'Femelle' }}</small>
                            <small>{{ $puppy->birth_date->format('d/m/Y') }}</small>
                        </div>
                    </div>
                @empty
                    <p>Ce chien n'a pas d'anciens chiot pour le moment.</p>
                @endforelse
            </div>
    </section>
    @if (!empty($dog->pictures) && count($dog->pictures) > 0)
        <section class="py-6 w-full overflow-hidden" x-data="{
                        activeSlide: 0,
                        realTotal: {{ count($dog->pictures) }},
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
                                    // Désactive la transition pour revenir au début de manière invisible
                                    this.isTransitioning = false;
                                    this.activeSlide = 0;
                                }, 500); // 500ms correspond à la durée de duration-500
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
                <div class="flex" :class="isTransitioning ? 'transition-transform duration-500 ease-out' : ''"
                    :style="`transform: translateX(-${activeSlide * 33.333333}%);`">
                    @foreach ($dog->pictures as $picture)
                        <div class="w-1/3 flex-shrink-0 px-1">
                            <img src="{{ asset('storage/' . $picture->image_path) }}" alt="Photo de {{ $dog->common_name }}"
                                class="w-full h-[300px] md:h-[450px] object-contain" />
                        </div>
                    @endforeach
                    @php
                        $clones = $dog->pictures->take(3);
                        while ($clones->count() < 3 && $dog->pictures->count() > 0) {
                            $clones = $clones->concat($dog->pictures)->take(3);
                        }
                    @endphp

                    @foreach ($clones as $picture)
                        <div class="w-1/3 flex-shrink-0 px-1">
                            <img src="{{ asset('storage/' . $picture->image_path) }}" alt="Photo de {{ $dog->common_name }}"
                                class="w-full h-[300px] md:h-[450px] object-contain" />
                        </div>
                    @endforeach
                </div>
                <button @click="prev()" type="button"
                    style="background-color: rgba(79, 52, 199, 0.65); border-radius: 9999px;"
                    class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center text-white shadow-lg hover:opacity-100 focus:outline-none transition-opacity z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="next()" type="button"
                    style="background-color: rgba(79, 52, 199, 0.65); border-radius: 9999px;"
                    class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center text-white shadow-lg hover:opacity-100 focus:outline-none transition-opacity z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
            <div class="flex justify-center items-center gap-2 mt-4">
                @foreach ($dog->pictures as $index => $picture)
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