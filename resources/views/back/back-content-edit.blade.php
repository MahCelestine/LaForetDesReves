<div>
    <x-layout-back />
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
                    <label>Contenue de l'article (laisser vide si vidéo)</label>
                    <textarea name="content" placeholder="Contenue de l'article">{{ $content->content }}</textarea>
                </div>
            @else
                    <textarea name="content" placeholder="Contenue de l'article" disabled>{{ $content->content }}</textarea>
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