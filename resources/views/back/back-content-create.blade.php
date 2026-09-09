<div>
    <x-layout-back />
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
            <div>
                <div>
                    <label>Catégorie</label>
                    <select name="category_id" required>
                        <option value="">- Sélectionnez -</option>
                        @foreach ( $categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Publié</label>
                    <select name="is_published" required>
                        <option value="">- Sélectionnez -</option>
                        <option value="1">Publié</option>
                        <option value="0">Brouillon</option>
                    </select>
                </div>
            </div>
            <div>
                <label>Introduction de l'article </label>
                <input type="text" name="extract" />
            </div>
            <div>
                <label>Contenue de l'article (laisser vide si vidéo)</label>
                <textarea name="content" placeholder="Contenue de l'article"></textarea>
            </div>
            <span></span>
            <div>
                <h2>Photos</h2>
                <div>
                    <label>Pour le thumbnail</label>
                        <input type="file" name="image_path"/>
                </div>
            </div>
            <span></span>
            <button type="submit">Créer un nouvel article</button>
        </form>
    </div>
</div>