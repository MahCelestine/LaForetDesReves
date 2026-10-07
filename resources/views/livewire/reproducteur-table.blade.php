<div class="reproducteurs-list mt-4">
    @foreach ($dogs as $dog)
        <div class="reproducteur-card">
            <img src="{{ asset('storage/' . $dog->image_path) }}" alt="{{ $dog->common_name }}, reproducteur de l'élevage" class="reproducteur-card-img" />
            <div class="reproducteur-card-body">
                <h3 class="reproducteur-card-name">{{ $dog->name_affix }}</h3>
                <p class="reproducteur-card-meta">Né en {{ $dog->birth_date->format('Y') }} · {{ $dog->sex == 'male' ? 'Mâle' : 'Femelle' }}</p>
                <div class="reproducteur-card-footer">
                    @php
                        $littersCount = ($dog->litters_as_dad_count ?? 0) + ($dog->litters_as_mom_count ?? 0);
                    @endphp
                    <small class="reproducteur-card-litters">{{ $littersCount }} portée(s)</small>
                    <a href="{{ route('front.breeds.dog-details', ['slug' => $breed->slug, 'dogSlug' => $dog->slug]) }}" class="link-purple-card-list" aria-label="Voir plus de détails sur {{ $dog->name_affix }}">Voir plus <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
    @endforeach
</div>