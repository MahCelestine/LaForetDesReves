<div>
    <x-layout-back />
    <div>
        <h1>Modifier {{ $puppy->name }}</h1>
        <form action="{{ route('back.back-chiot-update', $puppy) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <h2>Information</h2>
                <div>
                    <div>
                        <label>Nom</label>
                        <input type="text" name="name" value="{{ $puppy->name  }}" />
                    </div>
                    <div>
                        <label>Couleur</label>
                        <input type="text" name="color" value="{{ $puppy->color }}" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Sexe</label>
                        <select name="sex" required>
                            <option value="">- Sélectionnez -</option>
                            <option value="male" {{ $puppy->sex == 'male' ? 'selected' : '' }}>Mâle</option>
                            <option value="female" {{ $puppy->sex == 'female' ? 'selected' : '' }}>Femelle</option>
                        </select>
                    </div>
                    <div>
                        <label>Date de disponibilité</label>
                        <input type="date" name="adoption_date" value="{{ old('adoption_date', $puppy->adoption_date?->format('Y-m-d')) }}" required />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Poids de naissance</label>
                        <input type="number" name="weight" value="{{ $puppy->weight }}" />
                        <small>g</small>
                    </div>
                    <div>
                        <label>Numéro d'identification</label>
                        <input type="text" name="identification_number" value="{{ $puppy->identification_number }}" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Prix</label>
                        <input type="text" name="price" value="{{ $puppy->price }}" required />
                        <small>€</small>
                    </div>
                    <div>
                        <label>Statut</label>
                        <select name="status" required>
                            <option value="">- Sélectionnez -</option>
                            <option value="disponible" {{ $puppy->status == 'disponible' ? 'selected' : '' }}>Disponible</option>
                            <option value="réservé" {{ $puppy->status == 'réservé' ? 'selected' : '' }}>Réservé</option>
                            <option value="vendu" {{ $puppy->status == 'vendu' ? 'selected' : '' }}>Vendu</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label>Description de l'animal</label>
                    <textarea
                        placeholder="Parler de  l’animal, de son comportement t out ce qui pourrait être intéressant de savoir"
                        name="description" required>{{ $puppy->description }}</textarea>
                </div>
                <span></span>
            </div>
            <div>
                <h2>Photos</h2>
                <div>
                    <label>Pour le thumbail</label>
                    <div>
                        <img src="{{ asset('storage/' . $puppy->image_path) }}" alt="Mon image">
                        <small>Image actuelle</small>
                    </div>
                        <input type="file" name="image_path" />
                </div>
                <!-- <div>
                    <label>Pour le carrousel (plusieurs fichiers possible)</label>
                    <form>
                        <input type="file" />
                        <button>Chercher dans les fichiers</button>
                    </form>
                </div> -->
                <span></span>
            </div>
            <button type="submit">Mettre à jour la fiche de {{ $puppy->name }}</button>
        </form>
        @if ($errors->any())
        <div style="color: red; margin-top: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
</div>