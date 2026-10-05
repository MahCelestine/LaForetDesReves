<x-layout-back>
    <div class="backoffice-page-header">
        <h1 class="title">Modifier {{ $dog->common_name }}</h1>
    </div>

    @if ($errors->any())
        <div class="form-alert form-alert-error">Certains champs contiennent des erreurs. Veuillez vérifier le formulaire ci-dessous.</div>
    @endif

    <form action="{{ route('back.back-chien-update', ['dog' => $dog->id]) }}" method="POST" enctype="multipart/form-data" class="contact-form">
        @csrf
        @method('PUT')

        <div class="form-block">
            <h3 class="form-block-title">Information</h3>

            <div class="form-row">
                <div class="form-field">
                    <label>Nom avec affixe</label>
                    <input type="text" name="name_affix" value="{{ old('name_affix', $dog->name_affix) }}" required />
                    @error('name_affix') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Nom d'usage</label>
                    <input type="text" name="common_name" value="{{ old('common_name', $dog->common_name) }}" required />
                    @error('common_name') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>LOF</label>
                    <div class="form-radio-group">
                        <label class="form-radio">
                            <input type="radio" name="LOF" value="1" @checked(old('LOF', $dog->LOF) == 1) required>
                            <span>Oui</span>
                        </label>
                        <label class="form-radio">
                            <input type="radio" name="LOF" value="0" @checked(old('LOF', $dog->LOF) == 0)>
                            <span>Non</span>
                        </label>
                    </div>
                    @error('LOF') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Sexe</label>
                    <select name="sex" required>
                        <option value="">- Sélectionnez -</option>
                        <option value="male" @selected(old('sex', $dog->sex) === 'male')>Mâle</option>
                        <option value="female" @selected(old('sex', $dog->sex) === 'female')>Femelle</option>
                    </select>
                    @error('sex') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>Date de naissance</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date', $dog->birth_date?->format('Y-m-d')) }}" required />
                    @error('birth_date') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Couleur</label>
                    <input type="text" name="color" value="{{ old('color', $dog->color) }}" required />
                    @error('color') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>Numéro d'identification</label>
                    <input type="text" name="identification_number" value="{{ old('identification_number', $dog->identification_number) }}" required />
                    @error('identification_number') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Cotation</label>
                    <input type="text" name="cotation" value="{{ old('cotation', $dog->cotation) }}" />
                    @error('cotation') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>Race</label>
                    <select name="breed_id" required>
                        <option value="">- Sélectionnez -</option>
                        @foreach ($breeds as $breed)
                            <option value="{{ $breed->id }}" @selected((string) old('breed_id', $dog->breed_id) === (string) $breed->id)>
                                {{ $breed->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('breed_id') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Retraite ?</label>
                    <select name="retirement" required>
                        <option value="">- Sélectionnez -</option>
                        <option value="0" @selected((string) old('retirement', $dog->retirement) === '0')>Actif</option>
                        <option value="1" @selected((string) old('retirement', $dog->retirement) === '1')>Retraité</option>
                    </select>
                    @error('retirement') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-field">
                <label>Externe</label>
                <div class="form-radio-group">
                    <label class="form-radio">
                        <input type="radio" name="is_external" value="1" @checked(old('is_external', $dog->is_external) == 1) required>
                        <span>Oui</span>
                    </label>
                    <label class="form-radio">
                        <input type="radio" name="is_external" value="0" @checked(old('is_external', $dog->is_external) == 0)>
                        <span>Non</span>
                    </label>
                </div>
                @error('is_external') <small class="form-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-field">
                <label>Description de l'animal</label>
                <textarea name="description">{{ old('description', $dog->description) }}</textarea>
                @error('description') <small class="form-error">{{ $message }}</small> @enderror
            </div>
        </div>

        <span class="form-separator"></span>

        <div class="form-block" x-data="{ deletedPictures: [] }">
            <h3 class="form-block-title">Photos</h3>

            <div class="form-field">
                <label>Image principale (Thumbnail)</label>
                @if ($dog->image_path)
                    <div class="photo-preview">
                        <img src="{{ asset('storage/' . $dog->image_path) }}" alt="Thumbnail actuel">
                        <small>Image actuelle</small>
                    </div>
                @endif
                <input type="file" name="image_path" accept="image/*" />
                @error('image_path') <small class="form-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-field">
                <label>Galerie de photos actuelles</label>
                <div class="photo-gallery">
                    @foreach ($dog->pictures as $picture)
                        <div class="photo-gallery-item" x-show="!deletedPictures.includes({{ $picture->id }})">
                            <img src="{{ asset('storage/' . $picture->image_path) }}" alt="Photo">
                            <button type="button" class="photo-delete-btn" @click="deletedPictures.push({{ $picture->id }})">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </div>
                    @endforeach
                </div>

                <template x-for="id in deletedPictures" :key="id">
                    <input type="hidden" name="delete_pictures[]" :value="id">
                </template>
            </div>

            <div class="form-field">
                <label>Ajouter des photos à la galerie</label>
                <input type="file" name="pictures[]" multiple accept="image/*" />
                @error('pictures') <small class="form-error">{{ $message }}</small> @enderror
                @error('pictures.*') <small class="form-error">{{ $message }}</small> @enderror
            </div>
        </div>

        <button type="submit" class="form-submit">Modifier la fiche de {{ $dog->common_name }}</button>
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