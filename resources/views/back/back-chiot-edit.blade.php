<div>
    <x-layout-back />
    <div>
        <h1>Modifier le chiot {{ $puppy->name }}</h1>

        <form action="{{ route('back.back-chiot-update', ['puppy' => $puppy->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <h2>Informations</h2>
                <div>
                    <div>
                        <label>Nom</label>
                        <input type="text" name="name" value="{{ old('name', $puppy->name) }}" />
                    </div>
                    <div>
                        <label>Couleur</label>
                        <input type="text" name="color" value="{{ old('color', $puppy->color) }}" required />
                    </div>
                </div>

                <div>
                    <div>
                        <label>Sexe</label>
                        <select name="sex" required>
                            <option value="">- Sélectionnez -</option>
                            <option value="male" {{ old('sex', $puppy->sex) == 'male' ? 'selected' : '' }}>Mâle</option>
                            <option value="female" {{ old('sex', $puppy->sex) == 'female' ? 'selected' : '' }}>Femelle
                            </option>
                        </select>
                    </div>
                    <div>
                        <label>Date de disponibilité</label>
                        <input type="date" name="adoption_date"
                            value="{{ old('adoption_date', $puppy->adoption_date?->format('Y-m-d')) }}" required />
                    </div>

                    <div>
                        <div>
                            <label>Poids (en g)</label>
                            <input type="number" step="0.01" name="weight" value="{{ old('weight', $puppy->weight) }}"
                                placeholder="0 si non renseigné" />
                        </div>
                        <div>
                            <label>Numéro d'identification / Puce</label>
                            <input type="text" name="identification_number"
                                value="{{ old('identification_number', $puppy->identification_number) }}" />
                        </div>

                    </div>
                    <div>
                        <div>
                            <label>Prix</label>
                            <input type="text" name="price" value="{{ old('price', $puppy->price) }}" required />
                            <small>€</small>
                        </div>
                        <div>
                            <label>Date de disponibilité</label>
                            <input type="date" name="adoption_date"
                                value="{{ old('adoption_date', $puppy->adoption_date?->format('Y-m-d')) }}" required />
                        </div>
                    </div>
                    <div>
                        <label>Statut</label>
                        <select name="status" required>
                            <option value="disponible" {{ old('status', $puppy->status) == 'disponible' ? 'selected' : '' }}>
                                Disponible</option>
                            <option value="reservé" {{ old('status', $puppy->status) == 'reservé' ? 'selected' : '' }}>
                                Réservé</option>
                            <option value="vendu" {{ old('status', $puppy->status) == 'vendu' ? 'selected' : '' }}>Vendu
                            </option>
                        </select>
                    </div>
                </div>

                <div>
                    <label>Description du chiot</label>
                    <textarea name="description">{{ old('description', $puppy->description) }}</textarea>
                </div>
            </div>
            <div x-data="{ deletedPictures: [] }">
                <h2>Photos</h2>
                <div>
                    <label>Image principale (Thumbnail)</label>
                    @if ($puppy->image_path)
                        <div>
                            <img src="{{ asset('storage/' . $puppy->image_path) }}" alt="Thumbnail actuel"
                                style="max-width: 150px;">
                            <small>Image actuelle</small>
                        </div>
                    @endif
                    <div>
                        <input type="file" name="image_path" accept="image/*" />
                    </div>
                </div>
                <div>
                    <label>Galerie de photos actuelles</label>

                    <div>
                        @foreach ($puppy->pictures as $picture)
                            <div x-show="!deletedPictures.includes({{ $picture->id }})">
                                <img src="{{ asset('storage/' . $picture->image_path) }}" alt="Photo">
                                <button type="button" @click="deletedPictures.push({{ $picture->id }})">
                                    Supprimer
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <template x-for="id in deletedPictures" :key="id">
                        <input type="hidden" name="delete_pictures[]" :value="id">
                    </template>
                </div>
                <div>
                    <label>Ajouter des photos à la galerie</label>
                    <div>
                        <input type="file" name="pictures[]" multiple accept="image/*" />
                    </div>
                </div>
            </div>

            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>
    @if ($errors->any())
        <div>
            <h3>Erreurs de validation :</h3>
            @dump($errors->all())
        </div>
    @endif
</div>