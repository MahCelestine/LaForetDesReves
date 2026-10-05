<section class="dog-table-section">
    <div class="table-scroll">
    <table class="bg-white">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Race</th>
                <th>Sexe</th>
                <th>Statut</th>
                <th>Externe</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dogs as $dog)
                <tr>
                    <td>{{ $dog->name_affix }}</td>
                    <td>{{ $dog->breed->name }}</td>
                    <td>
                        @if ($dog->sex == 'male')
                            <i class="bi bi-gender-male"></i>
                        @else
                            <i class="bi bi-gender-female"></i>
                        @endif
                    </td>
                    <td>
                        @if ($dog->retirement == '0')
                            <span class="status-badge active">Actif</span>
                        @else
                            <span class="status-badge retired">Retraité</span>
                        @endif
                    </td>
                    <td>
                        @if($dog->is_external)
                            <span>Oui</span>
                        @else
                            <span>Non</span>
                        @endif
                    </td>
                    <td>
                        <a href="/back-chien/{{ $dog->id }}/edit">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('back.back-chien-destroy', $dog) }}" method="POST"
                            id="delete-dog-form-{{ $dog->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" wire:click="$dispatch('open-delete-modal', {
                                            title: 'la suppression du chien', 
                                            message: 'Êtes-vous sûr de vouloir supprimer ce chien ? Cette action est irréversible.', 
                                            label: 'Supprimer', 
                                            formId: 'delete-dog-form-{{ $dog->id }}' 
                                        })">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
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