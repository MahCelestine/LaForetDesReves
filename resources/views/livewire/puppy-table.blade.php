<div>
    <section>
        @forelse ($litters as $litter)
            <div>
                <div>
                    <a><i class="bi bi-caret-down-fill"></i></a>
                    <div>
                        <h3>{{ $litter->breed->name }}</h3>
                        <p>{{ $litter->birth_date->format('d/m/Y') }}</p>
                    </div>
                    <p>
                        <i class="bi bi-gender-male"></i> {{ $litter->dad->common_name }} et 
                        <i class="bi bi-gender-female"></i> {{ $litter->mom->common_name }}
                    </p>
                    <span>{{ $litter->status }}</span>
                    <p>{{ $litter->puppies->count() }} chiot(s)</p>
                    <a href="/back-litter/{{ $litter->id }}/edit"><i class="bi bi-pencil-fill"></i></a>
                    <form action="{{ route('back.back-litter-destroy', $litter) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                </div>

                <div>
                    <div>
                        <h4>Chiots de cette portée</h4>
                        <a href="{{ route('back.back-chiot-create', ['litter_id' => $litter->id]) }}">+ Ajouter un chiot</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Couleur</th>
                                <th>Sexe</th>
                                <th>Statut</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($litter->puppies as $puppy)
                                <tr>
                                    <td>{{ $puppy->name }}</td>
                                    <td>{{ $puppy->color }}</td>
                                    <td>
                                        @if ($puppy->sex == 'male')
                                            <i class="bi bi-gender-male"></i>
                                        @else
                                            <i class="bi bi-gender-female"></i>
                                        @endif
                                    </td>
                                    <td>{{ $puppy->status }}</td>
                                    <td>
                                        <a href="/back-chiot/{{ $puppy->id }}/edit"><i class="bi bi-pencil-fill"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('back.back-chiot-destroy', $puppy) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Aucun chiot dans cette portée.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <p>Aucune portée ne correspond au statut sélectionné.</p>
        @endforelse
    </section>
</div>