<x-layout-back>
    <div class="backoffice-page-header">
        <h1 class="title">Ajouter une portée</h1>
    </div>

    @if ($errors->any())
        <div class="form-alert form-alert-error">Certains champs contiennent des erreurs. Veuillez vérifier le formulaire ci-dessous.</div>
    @endif

    <form action="{{ route('back.back-litter-store') }}" method="POST" class="contact-form" x-data="{
        breedSelect: '{{ old('breed_id') }}',
        dadSelect: '{{ old('dad_id') }}',
        momSelect: '{{ old('mom_id') }}',
        dogs: @js($dogs),
        get dads() { return this.dogs.filter(dog => dog.sex === 'male' && dog.breed_id == this.breedSelect); },
        get moms() { return this.dogs.filter(dog => dog.sex === 'female' && dog.breed_id == this.breedSelect); },
        onBreedChange() { this.dadSelect = ''; this.momSelect = ''; }
    }">
        @csrf

        <div class="form-block">
            <h3 class="form-block-title">Informations</h3>

            <div class="form-row">
                <div class="form-field">
                    <label>Date de mise à bas</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}" />
                    @error('birth_date') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Race</label>
                    <select name="breed_id" x-model="breedSelect" @change="onBreedChange()" required>
                        <option value="">Sélectionner la race</option>
                        @foreach ($breeds as $breed)
                            <option value="{{ $breed->id }}" @selected(old('breed_id') == $breed->id)>{{ $breed->name }}</option>
                        @endforeach
                    </select>
                    @error('breed_id') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <span class="form-separator"></span>

        <div class="form-block">
            <p class="form-warning">Attention : avant de choisir les parents, sélectionnez la race pour que la liste des reproducteurs corresponde.</p>

            <div class="form-row">
                <div class="form-field">
                    <label>Père</label>
                    <select name="dad_id" x-model="dadSelect" :disabled="!breedSelect" required>
                        <option value="" x-text="!breedSelect ? '- Sélectionnez d\'abord une race -' : '- Sélectionner le père -'"></option>
                        <template x-for="dad in dads" :key="dad.id">
                            <option :value="dad.id" x-text="dad.common_name + (dad.is_external ? ' (Externe)' : '')" :selected="dad.id == dadSelect"></option>
                        </template>
                    </select>
                    @error('dad_id') <small class="form-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label>Mère</label>
                    <select name="mom_id" x-model="momSelect" :disabled="!breedSelect" required>
                        <option value="" x-text="!breedSelect ? '- Sélectionnez d\'abord une race -' : '- Sélectionner la mère -'"></option>
                        <template x-for="mom in moms" :key="mom.id">
                            <option :value="mom.id" x-text="mom.common_name + (mom.is_external ? ' (Externe)' : '')" :selected="mom.id == momSelect"></option>
                        </template>
                    </select>
                    @error('mom_id') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <input type="hidden" name="number_puppies" value="{{ old('number_puppies', 0) }}" />

        <button type="submit" class="form-submit">Créer une nouvelle portée</button>
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