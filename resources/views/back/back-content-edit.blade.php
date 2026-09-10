<x-layout-back />
<div>
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
    <div>
        <h1>Modifier un article</h1>
        <form action="{{ route('back.back-content-update', $content) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="publication_date" value="{{ date('Y-m-d') }}" />
            <h2>Informations</h2>
            <div>
                <div>
                    <label>Titre</label>
                    <input type="text" name="title" value="{{ $content->title }}" required />
                </div>
                @if ($content->is_video == 1)
                    <div>
                        <label>Lien vidéo</label>
                        <input type="text" name="tiktok_path" value="{{ $content->tiktok_path }}" />
                    </div>
                @endif
            </div>
            <div>
                <div>

                    <label>Catégorie</label>
                    <select name="category_id" required>
                        <option value="">- Sélectionnez -</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $content->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Publié</label>
                    <select name="is_published" required>
                        <option value="">- Sélectionnez -</option>
                        <option value="1" {{ $content->is_published == 1 ? 'selected' : '' }}>Publié</option>
                        <option value="0" {{ $content->is_published == 0 ? 'selected' : '' }}>Brouillon</option>
                    </select>
                </div>
            </div>
            <div>
                <label>Introduction de l'article </label>
                <input type="text" name="extract" value="{{ $content->extract }}" />
            </div>
            @if ($content->is_video == 0)
                <div>
                    <label>Contenu de l'article</label>
                    <textarea id="content-editor" name="content">{{ old('content', $content->content) }}</textarea>
                </div>
            @else
                <div>
                    <textarea name="content" disabled>{{ $content->content }}</textarea>
                </div>
            @endif

            <span></span>
            <div>
                <h2>Photos</h2>
                <div>
                    <label>Pour le thumbnail</label>
                    <div>
                        <img src="{{ asset('storage/' . $content->image_path) }}" alt="Mon image">
                        <small>Image actuelle</small>
                    </div>
                    <input type="file" name="image_path" />
                </div>
            </div>
            <span></span>
            <button type="submit">Modifier l'article</button>
        </form>
    </div>
</div>