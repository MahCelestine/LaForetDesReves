<div>
    <x-layout-back />
    <div>
        <h1>Modifier {{ $dog->common_name }}</h1>

        <form action="{{ route('back.back-chien-update', ['dog' => $dog->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <h2>Information</h2>
                <div>
                    <div>
                        <label>Nom avec affixe</label>
                        <input type="text" name="name_affix" value="{{ $dog->name_affix }}" required />
                    </div>
                    <div>
                        <label>Nom d'usage</label>
                        <input type="text" name="common_name" value="{{ $dog->common_name }}" required />
                    </div>
                </div>
                <div>
                    <div>
                        <label>LOF</label>
                        <select name="LOF" required>
                            <option value="">- Sélectionnez -</option>
                            <option value="1" {{ $dog->LOF == 1 ? 'selected' : '' }}>Oui</option>
                            <option value="0" {{ $dog->LOF == 0 ? 'selected' : '' }}>Non</option>
                        </select>
                    </div>
                    <div>
                        <label>Sexe</label>
                        <select name="sex" required>
                            <option value="">- Sélectionnez -</option>
                            <option value="male" {{ $dog->sex == 'male' ? 'selected' : '' }}>Mâle</option>
                            <option value="female" {{ $dog->sex == 'female' ? 'selected' : '' }}>Femelle</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div>
                        <label>Date de naissance</label>
                        <input type="date" name="birth_date"
                            value="{{ old('birth_date', $dog->birth_date?->format('Y-m-d')) }}" required />
                    </div>
                    <div>
                        <label>Couleur</label>
                        <input type="text" name="color" value="{{ $dog->color }}" required />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Numéro d'identification</label>
                        <input type="text" name="identification_number" value="{{ $dog->identification_number }}"
                            required />
                    </div>
                    <div>
                        <label>Cotation</label>
                        <input type="text" name="cotation" value="{{ $dog->cotation }}" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Race</label>
                        <select name="breed_id" required>
                            <option value="">- Sélectionnez -</option>
                            @foreach ($breeds as $breed)
                                <option value="{{ $breed->id }}" {{ $dog->breed_id == $breed->id ? 'selected' : '' }}>
                                    {{ $breed->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Retraite ?</label>
                        <select name="retirement" required>
                            <option value="">- Sélectionnez -</option>
                            <option value="0" {{ $dog->retirement == 0 ? 'selected' : '' }}>Actif</option>
                            <option value="1" {{ $dog->retirement == 1 ? 'selected' : '' }}>Retraité</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label>Externe</label>
                    <select name="is_external" required>
                        <option value="">- Sélectionnez -</option>
                        <option value="1" {{ $dog->is_external ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ !$dog->is_external ? 'selected' : '' }}>Non</option>
                    </select>
                </div>
                <div>
                    <label>Description de l'animal</label>
                    <textarea name="description">{{ $dog->description }}</textarea>
                </div>
            </div>
            <div x-data="{ deletedPictures: [] }">
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
                    </div>
                </div>
            </div>
            <span></span>
            <button type="submit">Modifier la fiche de {{ $dog->common_name }}</button>
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