<div>
    <x-layout-back />
    <div>
        <h1>Ajouter une portée</h1>
        <form action="{{ route('back.back-litter-store') }}" method="POST" x-data="{
            breedSelect: '',
            dadSelect: '',
            momSelect: '',
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
            <div>
                <h2>Informations</h2>
                <div>
                    <div>
                        <label>Date de mise à bas</label>
                        <input type="date" name="birth_date" />
                    </div>
                    <div>
                        <label>Race</label>
                        <select name="breed_id" x-model="breedSelect" @change="onBreedChange()" required>
                            <option value="">Sélectionner la race</option>
                            @foreach ($breeds as $breed)
                                <option value="{{ $breed->id }}">{{ $breed->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <span></span>
                <div>
                    <h2>Attention avant de choisir les parents sélectionner la race pour que la liste des reproducteurs
                        corresponde</h2>
                    <div>
                        <label>Père</label>
                        <select name="dad_id" x-model="dadSelect" :disabled="!breedSelect" required>
                            <option value=""
                                x-text="!breedSelect ? '- Sélectionnez d\'abord une race -' : '- Sélectionner le père -'">
                            </option>
                            <template x-for="dad in dads" :key="dad.id">
                                <option :value="dad.id" x-text="dad.common_name"></option>
                            </template>
                        </select>
                    </div>
                    <div>
                        <label>Mère</label>
                        <select name="mom_id" x-model="momSelect" :disabled="!breedSelect" required>
                            <option value=""
                                x-text="!breedSelect ? '- Sélectionnez d\'abord une race -' : '- Sélectionner la mère -'">
                            </option>
                            <template x-for="mom in moms" :key="mom.id">
                                <option :value="mom.id" x-text="mom.common_name"></option>
                            </template>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="number_puppies" value="0" />
                <span></span>
                <button type="submit">Créer une nouvelle porté</button>
        </form>
    </div>
</div>