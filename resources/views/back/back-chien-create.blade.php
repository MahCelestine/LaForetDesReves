<x-layout-back>
    <div class="md:flex md:justify-between md:items-center md:mb-4">
        <h1 class="title">Ajouter un chien</h1>
    </div>

    @if ($errors->any())
        <div class="form-alert form-alert-error">
            Certains champs contiennent des erreurs. Veuillez vérifier le formulaire ci-dessous.
        </div>
    @endif

    <form action="{{ route('back.back-chien-store') }}" method="POST" enctype="multipart/form-data" class="contact-form">
        @csrf

        <div class="form-block">
            <h3 class="form-block-title">Information</h3>

            <div class="form-row">
                <div class="form-field">
                    <label>Nom avec affixe</label>
                    <input type="text" name="name_affix" value="{{ old('name_affix') }}" required />
                    @error('name_affix') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Nom d'usage</label>
                    <input type="text" name="common_name" value="{{ old('common_name') }}" required />
                    @error('common_name') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>LOF</label>
                    <div class="form-radio-group">
                        <label class="form-radio">
                            <input type="radio" name="LOF" value="1" {{ old('LOF', $dog->LOF ?? '') == 1 ? 'checked' : '' }} required>
                            <span>Oui</span>
                        </label>
                        <label class="form-radio">
                            <input type="radio" name="LOF" value="0" {{ old('LOF', $dog->LOF ?? '') == 0 ? 'checked' : '' }}>
                            <span>Non</span>
                        </label>
                    </div>
                    @error('LOF') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Sexe</label>
                    <select name="sex" required>
                        <option value="">- Sélectionnez -</option>
                        <option value="male" @selected(old('sex') === 'male')>Mâle</option>
                        <option value="female" @selected(old('sex') === 'female')>Femelle</option>
                    </select>
                    @error('sex') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>Date de naissance</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}" required />
                    @error('birth_date') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Couleur</label>
                    <input type="text" name="color" value="{{ old('color') }}" required />
                    @error('color') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>Numéro d'identification</label>
                    <input type="text" name="identification_number" value="{{ old('identification_number') }}" required />
                    @error('identification_number') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Cotation</label>
                    <input type="text" name="cotation" value="{{ old('cotation') }}" />
                    @error('cotation') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>Race</label>
                    <select name="breed_id" required>
                        <option value="">- Sélectionnez -</option>
                        @foreach ($breeds as $breed)
                            <option value="{{ $breed->id }}" @selected((string) old('breed_id') === (string) $breed->id)>
                                {{ $breed->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('breed_id') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Externe</label>
                    <div class="form-radio-group">
                        <label class="form-radio">
                            <input type="radio" name="is_external" value="1" {{ old('is_external', $dog->is_external ?? '') == 1 ? 'checked' : '' }} required>
                            <span>Oui</span>
                        </label>
                        <label class="form-radio">
                            <input type="radio" name="is_external" value="0" {{ old('is_external', $dog->is_external ?? '') == 0 ? 'checked' : '' }}>
                            <span>Non</span>
                        </label>
                    </div>
                    @error('is_external') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-field">
                <label>Description de l'animal</label>
                <textarea placeholder="Parler de l'animal, de son comportement tout ce qui pourrait être intéressant de savoir" name="description">{{ old('description') }}</textarea>
                @error('description') <small class="form-error">{{ $message }}</small> @enderror
            </div>
        </div>

        <span class="form-separator"></span>

        <div class="form-block">
            <h3 class="form-block-title">Photos</h3>

            <div class="form-row">
                <div class="form-field">
                    <label>Pour le thumbnail (1 fichier de moins de 2 Mo)</label>
                    <input type="file" name="image_path" required />
                    @error('image_path') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Photos de l'animal</label>
                    <input type="file" name="pictures[]" multiple accept="image/*" />
                    @error('pictures') <small class="form-error">{{ $message }}</small> @enderror
                    @error('pictures.*') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <button type="submit" class="form-submit">Créer un nouveau reproducteur</button>
        </div>
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