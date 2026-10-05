<x-layout-back>
    @if ($content->is_video == 0)
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
    @endif

    <div class="backoffice-page-header">
        <h1 class="title">Modifier l'article</h1>
    </div>

    @if ($errors->any())
        <div class="form-alert form-alert-error">Certains champs contiennent des erreurs. Veuillez vérifier le formulaire ci-dessous.</div>
    @endif

    <form action="{{ route('back.back-content-update', $content) }}" method="POST" enctype="multipart/form-data" class="contact-form">
        @csrf
        @method('PUT')
        <input type="hidden" name="publication_date" value="{{ date('Y-m-d') }}" />

        <div class="form-block">
            <h3 class="form-block-title">Informations</h3>

            <div class="form-row">
                <div class="form-field">
                    <label>Titre</label>
                    <input type="text" name="title" value="{{ old('title', $content->title) }}" required />
                    @error('title') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                @if ($content->is_video == 1)
                    <div class="form-field">
                        <label>Lien vidéo</label>
                        <input type="text" name="tiktok_path" value="{{ old('tiktok_path', $content->tiktok_path) }}" />
                        @error('tiktok_path') <small class="form-error">{{ $message }}</small> @enderror
                    </div>
                @endif
            </div>

            <div class="form-row" x-data="{
                existingCategories: {{ json_encode($categories->pluck('name')->map(fn($n) => mb_strtolower($n))) }},
                newCategory: '{{ old('new_category') }}',
                get isDuplicate() {
                    return this.newCategory.trim() !== '' &&
                           this.existingCategories.includes(this.newCategory.trim().toLowerCase());
                }
            }">
                <div class="form-field">
                    <label>Catégorie existante</label>
                    <select name="category_id" :disabled="newCategory.trim() !== ''">
                        <option value="">- Sélectionnez -</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected((string) old('category_id', $content->category_id) === (string) $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Ou créer une nouvelle catégorie</label>
                    <input type="text" name="new_category" x-model="newCategory" placeholder="Ex: Éducation" />
                    <small class="form-error" x-show="isDuplicate" x-cloak>Cette catégorie existe déjà.</small>
                    @error('new_category') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-field">
                <label>Publié</label>
                <select name="is_published" required>
                    <option value="">- Sélectionnez -</option>
                    <option value="1" @selected((string) old('is_published', $content->is_published) === '1')>Publié</option>
                    <option value="0" @selected((string) old('is_published', $content->is_published) === '0')>Brouillon</option>
                </select>
                @error('is_published') <small class="form-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-field">
                <label>Introduction de l'article</label>
                <input type="text" name="extract" value="{{ old('extract', $content->extract) }}" />
                @error('extract') <small class="form-error">{{ $message }}</small> @enderror
            </div>

            @if ($content->is_video == 0)
                <div class="form-field">
                    <label>Contenu de l'article</label>
                    <textarea id="content-editor" name="content">{{ old('content', $content->content) }}</textarea>
                    @error('content') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            @else
                <div class="form-field">
                    <label>Contenu de la vidéo</label>
                    <textarea name="content" disabled>{{ $content->content }}</textarea>
                </div>
            @endif
        </div>

        <span class="form-separator"></span>

        <div class="form-block">
            <h3 class="form-block-title">Photos</h3>
            <div class="form-field">
                <label>Pour le thumbnail</label>
                @if ($content->image_path)
                    <div style="margin-bottom: 0.5rem;">
                        <img src="{{ asset('storage/' . $content->image_path) }}" alt="Mon image" style="max-width: 150px; border-radius: 4px;">
                        <small style="display: block; color: #666;">Image actuelle</small>
                    </div>
                @endif
                <input type="file" name="image_path" />
                @error('image_path') <small class="form-error">{{ $message }}</small> @enderror
            </div>
        </div>

        <button type="submit" class="form-submit">Modifier l'article</button>
    </form>

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
</x-layout-back>