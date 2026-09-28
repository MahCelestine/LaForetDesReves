<div>
    <x-layout-back />
    <div>
        <h1>Ajouter un chiot</h1>

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 12px; margin-bottom: 20px; border-radius: 4px;">
                Certains champs contiennent des erreurs. Veuillez vérifier le formulaire ci-dessous.
            </div>
        @endif

        <form action="{{ route('back.back-chiot-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="litter_id" value="{{ old('litter_id', $litter_id) }}" />
            <div>
                <h2>Information</h2>
                <div>
                    <div>
                        <div>
                            <label>Nom</label>
                            <input type="text" name="name" value="{{ old('name') }}" />
                            @error('name')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Couleur</label>
                            <input type="text" name="color" value="{{ old('color') }}" />
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
                                <option value="male" @selected(old('sex') === 'male')>Mâle</option>
                                <option value="female" @selected(old('sex') === 'female')>Femelle</option>
                            </select>
                            @error('sex')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Date de disponibilité</label>
                            <input type="date" name="adoption_date" value="{{ old('adoption_date') }}" required />
                            @error('adoption_date')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>Poids de naissance</label>
                            <input type="number" name="weight" value="{{ old('weight') }}" />
                            <small>g</small>
                            @error('weight')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Numéro d'identification</label>
                            <input type="text" name="identification_number" value="{{ old('identification_number') }}" />
                            @error('identification_number')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>Prix</label>
                            <input type="text" name="price" value="{{ old('price') }}" required />
                            <small>€</small>
                            @error('price')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Statut</label>
                            <select name="status" required>
                                <option value="">- Sélectionnez -</option>
                                <option value="disponible" @selected(old('status') === 'disponible')>Disponible</option>
                                <option value="réservé" @selected(old('status') === 'réservé')>Réservé</option>
                                <option value="vendu" @selected(old('status') === 'vendu')>Vendu</option>
                            </select>
                            @error('status')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label>Description de l'animal</label>
                        <textarea
                            placeholder="Parler de l’animal, de son comportement tout ce qui pourrait être intéressant de savoir"
                            name="description" required>{{ old('description') }}</textarea>
                        @error('description')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                    <span></span>
                </div>
                <div>
                    <h2>Photos</h2>
                    <div>
                        <label>Pour le thumbnail</label>
                        <input type="file" name="image_path" required />
                        @error('image_path')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label>Photos pour le carrousel de l'animal</label>
                        <input type="file" name="pictures[]" multiple accept="image/*" />
                        @error('pictures')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                        @error('pictures.*')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                    <span></span>
                </div>
                <button type="submit">Créer un chiot dans la portée</button>
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