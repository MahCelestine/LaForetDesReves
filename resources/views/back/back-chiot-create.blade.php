<div>
    <x-layout-back />
    <div>
        <h1>Ajouter un chiot</h1>
        <form>
            <div>
                <h2>Information</h2>
                <div>
                    <div>
                        <label>Nom avec affixe</label>
                        <input type="text" />
                    </div>
                    <div>
                        <label>Couleur</label>
                        <input type="text" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Sexe</label>
                        <select>
                            <option value="">- Sélectionnez -</option>
                            <option value="male">Mâle</option>
                            <option value="female">Femelle</option>
                        </select>
                    </div>
                    <div>
                        <label>Date de naissance</label>
                        <input type="date" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Poids de naissance</label>
                        <input type="number" />
                    </div>
                    <div>
                        <label>Numéro d'identification</label>
                        <input type="text" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Prix</label>
                        <input type="text" />
                    </div>
                    <div>
                        <label>Date de disponibilité</label>
                        <input type="date" />
                    </div>
                </div>
                <div>
                    <label>Statut</label>
                    <select>
                        <option value="">- Sélectionnez -</option>
                        <option value="disponible">Disponible</option>
                        <option value="réservé">Réservé</option>
                        <option value="vendu">Vendu</option>
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
            <button>Créer un chiot dans la portée</button>
        </form>
    </div>
</div>