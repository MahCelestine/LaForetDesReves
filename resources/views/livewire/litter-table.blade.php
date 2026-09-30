<div class="litters-container py-4">
    @foreach ($litters as $litter)
        <div class="litter-group">
            <!-- En-tête avec les parents -->
            <div class="litter-header">
                <span class="litter-label hide-on-mobile">Chiots de</span>

                <div class="litter-parents-wrapper">
                    <!-- Carte du Père -->
                    <div class="litter-parent-card">
                        <img src="{{ asset('storage/' . $litter->dad->image_path) }}"
                            alt="photo du reproducteur {{ $litter->dad->common_name }}" class="litter-parent-img">

                        <div class="litter-parent-body">
                            <h4 class="litter-parent-name">{{ $litter->dad->common_name }}</h4>
                            <p class="litter-parent-meta">{{ $litter->dad->sex === 'male' ? 'Mâle' : 'Femelle' }}</p>

                            <div class="litter-parent-footer">
                                <span class="litter-parent-date">{{ $litter->dad->birth_date->format('Y') }}</span>
                                <a href="{{ route('front.breeds.dog-details', ['slug' => $breed->slug, 'dogSlug' => $litter->dad->slug]) }}"
                                    class="litter-parent-link">Voir le parent →</a>
                            </div>
                        </div>
                    </div>

                    <span class="litter-separator-et">et</span>

                    <!-- Carte de la Mère -->
                    <div class="litter-parent-card">
                        <img src="{{ asset('storage/' . $litter->mom->image_path) }}"
                            alt="photo de la reproductrice {{ $litter->mom->common_name }}" class="litter-parent-img">

                        <div class="litter-parent-body">
                            <h4 class="litter-parent-name">{{ $litter->mom->common_name }}</h4>
                            <p class="litter-parent-meta">{{ $litter->mom->sex === 'male' ? 'Mâle' : 'Femelle' }}</p>

                            <div class="litter-parent-footer">
                                <span class="litter-parent-date">{{ $litter->mom->birth_date->format('Y') }}</span>
                                <a href="{{ route('front.breeds.dog-details', ['slug' => $breed->slug, 'dogSlug' => $litter->mom->slug]) }}"
                                    class="litter-parent-link">Voir le parent →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Liste des chiots ou message si vide -->
            @if(isset($litter->puppies) && $litter->puppies->isNotEmpty())
                <div class="reproducteurs-list my-4">
                    @foreach ($litter->puppies as $puppy)
                        <div class="reproducteur-card">
                            <div class="relative">
                                <img src="{{ asset('storage/' . $puppy->image_path) }}" alt="photo du chiot {{ $puppy->name }}"
                                    class="reproducteur-card-img">
                                @if($puppy->status)
                                    @php
                                        $statusLower = strtolower($puppy->status);
                                        $statusClass = 'available'; // par défaut
                                        if (str_contains($statusLower, 'réservé') || str_contains($statusLower, 'reserve')) {
                                            $statusClass = 'reserved';
                                        } elseif (str_contains($statusLower, 'vendu')) {
                                            $statusClass = 'sold';
                                        }
                                    @endphp

                                    <span class="puppy-status-badge {{ $statusClass }}">{{ $puppy->status }}</span>
                                @endif
                            </div>
                            <div class="reproducteur-card-body">
                                <div>
                                    <h4 class="reproducteur-card-name">{{ $puppy->name }}</h4>
                                    <p class="reproducteur-card-litters">Né le {{ $puppy->birth_date->format('d/m/Y') }} ·
                                        {{ $puppy->sex === 'male' ? 'Mâle' : 'Femelle' }}
                                    </p>
                                </div>
                                <div class="reproducteur-card-footer">
                                    <small class="reproducteur-card-meta">{{ $puppy->color }}</small>
                                    <h5 class="price-card">{{ $puppy->price }} €</h5>
                                </div>
                            </div>
                            <div class="p-3 pt-0">
                                <a href="{{ route('front.breeds.puppy-details', ['slug' => $breed->slug, 'puppySlug' => $puppy->slug]) }}"
                                    class="link-purple-card-list">Voir plus →</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="no-puppies-msg">Aucun chiot disponible pour le moment dans cette portée.</p>
            @endif
        </div>
    @endforeach
</div>