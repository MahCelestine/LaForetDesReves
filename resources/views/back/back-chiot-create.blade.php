<div>
    <x-layout-back />
    <div>
        <h1>Ajouter un chiot</h1>
        <form action="{{  route('back.back-chiot-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="litter_id" value="{{ old('litter_id', $litter_id) }}" />
            <div>
                <h2>Information</h2>
                <div>
                    <div>
                        <label>Nom</label>
                        <input type="text" name="name" />
                    </div>
                    <div>
                        <label>Couleur</label>
                        <input type="text" name="color" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Sexe</label>
                        <select name="sex" required>
                            <option value="">- Sélectionnez -</option>
                            <option value="male">Mâle</option>
                            <option value="female">Femelle</option>
                        </select>
                    </div>
                    <div>
                        <label>Date de disponibilité</label>
                        <input type="date" name="adoption_date" required />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Poids de naissance</label>
                        <input type="number" name="weight" />
                        <small>g</small>
                    </div>
                    <div>
                        <label>Numéro d'identification</label>
                        <input type="text" name="identification_number" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Prix</label>
                        <input type="text" name="price" required />
                        <small>€</small>
                    </div>
                    <div>
                        <label>Statut</label>
                        <select name="status" required>
                            <option value="">- Sélectionnez -</option>
                            <option value="disponible">Disponible</option>
                            <option value="réservé">Réservé</option>
                            <option value="vendu">Vendu</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label>Description de l'animal</label>
                    <textarea
                        placeholder="Parler de  l’animal, de son comportement t out ce qui pourrait être intéressant de savoir"
                        name="description" required></textarea>
                </div>
                <span></span>
            </div>
            <div>
                <h2>Photos</h2>
                <div>
                    <label>Pour le thumbail</label>
                    <input type="file" name="image_path" required />
                </div>
                <div>
                    <label>Photos pour le carrousel de l'animal</label>
                    <input type="file" name="pictures[]" multiple accept="image/*" />
                </div>
                <span></span>
            </div>
            <button type="submit">Créer un chiot dans la portée</button>
        </form>
    </div>
</div>