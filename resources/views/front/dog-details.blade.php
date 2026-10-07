<x-layout>
    <section class="relative w-full min-h-[60vh] flex flex-col justify-end overflow-hidden">
        <div>
            <img src="{{ asset('storage/' . $dog->image_path) }}" alt="photo d'un samoyède"
                class="absolute inset-0 w-full h-full object-cover object-[center_15%]" />
        </div>
        <div class="absolute inset-0 bg-dark-purple/65 backdrop-blur-[2.5px]"></div>
        <div class="relative justify-end mb-8 max-md:px-4 md:px-5 xl:ml-40">
            <a href="{{ route('front.breeds.dogs', $breed->slug) }}" class="link-grey"><span aria-hidden="true">←</span> Tous nos reproducteurs</a>
            <h1 class="race-title-des">{{ $dog->name_affix }}
                @if ($dog->is_external)
                    - Externe à l'élevage
                @endif
            </h1>
        </div>
    </section>
    <section class="flex xl:mx-40 justify-around max-md:my-2 md:my-4">
        <div class="text-center">
            <p class="text-purple font-title md:text-2xl lg:text-3xl font-bold max-md:mb-0! md:mb-2">
                {{ \Carbon\Carbon::parse($dog->birth_date)->age }} ans
            </p>
            <small class="text-dark-purple tracking-widest esperance-detail">Age</small>
        </div>
        <div class="text-center">
            <p class="text-purple font-title md:text-2xl lg:text-3xl font-bold max-md:mb-0! md:mb-2">{{ $dog->color }}
            </p>
            <small class="text-dark-purple tracking-widest esperance-detail">Couleur</small>
        </div>
        <div class="text-center">
            <p class="text-purple font-title md:text-2xl lg:text-3xl font-bold max-md:mb-0! md:mb-2">
                {{ $dog->common_name }}
            </p>
            <small class="text-dark-purple tracking-widest esperance-detail">Nom d'usage</small>
        </div>
    </section>
    <div class="max-md:px-4 md:px-5 lg:px-40">
        <span class="separator bg-light-grey"></span>
    </div>
    <section class="max-md:px-4 md:px-5 dog-detail-section">
        <div class="md:my-5 max-md:my-3 w-[100%] xl:w-[60%]">
            <small class="sub-title">Le chien</small>
            <h2 class="title">A propos</h2>
            <p class="text-detail-race text-dark-purple text-lg">{{ $dog->description }}</p>
        </div>
        <div class="race-detail-table-col flex justify-center">
            <table class="temperament-table">
                <thead>
                    <tr>
                        <td colspan="2">Informations</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="flex">
                        <td>Sexe</td>
                        <td class="value">{{ $dog->sex == 'male' ? 'Mâle' : 'Femelle' }}</td>
                    </tr>
                    <tr class="flex">
                        <td>Couleur</td>
                        <td class="value">{{ $dog->color }}</td>
                    </tr>
                    <tr class="flex">
                        <td>Numéro d'identification</td>
                        <td class="value">{{ $dog->identification_number }}</td>
                    </tr>
                    <tr class="flex">
                        <td>Inscrit au LOF ?</td>
                        <td class="value">{{ $dog->LOF == 1 ? 'Oui' : 'Non' }}</td>
                    </tr>
                    <tr class="flex">
                        <td>Cotation</td>
                        <td class="value">{{ $dog->cotation }}</td>
                    </tr>
                    <tr class="flex">
                        <td>Retraité ?</td>
                        <td class="value">{{ $dog->retirement == 1 ? 'Oui' : 'Non' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <section class="max-md:px-4 md:px-5 race-detail-section-2">
        <div class="lg:my-5 max-lg:my-3  flex justify-between items-center">
            <div>
                <small class="sub-title">Portée</small>
                <h2 class="title">Chiots</h2>
            </div>
            <a href="{{ route('front.breeds.puppies', $breed->slug) }}" class="link-purple" aria-label="Voir plus de chiots">Voir plus <span aria-hidden="true">→</span></a>
        </div>
        <div>
            <div>
                <small class="sub-title">Disponibles</small>
                <div class="reproducteurs-list my-4">
                    @forelse ($availablePuppies as $puppy)
                        <div class="reproducteur-card">
                            <img src="{{ asset('storage/' . $puppy->image_path) }}" alt="photo du chiot {{ $puppy->name }}"
                                class="reproducteur-card-img">
                            <div class="reproducteur-card-body">
                                <div>
                                    <h3 class="reproducteur-card-name">{{ $puppy->name }}</h3>
                                    <p class="reproducteur-card-litters">Né le {{ $puppy->birth_date->format('d/m/Y') }} ·
                                        {{ $puppy->sex === 'male' ? 'Mâle' : 'Femelle' }}
                                    </p>
                                </div>
                                <div class="reproducteur-card-footer">
                                    <small class="reproducteur-card-meta">{{ $puppy->color }}</small>
                                    <span class="price-card">{{ $puppy->price }} €</span>
                                </div>
                            </div>
                            <div class="p-3 pt-0">
                                <a href="{{ route('front.breeds.puppy-details', ['slug' => $breed->slug, 'puppySlug' => $puppy->slug]) }}"
                                    class="link-purple-card-list" aria-label="Voir plus de détails sur le chiot {{ $puppy->name }}">Voir plus <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    @empty
                        <p>Aucun chiot disponible pour le moment.</p>
                    @endforelse
                </div>
            </div>
            <div>
                <small class="sub-title">Ancienne</small>
                <div class="reproducteurs-list my-4">
                    @forelse ($otherPuppies as $puppy)
                        <div class="reproducteur-card">
                            <img src="{{ asset('storage/' . $puppy->image_path) }}" alt="photo du chiot {{ $puppy->name }}"
                                class="reproducteur-card-img">
                            <div class="reproducteur-card-body">
                                <div>
                                    <h3 class="reproducteur-card-name">{{ $puppy->name }}</h3>
                                    <p class="reproducteur-card-litters">Né le {{ $puppy->birth_date->format('d/m/Y') }} ·
                                        {{ $puppy->sex === 'male' ? 'Mâle' : 'Femelle' }}
                                    </p>
                                </div>
                                <div class="reproducteur-card-footer">
                                    <small class="reproducteur-card-meta">{{ $puppy->color }}</small>
                                </div>
                            </div>
                            <div class="p-3 pt-0">
                                <a href="{{ route('front.breeds.puppy-details', ['slug' => $breed->slug, 'puppySlug' => $puppy->slug]) }}"
                                    class="link-purple-card-list" aria-label="Voir plus de détails sur le chiot {{ $puppy->name }}">Voir plus <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    @empty
                        <p>Ce chien n'a pas d'anciens chiot pour le moment.</p>
                    @endforelse
                </div>
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
                                                }" x-init="startAutoPlay()" @mouseenter="stopAutoPlay()"
            @mouseleave="startAutoPlay()">

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
                <button @click="prev()" type="button" aria-label="Image précédente"
                    style="background-color: rgba(79, 52, 199, 0.65); border-radius: 9999px;"
                    class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center text-white shadow-lg hover:opacity-100 focus:outline-none transition-opacity z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="next()" type="button" aria-label="Image suivante"
                    style="background-color: rgba(79, 52, 199, 0.65); border-radius: 9999px;"
                    class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center text-white shadow-lg hover:opacity-100 focus:outline-none transition-opacity z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
            <div class="flex justify-center items-center gap-2 mt-4">
                @foreach ($dog->pictures as $index => $picture)
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