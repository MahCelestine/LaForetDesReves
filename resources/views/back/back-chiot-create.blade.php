<x-layout-back>
    <div class="backoffice-page-header">
        <h1 class="title">Ajouter un chiot</h1>
    </div>

    @if ($errors->any())
        <div class="form-alert form-alert-error">Certains champs contiennent des erreurs. Veuillez vérifier le formulaire ci-dessous.</div>
    @endif

    <form action="{{ route('back.back-chiot-store') }}" method="POST" enctype="multipart/form-data" class="contact-form">
        @csrf
        <input type="hidden" name="litter_id" value="{{ old('litter_id', $litter_id) }}" />

        <div class="form-block">
            <h3 class="form-block-title">Information</h3>

            <div class="form-row">
                <div class="form-field">
                    <label>Nom</label>
                    <input type="text" name="name" value="{{ old('name') }}" />
                    @error('name') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Couleur</label>
                    <input type="text" name="color" value="{{ old('color') }}" />
                    @error('color') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>Sexe</label>
                    <select name="sex" required>
                        <option value="">- Sélectionnez -</option>
                        <option value="male" @selected(old('sex') === 'male')>Mâle</option>
                        <option value="female" @selected(old('sex') === 'female')>Femelle</option>
                    </select>
                    @error('sex') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Date de disponibilité</label>
                    <input type="date" name="adoption_date" value="{{ old('adoption_date') }}" required />
                    @error('adoption_date') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>Poids de naissance (g)</label>
                    <input type="number" name="weight" value="{{ old('weight') }}" />
                    @error('weight') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Numéro d'identification</label>
                    <input type="text" name="identification_number" value="{{ old('identification_number') }}" />
                    @error('identification_number') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>Prix (€)</label>
                    <input type="text" name="price" value="{{ old('price') }}" required />
                    @error('price') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Statut</label>
                    <select name="status" required>
                        <option value="">- Sélectionnez -</option>
                        <option value="disponible" @selected(old('status') === 'disponible')>Disponible</option>
                        <option value="réservé" @selected(old('status') === 'réservé')>Réservé</option>
                        <option value="vendu" @selected(old('status') === 'vendu')>Vendu</option>
                    </select>
                    @error('status') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-field">
                <label>Description de l'animal</label>
                <textarea placeholder="Parler de l'animal, de son comportement tout ce qui pourrait être intéressant de savoir" name="description" required>{{ old('description') }}</textarea>
                @error('description') <small class="form-error">{{ $message }}</small> @enderror
            </div>
        </div>

        <span class="form-separator"></span>

        <div class="form-block">
            <h3 class="form-block-title">Photos</h3>

            <div class="form-row">
                <div class="form-field">
                    <label>Pour le thumbnail</label>
                    <input type="file" name="image_path" required />
                    @error('image_path') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Photos pour le carrousel de l'animal</label>
                    <input type="file" name="pictures[]" multiple accept="image/*" />
                    @error('pictures') <small class="form-error">{{ $message }}</small> @enderror
                    @error('pictures.*') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="form-submit">Créer un chiot dans la portée</button>
    </form>

    <livewire:loading-overlay />

    <script>
        document.querySelector('form').addEventListener('submit', function () {
            const overlay = document.getElementById('loading-overlay');
            const submitBtn = this.querySelector('button[type="submit"]');
            if (overlay) overlay.style.display = 'flex';
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