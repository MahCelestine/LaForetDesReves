<div>
    <x-layout-back />
    <div>
        <h1>Ajouter un article</h1>
        <form>
            <h2>Informations</h2>
            <div>
                <div>
                    <label>Titre</label>
                    <input type="text" />
                </div>
                <div>
                    <label>Lien vidéo</label>
                    <input type="text" />
                </div>
            </div>
            <div>
                <div>
                    <label>Catégorie</label>
                    <select>
                        <option value="cat">Soin</option>
                        <option value="cat">Comportment</option>
                    </select>
                </div>
                <div>
                    <label>Publié</label>
                    <select>
                        <option>- Sélectionner -</option>
                        <option value="1">Publié</option>
                        <option value="0">Brouillon</option>
                    </select>
                </div>
            </div>
            <div>
                <label>Introduction de l'article (vide si vidéo)</label>
                <input type="text" />
            </div>
            <div>
                <label>Contenue de l'article</label>
                <textarea placeholder="Contenue de l'article"></textarea>
            </div>
            <span></span>
            <div>
                <h2>Photos</h2>
                <div>
                    <label>Pour le thumbail</label>
                    <form>
                        <input type="file" />
                        <button>Chercher dans les fichiers</button>
                    </form>
                </div>
            </div>
            <span></span>
            <button>Créer un nouvel article</button>
        </form>
    </div>
</div>