<div>
    @foreach ($dogs as $dog)
        <div>
            <img src="{{ asset('storage/' . $dog->image_path) }}" alt="photo de {{ $dog->common_name }}" />
            <h4>{{ $dog->name_affix }}</h4>
            <p>Né en {{ $dog->birth_date->format('Y') }} . {{ $dog->sex == 'male' ? 'Mâle' : 'Femelle' }}</p>
            <div>
                @php
                    $littersCount = ($dog->litters_as_dad_count ?? 0) + ($dog->litters_as_mom_count ?? 0);
                @endphp
                <small>{{ $littersCount }} portée(s)</small>
                <a href="{{ route('front.breeds.dog-details', ['slug' => $breed->slug, 'dogSlug' => $dog->slug]) }}">Voir plus →</a>
            </div>
        </div>
    @endforeach
</div>