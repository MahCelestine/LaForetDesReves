<div>
    <x-layout-back />
    <div>
        <h1>Modifier {{ $dog->common_name }}</h1>

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 12px; margin-bottom: 20px; border-radius: 4px;">
                Certains champs contiennent des erreurs. Veuillez vérifier le formulaire ci-dessous.
            </div>
        @endif

        <form action="{{ route('back.back-chien-update', ['dog' => $dog->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <h2>Information</h2>
                <div>
                    <div>
                        <div>
                            <label>Nom avec affixe</label>
                            <input type="text" name="name_affix" value="{{ old('name_affix', $dog->name_affix) }}" required />
                            @error('name_affix')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Nom d'usage</label>
                            <input type="text" name="common_name" value="{{ old('common_name', $dog->common_name) }}" required />
                            @error('common_name')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>LOF</label>
                            <div>
                                <label>
                                    <input type="radio" name="LOF" value="1" @checked(old('LOF', $dog->LOF) == 1) required>
                                    <span>Oui</span>
                                </label>
                                <label>
                                    <input type="radio" name="LOF" value="0" @checked(old('LOF', $dog->LOF) == 0)>
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
                                <option value="male" @selected(old('sex', $dog->sex) === 'male')>Mâle</option>
                                <option value="female" @selected(old('sex', $dog->sex) === 'female')>Femelle</option>
                            </select>
                            @error('sex')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>Date de naissance</label>
                            <input type="date" name="birth_date"
                                value="{{ old('birth_date', $dog->birth_date?->format('Y-m-d')) }}" required />
                            @error('birth_date')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Couleur</label>
                            <input type="text" name="color" value="{{ old('color', $dog->color) }}" required />
                            @error('color')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>Numéro d'identification</label>
                            <input type="text" name="identification_number" value="{{ old('identification_number', $dog->identification_number) }}"
                                required />
                            @error('identification_number')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Cotation</label>
                            <input type="text" name="cotation" value="{{ old('cotation', $dog->cotation) }}" />
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
                                    <option value="{{ $breed->id }}" @selected((string) old('breed_id', $dog->breed_id) === (string) $breed->id)>
                                        {{ $breed->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('breed_id')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Retraite ?</label>
                            <select name="retirement" required>
                                <option value="">- Sélectionnez -</option>
                                <option value="0" @selected((string) old('retirement', $dog->retirement) === '0')>Actif</option>
                                <option value="1" @selected((string) old('retirement', $dog->retirement) === '1')>Retraité</option>
                            </select>
                            @error('retirement')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label>Externe</label>
                        <div>
                            <label>
                                <input type="radio" name="is_external" value="1" @checked(old('is_external', $dog->is_external) == 1) required>
                                <span>Oui</span>
                            </label>
                            <label>
                                <input type="radio" name="is_external" value="0" @checked(old('is_external', $dog->is_external) == 0)>
                                <span>Non</span>
                            </label>
                        </div>
                        @error('is_external')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label>Description de l'animal</label>
                        <textarea name="description">{{ old('description', $dog->description) }}</textarea>
                        @error('description')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div x-data="{ deletedPictures: [] }">
                    <h2>Photos</h2>
                    <div>
                        <label>Image principale (Thumbnail)</label>
                        @if ($dog->image_path)
                            <div>
                                <img src="{{ asset('storage/' . $dog->image_path) }}" alt="Thumbnail actuel"
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
                            @foreach ($dog->pictures as $picture)
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
                </div>
                <span></span>
                <button type="submit">Modifier la fiche de {{ $dog->common_name }}</button>
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