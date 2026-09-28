<div>
            @foreach ($litters as $litter)
                <div>
                    <p>Chiots de</p>
                    <div>
                        <img src="{{ asset('storage/' . $litter->dad->image_path) }}"
                            alt="photo du reproducteur {{ $litter->dad->common_name }}">
                        <div>
                            <h4>{{ $litter->dad->common_name }}</h4>
                            <p>{{ $litter->dad->sex === 'male' ? 'Mâle' : 'Femelle' }}</p>
                            <div>
                                <small>{{ $litter->dad->birth_date->format('d/m/Y') }}</small>
                                <a href="">Voir le parent →</a>
                            </div>
                        </div>
                    </div>
                    <p>et</p>
                    <div>
                        <img src="{{ asset('storage/' . $litter->mom->image_path) }}"
                            alt="photo de la reproductrice {{ $litter->mom->common_name }}">
                        <div>
                            <h4>{{ $litter->mom->common_name }}</h4>
                            <p>{{ $litter->mom->sex === 'male' ? 'Mâle' : 'Femelle' }}</p>
                            <div>
                                <small>{{ $litter->mom->birth_date->format('d/m/Y') }}</small>
                                <a href="">Voir le parent →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    @foreach ($litter->puppies as $puppy)
                        <div>
                            <div>
                                <img src="{{ asset('storage/' . $puppy->image_path) }}" alt="photo du somoyède {{ $puppy->name }}">
                                <span>{{ $puppy->status }}</span>
                            </div>
                            <h4>{{ $puppy->name }}</h4>
                            <p>{{ $puppy->birth_date->format('d/m/Y') }} . {{ $puppy->sex === 'male' ? 'Mâle' : 'Femelle' }}</p>
                            <div>
                                <small>{{ $puppy->color }}</small>
                                <h5>{{ $puppy->price }} €</h5>
                            </div>
                            <a href="{{ route('front.breeds.puppy-details', ['slug' => $breed->slug, 'puppySlug' => $puppy->slug]) }}">Voir plus →</a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>