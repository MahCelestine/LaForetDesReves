<div>
    <x-layout-back />
    <div>
        <h1>Modifier la portée de {{ $litter->dad?->common_name }} et {{ $litter->mom?->common_name }}</h1>

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 12px; margin-bottom: 20px; border-radius: 4px;">
                Certains champs contiennent des erreurs. Veuillez vérifier le formulaire ci-dessous.
            </div>
        @endif

        <form action="{{ route('back.back-litter-update', $litter) }}" method="POST" x-data="{
            breedSelect: '{{ old('breed_id', $litter->breed_id) }}',
            dadSelect: '{{ old('dad_id', $litter->dad_id) }}',
            momSelect: '{{ old('mom_id', $litter->mom_id) }}',
            dogs: @js($dogs),
            
            get dads() {
                return this.dogs.filter(dog => dog.sex === 'male' && dog.breed_id == this.breedSelect);
            },
            get moms() {
                return this.dogs.filter(dog => dog.sex === 'female' && dog.breed_id == this.breedSelect);
            },
            
            onBreedChange() {
                this.dadSelect = '';
                this.momSelect = '';
            }
        }">
            @csrf
            @method('PUT')
            <div>
                <h2>Informations</h2>
                <div>
                    <div>
                        <label>Date de mise à bas</label>
                        <input type="date" name="birth_date"
                            value="{{ old('birth_date', $litter->birth_date?->format('Y-m-d')) }}" />
                        @error('birth_date')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label>Race</label>
                        <select name="breed_id" x-model="breedSelect" @change="onBreedChange()" required>
                            <option value="">Sélectionner la race</option>
                            @foreach ($breeds as $breed)
                                <option value="{{ $breed->id }}" @selected((string) old('breed_id', $litter->breed_id) === (string) $breed->id)>
                                    {{ $breed->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('breed_id')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <span></span>
                <div>
                    <h2>Attention avant de choisir les parents sélectionner la race pour que la liste des reproducteurs corresponde</h2>
                    <div>
                        <label>Père</label>
                        <select name="dad_id" x-model="dadSelect" :disabled="!breedSelect" required>
                            <option value=""
                                x-text="!breedSelect ? '- Sélectionnez d\'abord une race -' : '- Sélectionner le père -'">
                            </option>
                            <template x-for="dad in dads" :key="dad.id">
                                <option :value="dad.id" x-text="dad.common_name + (dad.is_external ? ' (Externe)' : '')" :selected="dad.id == dadSelect"></option>
                            </template>
                        </select>
                        @error('dad_id')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label>Mère</label>
                        <select name="mom_id" x-model="momSelect" :disabled="!breedSelect" required>
                            <option value=""
                                x-text="!breedSelect ? '- Sélectionnez d\'abord une race -' : '- Sélectionner la mère -'">
                            </option>
                            <template x-for="mom in moms" :key="mom.id">
                                <option :value="mom.id" x-text="mom.common_name + (mom.is_external ? ' (Externe)' : '')" :selected="mom.id == momSelect"></option>
                            </template>
                        </select>
                        @error('mom_id')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div>
                    <label>Statut</label>
                    <select name="status" required>
                        <option value="">- Sélectionnez -</option>
                        <option value="en cours" @selected(old('status', $litter->status) === 'en cours')>En cours</option>
                        <option value="futur" @selected(old('status', $litter->status) === 'futur')>Futur</option>
                        <option value="passée" @selected(old('status', $litter->status) === 'passée')>Passée</option>
                    </select>
                    @error('status')
                        <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                    @enderror
                </div>
                <input type="hidden" name="number_puppies" value="{{ old('number_puppies', $litter->number_puppies) }}" />
                <span></span>
                <button type="submit">Mettre à jour la portée</button>
            </div>
        </form>
    </div>
    <livewire:loading-overlay />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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