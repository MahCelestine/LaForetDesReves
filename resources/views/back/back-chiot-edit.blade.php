<div>
    <x-layout-back />
    <div>
        <h1>Modifier le chiot {{ $puppy->name }}</h1>

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 12px; margin-bottom: 20px; border-radius: 4px;">
                Certains champs contiennent des erreurs. Veuillez vérifier le formulaire ci-dessous.
            </div>
        @endif

        <form action="{{ route('back.back-chiot-update', ['puppy' => $puppy->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <h2>Informations</h2>
                <div>
                    <div>
                        <div>
                            <label>Nom</label>
                            <input type="text" name="name" value="{{ old('name', $puppy->name) }}" />
                            @error('name')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Couleur</label>
                            <input type="text" name="color" value="{{ old('color', $puppy->color) }}" required />
                            @error('color')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label>Sexe</label>
                            <select name="sex" required>
                                <option value="">- Sélectionnez -</option>
                                <option value="male" @selected(old('sex', $puppy->sex) === 'male')>Mâle</option>
                                <option value="female" @selected(old('sex', $puppy->sex) === 'female')>Femelle</option>
                            </select>
                            @error('sex')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Date de disponibilité</label>
                            <input type="date" name="adoption_date"
                                value="{{ old('adoption_date', $puppy->adoption_date?->format('Y-m-d')) }}" required />
                            @error('adoption_date')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label>Poids (en g)</label>
                            <input type="number" step="0.01" name="weight" value="{{ old('weight', $puppy->weight) }}"
                                placeholder="0 si non renseigné" />
                            @error('weight')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Numéro d'identification / Puce</label>
                            <input type="text" name="identification_number"
                                value="{{ old('identification_number', $puppy->identification_number) }}" />
                            @error('identification_number')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label>Prix</label>
                            <input type="text" name="price" value="{{ old('price', $puppy->price) }}" required />
                            <small>€</small>
                            @error('price')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Statut</label>
                            <select name="status" required>
                                <option value="disponible" @selected(old('status', $puppy->status) === 'disponible')>Disponible</option>
                                <option value="reservé" @selected(old('status', $puppy->status) === 'reservé')>Réservé</option>
                                <option value="vendu" @selected(old('status', $puppy->status) === 'vendu')>Vendu</option>
                            </select>
                            @error('status')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label>Description du chiot</label>
                        <textarea name="description">{{ old('description', $puppy->description) }}</textarea>
                        @error('description')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
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
                            @error('image_path')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
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
                            @error('pictures')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                            @error('pictures.*')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit">Enregistrer les modifications</button>
            </div>
        </form>
    </div>
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
</div>