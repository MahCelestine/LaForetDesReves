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
                    <form action="{{ route('back.back-litter-destroy', $litter) }}" method="POST" id="delete-litter-form-{{ $litter->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" wire:click="$dispatch('open-delete-modal', {
                                title: 'la suppression de la portée', 
                                message: 'Êtes-vous sûr de vouloir supprimer cette portée ? Cette action est irréversible, les chiots seront également supprimés.', 
                                label: 'Supprimer', 
                                formId: 'delete-litter-form-{{ $litter->id }}' 
                                })">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </form>
                </div>

                <div>
                    <div>
                        <h4>Chiots de cette portée</h4>
                        @if ($litter->status != 'passée')
                            <a href="{{ route('back.back-chiot-create', ['litter_id' => $litter->id]) }}">+ Ajouter un chiot</a>
                        @endif
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
                                        <form action="{{ route('back.back-chiot-destroy', $puppy) }}" method="POST"
                                            id="delete-puppy-form-{{ $puppy->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" wire:click="$dispatch('open-delete-modal', {
                                                                        title: 'la suppression du chiot', 
                                                                        message: 'Êtes-vous sûr de vouloir supprimer ce chiot ? Cette action est irréversible.', 
                                                                        label: 'Supprimer', 
                                                                        formId: 'delete-puppy-form-{{ $puppy->id }}' 
                                                                        })">
                                                <i class="bi bi-trash3-fill"></i></button>
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

        <livewire:delete-confirmation-modal />
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('do-submit-delete', (data) => {
                    const formId = data.formId || (data[0] ? data[0].formId : null);

                    if (formId) {
                        const form = document.getElementById(formId);
                        if (form) {
                            const overlay = document.getElementById('loading-overlay');
                            if (overlay) {
                                overlay.style.display = 'flex';
                            }
                            form.submit();
                        }
                    }
                });
            });
        </script>
    </section>
</div>