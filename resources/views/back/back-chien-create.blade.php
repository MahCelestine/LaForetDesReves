<x-layout-back />
<div>
    <div>
        <h1>Ajouter un chien</h1>

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 12px; margin-bottom: 20px; border-radius: 4px;">
                Certains champs contiennent des erreurs. Veuillez vérifier le formulaire ci-dessous.
            </div>
        @endif

        <form action="{{ route('back.back-chien-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <h2>Information</h2>
                <div>
                    <div>
                        <div>
                            <label>Nom avec affixe</label>
                            <input type="text" name="name_affix" value="{{ old('name_affix') }}" required />
                            @error('name_affix')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Nom d'usage</label>
                            <input type="text" name="common_name" value="{{ old('common_name') }}" required />
                            @error('common_name')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>LOF</label>
                            <div class="flex items-center gap-4">
                                <label>
                                    <input type="radio" name="LOF" value="1" {{ old('LOF', $dog->LOF ?? '') == 1 ? 'checked' : '' }} required>
                                    <span>Oui</span>
                                </label>
                                <label>
                                    <input type="radio" name="LOF" value="0" {{ old('LOF', $dog->LOF ?? '') == 0 ? 'checked' : '' }}>
                                    <span>Non</span>
                                </label>
                            </div>
                            @error('LOF')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
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
                    </div>
                    <div>
                        <div>
                            <label>Date de naissance</label>
                            <input type="date" name="birth_date" value="{{ old('birth_date') }}" required />
                            @error('birth_date')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Couleur</label>
                            <input type="text" name="color" value="{{ old('color') }}" required />
                            @error('color')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>Numéro d'identification</label>
                            <input type="text" name="identification_number" value="{{ old('identification_number') }}"
                                required />
                            @error('identification_number')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Cotation</label>
                            <input type="text" name="cotation" value="{{ old('cotation') }}" />
                            @error('cotation')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>Race</label>
                            <select name="breed_id" required>
                                <option value="">- Sélectionnez -</option>
                                @foreach ($breeds as $breed)
                                    <option value="{{ $breed->id }}" @selected((string) old('breed_id') === (string) $breed->id)>
                                        {{ $breed->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('breed_id')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Externe</label>
                            <div class="flex items-center gap-4">
                                <label>
                                    <input type="radio" name="is_external" value="1" {{ old('is_external', $dog->is_external ?? '') == 1 ? 'checked' : '' }} required>
                                    <span>Oui</span>
                                </label>
                                <label>
                                    <input type="radio" name="is_external" value="0" {{ old('is_external', $dog->is_external ?? '') == 0 ? 'checked' : '' }}>
                                    <span>Non</span>
                                </label>
                            </div>
                            @error('is_external')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label>Description de l'animal</label>
                        <textarea
                            placeholder="Parler de l’animal, de son comportement tout ce qui pourrait être intéressant de savoir"
                            name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                    <span></span>
                </div>
                <div>
                    <h2>Photos</h2>
                    <div>
                        <div>
                            <label>Pour le thumbnail (1 fichier de moins de 2 Mo)</label>
                            <input type="file" name="image_path" required />
                            @error('image_path')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Photos de l'animal</label>
                            <input type="file" name="pictures[]" multiple accept="image/*" />
                            @error('pictures')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                            @error('pictures.*')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit">Créer un nouveau reproducteur</button>
                </div>
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