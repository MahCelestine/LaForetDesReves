<x-layout>
    <section class="md:px-5 max-md:px-2 xl:px-40">
        <div>
            <div class="md:py-10 py-4">
                <h2 class="sub-title">Contact</h2>
                <h1 class="title">Échangeons ensemble</h1>
                <h3 class="title-description">Remplissez ce formulaire afin que nous puissions mieux comprendre votre projet et vous orienter vers
                    le compagnon idéal pour votre mode de vie. </h3>
            </div>
            <div>
                <div>
                    <i class="bi bi-telephone" aria-hidden="true"></i>
                    <div>
                        <small>Téléphone</small>
                        <p>+33 6 00 00 00 00</p>
                    </div>
                </div>
                <div>
                    <i class="bi bi-envelope" aria-hidden="true"></i>
                    <div>
                        <small>Mail</small>
                        <a href="mailto:elevageforetdesreves@gmail.com">elevageforetdesreves@gmail.com</a>
                    </div>
                </div>
                <div>
                    <i class="bi bi-geo-alt" aria-hidden="true"></i>
                    <div>
                        <small>Adresse</small>
                        <p>139 VC Cappelle Straete, 59470 Volckerinckhove</p>
                    </div>
                </div>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2519.1548420146573!2d2.316606576847842!3d50.84681685874529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dcf76c238101e3%3A0x22f1de0d65168258!2sPension%20Happy%20Holidays%20Et%20Elevage%20de%20la%20For%C3%AAt%20des%20r%C3%AAves!5e0!3m2!1sfr!2sfr!4v1783515272975!5m2!1sfr!2sfr"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="strict-origin-when-cross-origin"></iframe>
            <div>
                <h4>Horaires d'ouverture</h4>
                <p>Lundi au Samedi</p>
                <small>Uniquement sur rendez-vous</small>
            </div>
        </div>

        <form action="{{ route('front.contact.submit') }}" method="POST" x-data="{
    breedSelect: '{{ old('breed_id') }}',
    puppySelect: '{{ old('puppy_id') }}',
    puppies: @js($puppies),

    get filteredPuppies() {
        if (!this.breedSelect) return [];
        return this.puppies.filter(puppy => String(puppy.breed_id) === String(this.breedSelect));
    },

    onBreedChange() {
        this.puppySelect = '';
    }
}">
            @csrf

            {{-- Affichage d'une alerte globale en cas d'erreur ou succès --}}
            @if (session('success'))
                <div
                    style="background-color: #d4edda; color: #155724; padding: 12px; margin-bottom: 20px; border-radius: 4px;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div
                    style="background-color: #f8d7da; color: #721c24; padding: 12px; margin-bottom: 20px; border-radius: 4px;">
                    Certains champs contiennent des erreurs.
                </div>
            @endif

            <div>
                <h3>Information</h3>
                <div>
                    <div>
                        <div>
                            <label>Nom *</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Votre nom" required />
                            @error('name')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Prénom *</label>
                            <input type="text" name="surname" value="{{ old('surname') }}" placeholder="Votre prénom"
                                required />
                            @error('surname')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label>Adresse e-mail *</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                placeholder="Votre adresse e-mail" required />
                            @error('email')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Téléphone *</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                placeholder="Votre numéro de téléphone" required />
                            @error('phone')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label>Adresse postale * (adresse, ville, pays)</label>
                        <input type="text" name="address" value="{{ old('address') }}"
                            placeholder="Votre adresse postale" required />
                        @error('address')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <span></span>

                <div>
                    <h3>Le chiot</h3>
                    <div>
                        <div>
                            <label>Race souhaitée *</label>
                            <select name="breed_id" x-model="breedSelect" @change="onBreedChange()" required>
                                <option value="">- Sélectionner une race -</option>
                                @foreach ($breeds as $breed)
                                    <option value="{{ $breed->id }}">{{ $breed->name }}</option>
                                @endforeach
                            </select>
                            @error('breed_id')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div>
                            <label>Quel chiot vous fait craquer ?</label>
                            <select name="puppy_id" x-model="puppySelect" :disabled="!breedSelect">
                                <option value=""
                                    x-text="!breedSelect ? '- Sélectionnez d\'abord une race -' : '- Sélectionner un chiot -'">
                                </option>
                                <template x-for="puppy in filteredPuppies" :key="puppy.id">
                                    <option :value="puppy.id" x-text="puppy.name"></option>
                                </template>
                                <template x-if="breedSelect">
                                    <option value="waiting_list">Inscription sur liste d'attente</option>
                                </template>
                            </select>
                            @error('puppy_id')
                                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <span></span>

                <div>
                    <h3>Votre mode de vie</h3>
                    <div>
                        <div>
                            <div>
                                <label>Situation du logement *</label>
                                <select name="housing" required>
                                    <option value="">- Sélectionner un type de logement -</option>
                                    <option value="house-yard" @selected(old('housing') === 'house-yard')>Maison avec un
                                        jardin</option>
                                    <option value="house-no-yard" @selected(old('housing') === 'house-no-yard')>Maison
                                        sans jardin</option>
                                    <option value="apartment" @selected(old('housing') === 'apartment')>Appartement
                                    </option>
                                    <option value="other" @selected(old('housing') === 'other')>Autre</option>
                                </select>
                                @error('housing')
                                    <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                                @enderror
                            </div>

                            <div>
                                <div>
                                    <label>Expérience canine</label>
                                    <select name="canine_experience">
                                        <option value="">- Sélectionner une option -</option>
                                        <option value="first-dog" @selected(old('canine_experience') === 'first-dog')>
                                            Premier chien</option>
                                        <option value="already" @selected(old('canine_experience') === 'already')>J'en ai
                                            déjà eu</option>
                                        <option value="advanced" @selected(old('canine_experience') === 'advanced')>
                                            Propriétaire expérimenté</option>
                                        <option value="pro-dog" @selected(old('canine_experience') === 'pro-dog')>
                                            Professionnel canin</option>
                                    </select>
                                    @error('canine_experience')
                                        <small
                                            style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div>
                                    <label>Enfants ?</label>
                                    <select name="children">
                                        <option value="">- Sélectionner une option -</option>
                                        <option value="yes" @selected(old('children') === 'yes')>Oui</option>
                                        <option value="no" @selected(old('children') === 'no')>Non</option>
                                    </select>
                                    @error('children')
                                        <small
                                            style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label>Autres animaux ?</label>
                                <input type="text" name="other_pets" value="{{ old('other_pets') }}"
                                    placeholder="Quels animaux avez-vous déjà dans votre foyer ?" />
                                @error('other_pets')
                                    <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <span></span>

                    <div>
                        <label>Votre message *</label>
                        <textarea name="message"
                            placeholder="Parlez-nous de votre projet ou posez-nous des questions..."
                            required>{{ old('message') }}</textarea>
                        @error('message')
                            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit">Envoyer mon dossier</button>
                </div>
            </div>
        </form>
        <small>
            En soumettant ce formulaire, vous acceptez que les informations saisies soient transmises par e-mail à
            l'éleveuse pour traiter votre demande. Pour en savoir plus sur la gestion de vos données,
            consultez notre <a href="/politique-de-confidentialite">Politique de Confidentialité</a>.
        </small>
    </section>
</x-layout>