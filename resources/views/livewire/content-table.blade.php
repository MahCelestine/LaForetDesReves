<section class="dog-table-section content-table-section">
    <div class="table-scroll">
        <table class="bg-white w-full border-collapse">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Publié</th>
                    <th>Date</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contents as $content)
                    <tr>
                        <td>
                            @if ($content->is_video)
                                <i class="bi bi-camera-video-fill text-purple-600"></i>
                            @else
                                <i class="bi bi-file-text-fill text-gray-500"></i>
                            @endif
                        </td>
                        <td class="font-medium text-gray-900">{{ $content->title }}</td>
                        <td class="text-gray-600">{{ $content->category->name }}</td>
                        <td>
                            @if ($content->is_published)
                                <span class="status-badge active">Publié</span>
                            @else
                                <span class="status-badge retired">Brouillon</span>
                            @endif
                        </td>
                        <td class="text-gray-600">{{ $content->publication_date->format('d/m/Y') }}</td>
                        <td>
                            <a href="/back-content/{{ $content->id }}/edit" class="text-gray-500 hover:text-purple-600">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('back.back-content-destroy', $content) }}" method="POST" id="delete-content-form-{{ $content->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-gray-500 hover:text-red-600" wire:click="$dispatch('open-delete-modal', {
                                    title: 'la suppression du contenu', 
                                    message: 'Êtes-vous sûr de vouloir supprimer ce contenu ? Cette action est irréversible.', 
                                    label: 'Supprimer', 
                                    formId: 'delete-content-form-{{ $content->id }}' 
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