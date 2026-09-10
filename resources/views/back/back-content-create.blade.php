<x-layout-back />
<div>
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
        <form action="{{ route('back.back-content-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="publication_date" value="{{ date('Y-m-d') }}" />
            <h2>Informations</h2>
            <div>
                <div>
                    <label>Titre</label>
                    <input type="text" name="title" required />
                </div>
                <div>
                    <label>Lien vidéo</label>
                    <input type="text" name="tiktok_path" />
                </div>
            </div>
            <div x-data="{ 
            existingCategories: {{ json_encode($categories->pluck('name')->map(fn($n) => mb_strtolower($n))) }},
            newCategory: '{{ old('new_category') }}',
            get isDuplicate() {
            return this.newCategory.trim() !== '' && 
               this.existingCategories.includes(this.newCategory.trim().toLowerCase());
            }}">
                <div>
                    <label>Catégorie existante</label>
                    <select name="category_id" :disabled="newCategory.trim() !== ''">
                        <option value="">- Sélectionnez -</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Ou créer une nouvelle catégorie</label>
                    <input type="text" name="new_category" x-model="newCategory" placeholder="Ex: Éducation" />
                </div>

            </div>
            <div>
                <label>Publié</label>
                <select name="is_published" required>
                    <option value="">- Sélectionnez -</option>
                    <option value="1">Publié</option>
                    <option value="0">Brouillon</option>
                </select>
            </div>
            <div>
                <label>Introduction de l'article </label>
                <input type="text" name="extract" />
            </div>
            <div>
                <label>Contenu de l'article (laisser vide si vidéo)</label>
                <textarea id="content-editor" name="content"
                    placeholder="Contenu de l'article">{{ old('content') }}</textarea>
            </div>
            <span></span>
            <div>
                <h2>Photos</h2>
                <div>
                    <label>Pour le thumbnail</label>
                    <input type="file" name="image_path" />
                </div>
            </div>
            <span></span>
            <button type="submit">Créer un nouvel article</button>
        </form>
    </div>
</div>