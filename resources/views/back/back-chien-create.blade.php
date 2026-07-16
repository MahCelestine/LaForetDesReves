<div>
    <x-layout-back />
    <div>
        <h1>Ajouter un chien</h1>
        <form>
            <div>
                <h2>Information</h2>
                <div>
                    <div>
                        <label>Nom avec affixe</label>
                        <input type="text" />
                    </div>
                    <div>
                        <label>Nom d'usage</label>
                        <input type="text" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>LOF</label>
                        <select>
                            <option value="">- Sélectionnez -</option>
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                    </div>
                    <div>
                        <label>Sexe</label>
                        <select>
                            <option value="">- Sélectionnez -</option>
                            <option value="male">Mâle</option>
                            <option value="female">Femelle</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div>
                        <label>Date de naissance</label>
                        <input type="date" />
                    </div>
                    <div>
                        <label>Couleur</label>
                        <input type="text" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Numéro d'identification</label>
                        <input type="text" />
                    </div>
                    <div>
                        <label>Cotation</label>
                        <input type="text" />
                    </div>
                </div>
                <div>
                    <label>Race</label>
                    <select>
                        <option value="">- Sélectionnez -</option>
                        <option value="samoyède">Samoyède</option>
                        <option value="staffordshire bull terrier">Staffordshire Bull Terrier</option>
                        <option value="berger américain">Berger Américain</option>
                    </select>
                </div>
                <div>
                    <label>Description de l'animal</label>
                    <textarea placeholder="Parler de  l’animal, de son comportement t out ce qui pourrait être intéressant de savoir"></textarea>
                </div>
                <span></span>
            </div>
            <div>
                <h2>Photos</h2>
                <div>
                    <label>Pour le thumbail</label>
                    <form>
                        <input type="file" />
                        <button>Chercher dans les fichiers</button>
                    </form>
                </div>
                    <label>Pour le carrousel (plusieurs fichiers possible)</label>
                    <form>
                        <input type="file" />
                        <button>Chercher dans les fichiers</button>
                    </form>
                </div>
                <span></span>
            </div>
            <button>Créer un nouveau reproducteur</button>
        </form>
    </div>
</div>