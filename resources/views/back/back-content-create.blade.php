<div>
    <x-layout-back />
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            tinymce.init({
                selector: '#content-editor',
                height: 400,
                menubar: false,
                plugins: 'lists link code table wordcount',
                toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link table | removeformat',
                promotion: false,
                branding: false
            });
        });
    </script>
    <div>
        <h1>Ajouter un article</h1>

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 12px; margin-bottom: 20px; border-radius: 4px;">
                Certains champs contiennent des erreurs. Veuillez vérifier le formulaire ci-dessous.
            </div>
        @endif

        <form action="{{ route('back.back-content-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="publication_date" value="{{ date('Y-m-d') }}" />
            <h2>Informations</h2>
            <div>
                <div>
                    <div>
                        <label>Titre</label>
                        <input type="text" name="title" value="{{ old('title') }}" required />
                        @error('title')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label>Lien vidéo</label>
                        <input type="text" name="tiktok_path" value="{{ old('tiktok_path') }}" />
                        @error('tiktok_path')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div x-data="{ 
                    existingCategories: {{ json_encode($categories->pluck('name')->map(fn($n) => mb_strtolower($n))) }},
                    newCategory: '{{ old('new_category') }}',
                    get isDuplicate() {
                        return this.newCategory.trim() !== '' && 
                               this.existingCategories.includes(this.newCategory.trim().toLowerCase());
                    }
                }">
                    <div>
                        <label>Catégorie existante</label>
                        <select name="category_id" :disabled="newCategory.trim() !== ''">
                            <option value="">- Sélectionnez -</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected((string) old('category_id') === (string) $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label>Ou créer une nouvelle catégorie</label>
                        <input type="text" name="new_category" x-model="newCategory" placeholder="Ex: Éducation" />
                        @error('new_category')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div>
                    <label>Publié</label>
                    <select name="is_published" required>
                        <option value="">- Sélectionnez -</option>
                        <option value="1" @selected((string) old('is_published') === '1')>Publié</option>
                        <option value="0" @selected((string) old('is_published') === '0')>Brouillon</option>
                    </select>
                    @error('is_published')
                        <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label>Introduction de l'article</label>
                    <input type="text" name="extract" value="{{ old('extract') }}" />
                    @error('extract')
                        <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label>Contenu de l'article (laisser vide si vidéo)</label>
                    <textarea id="content-editor" name="content"
                        placeholder="Contenu de l'article">{{ old('content') }}</textarea>
                    @error('content')
                        <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                    @enderror
                </div>
                <span></span>
                <div>
                    <h2>Photos</h2>
                    <div>
                        <label>Pour le thumbnail</label>
                        <input type="file" name="image_path" />
                        @error('image_path')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <span></span>
                <button type="submit">Créer un nouvel article</button>
            </div>
        </form>
    </div>
    <livewire:loading-overlay />

    <script>
        document.querySelector('form').addEventListener('submit', function () {
            const overlay = document.getElementById('loading-overlay');
            const submitBtn = this.querySelector('button[type="submit"]');

            if (overlay) {
                overlay.style.display = 'flex';
            }

            if (submitBtn) {
                setTimeout(() => {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = 'Enregistrement...';
                    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }, 10);
            }
        });
    </script>
</div>