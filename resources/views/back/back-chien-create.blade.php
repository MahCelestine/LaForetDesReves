<x-layout-back />
<div>
    <div>
        <h1>Ajouter un chien</h1>
        <form action="{{ route('back.back-chien-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <h2>Information</h2>
                <div>
                    <div>
                        <label>Nom avec affixe</label>
                        <input type="text" name="name_affix" required />
                    </div>
                    <div>
                        <label>Nom d'usage</label>
                        <input type="text" name="common_name" required />
                    </div>
                </div>
                <div>
                    <div>
                        <label>LOF</label>
                        <select name="LOF" required>
                            <option value="">- Sélectionnez -</option>
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                    </div>
                    <div>
                        <label>Sexe</label>
                        <select name="sex" required>
                            <option value="">- Sélectionnez -</option>
                            <option value="male">Mâle</option>
                            <option value="female">Femelle</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div>
                        <label>Date de naissance</label>
                        <input type="date" name="birth_date" required />
                    </div>
                    <div>
                        <label>Couleur</label>
                        <input type="text" name="color" required />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Numéro d'identification</label>
                        <input type="text" name="identification_number" required />
                    </div>
                    <div>
                        <label>Cotation</label>
                        <input type="text" name="cotation" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Race</label>
                        <select name="breed_id" required>
                            <option value="">- Sélectionnez -</option>
                            @foreach ($breeds as $breed)
                                <option value="{{ $breed->id }}">{{ $breed->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Externe</label>
                        <select name="is_external" required>
                            <option value="">- Sélectionnez -</option>
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label>Description de l'animal</label>
                    <textarea
                        placeholder="Parler de  l’animal, de son comportement t out ce qui pourrait être intéressant de savoir"
                        name="description"></textarea>
                </div>
                <span></span>
            </div>
            <div>
                <h2>Photos</h2>
                <div>
                    <label>Pour le thumbail (1 fichier de moins de 2 Mo)</label>
                    <div>
                        <input type="file" name="image_path" required />
                    </div>
                    <div>
                        <label>Photos de l'animal</label>
                        <input type="file" name="pictures[]" multiple accept="image/*" />
                    </div>
                </div>
                <button type="submit">Créer un nouveau reproducteur</button>
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