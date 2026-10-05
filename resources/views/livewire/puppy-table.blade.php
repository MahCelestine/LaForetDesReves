<div>
    <section>
        @forelse ($litters as $litter)
            <div class="litter-card" x-data="{ expanded: true }">

                <div class="litter-card-header">
                    <button type="button" class="litter-toggle" @click="expanded = !expanded"
                        :class="{ 'collapsed': !expanded }">
                        <i class="bi bi-caret-up-fill"></i>
                    </button>

                    <div class="litter-breed-date">
                        <strong>{{ $litter->breed->name }}</strong>
                        <span>{{ $litter->birth_date?->format('d F Y') }}</span>
                    </div>

                    <div class="litter-parents-back">
                        <i class="bi bi-gender-male"></i>
                        <p>{{ $litter->dad?->common_name }}</p>
                        <span class="litter-parents-back-and">et</span>
                        <i class="bi bi-gender-female"></i>
                        <p>{{ $litter->mom?->common_name }}</p>
                    </div>

                    @if ($litter->status == 'en cours')
                        <span class="status-badge active">En cours</span>
                    @elseif ($litter->status == 'futur')
                        <span class="status-badge reserved">Futur</span>
                    @else
                        <span class="status-badge retired">Passée</span>
                    @endif

                    <div class="litter-actions">
                        <a href="/back-litter/{{ $litter->id }}/edit"><i class="bi bi-pencil-fill"></i></a>
                        <form action="{{ route('back.back-litter-destroy', $litter) }}" method="POST"
                            id="delete-litter-form-{{ $litter->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" wire:click="$dispatch('open-delete-modal', {
                                title: 'la suppression de la portée',
                                message: 'Êtes-vous sûr de vouloir supprimer cette portée ? Cette action est irréversible.',
                                label: 'Supprimer',
                                formId: 'delete-litter-form-{{ $litter->id }}'
                            })">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="litter-card-body" x-show="expanded" x-collapse>

                    <div class="dog-table-section">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="text-sm font-semibold text-gray-700">Chiots de cette portée</h4>
                            @if ($litter->status != 'passée')
                                <a href="{{ route('back.back-chiot-create', ['litter_id' => $litter->id]) }}"
                                    class="btn-purple-normal text-xs px-3 py-1.5">+ Ajouter un chiot</a>
                            @endif
                        </div>

                        <div class="table-scroll">
                            <table class="bg-white w-full border-collapse">
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
                                            <td>
                                                @if ($puppy->status == 'disponible')
                                                    <span class="status-badge active">Disponible</span>
                                                @elseif ($puppy->status == 'reservé')
                                                    <span class="status-badge reserved">Réservé</span>
                                                @else
                                                    <span class="status-badge retired">Vendu</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/back-chiot/{{ $puppy->id }}/edit">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
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
                                                        <i class="bi bi-trash3-fill"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4 text-gray-500">Aucun chiot dans cette
                                                portée.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        @empty
            <p class="text-center text-gray-500 py-6">Aucune portée ne correspond au statut sélectionné.</p>
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