<x-layout-back>
    <div class="backoffice-page-header">
        <h1 class="title">Modifier le chiot {{ $puppy->name }}</h1>
    </div>

    @if ($errors->any())
        <div class="form-alert form-alert-error">Certains champs contiennent des erreurs. Veuillez vérifier le formulaire ci-dessous.</div>
    @endif

    <form action="{{ route('back.back-chiot-update', ['puppy' => $puppy->id]) }}" method="POST" enctype="multipart/form-data" class="contact-form">
        @csrf
        @method('PUT')

        <div class="form-block">
            <h3 class="form-block-title">Informations</h3>

            <div class="form-row">
                <div class="form-field">
                    <label>Nom</label>
                    <input type="text" name="name" value="{{ old('name', $puppy->name) }}" />
                    @error('name') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Couleur</label>
                    <input type="text" name="color" value="{{ old('color', $puppy->color) }}" required />
                    @error('color') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>Sexe</label>
                    <select name="sex" required>
                        <option value="">- Sélectionnez -</option>
                        <option value="male" @selected(old('sex', $puppy->sex) === 'male')>Mâle</option>
                        <option value="female" @selected(old('sex', $puppy->sex) === 'female')>Femelle</option>
                    </select>
                    @error('sex') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Date de disponibilité</label>
                    <input type="date" name="adoption_date" value="{{ old('adoption_date', $puppy->adoption_date?->format('Y-m-d')) }}" required />
                    @error('adoption_date') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>Poids (en g)</label>
                    <input type="number" step="0.01" name="weight" value="{{ old('weight', $puppy->weight) }}" placeholder="0 si non renseigné" />
                    @error('weight') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Numéro d'identification / Puce</label>
                    <input type="text" name="identification_number" value="{{ old('identification_number', $puppy->identification_number) }}" />
                    @error('identification_number') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>Prix (€)</label>
                    <input type="text" name="price" value="{{ old('price', $puppy->price) }}" required />
                    @error('price') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Statut</label>
                    <select name="status" required>
                        <option value="disponible" @selected(old('status', $puppy->status) === 'disponible')>Disponible</option>
                        <option value="reservé" @selected(old('status', $puppy->status) === 'reservé')>Réservé</option>
                        <option value="vendu" @selected(old('status', $puppy->status) === 'vendu')>Vendu</option>
                    </select>
                    @error('status') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-field">
                <label>Description du chiot</label>
                <textarea name="description">{{ old('description', $puppy->description) }}</textarea>
                @error('description') <small class="form-error">{{ $message }}</small> @enderror
            </div>
        </div>

        <span class="form-separator"></span>

        <div class="form-block" x-data="{ deletedPictures: [] }">
            <h3 class="form-block-title">Photos</h3>

            <div class="form-row">
                <div class="form-field">
                    <label>Image principale (Thumbnail)</label>
                    @if ($puppy->image_path)
                        <div style="margin-bottom: 0.5rem;">
                            <img src="{{ asset('storage/' . $puppy->image_path) }}" alt="Thumbnail actuel" style="max-width: 150px; border-radius: 4px;">
                            <small style="display: block; color: #666;">Image actuelle</small>
                        </div>
                    @endif
                    <input type="file" name="image_path" accept="image/*" />
                    @error('image_path') <small class="form-error">{{ $message }}</small> @enderror
                </div>

                <div class="form-field">
                    <label>Ajouter des photos à la galerie</label>
                    <input type="file" name="pictures[]" multiple accept="image/*" />
                    @error('pictures') <small class="form-error">{{ $message }}</small> @enderror
                    @error('pictures.*') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            @if($puppy->pictures->count() > 0)
                <div class="form-field" style="margin-top: 1rem;">
                    <label>Galerie de photos actuelles</label>
                    <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 0.5rem;">
                        @foreach ($puppy->pictures as $picture)
                            <div x-show="!deletedPictures.includes({{ $picture->id }})" style="position: relative; border: 1px solid #ddd; padding: 5px; border-radius: 4px;">
                                <img src="{{ asset('storage/' . $picture->image_path) }}" alt="Photo" style="width: 100px; height: 100px; object-fit: cover; display: block; margin-bottom: 5px;">
                                <button type="button" class="btn-danger-sm" @click="deletedPictures.push({{ $picture->id }})" style="font-size: 0.8rem; width: 100%;">
                                    Supprimer
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <template x-for="id in deletedPictures" :key="id">
                        <input type="hidden" name="delete_pictures[]" :value="id">
                    </template>
                </div>
            @endif
        </div>

        <button type="submit" class="form-submit">Enregistrer les modifications</button>
    </form>

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
</x-layout-back>