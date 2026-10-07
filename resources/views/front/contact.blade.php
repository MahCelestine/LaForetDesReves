<x-layout>
    <section class="md:px-5 max-md:px-2 xl:px-40 contact-section">

        <div class="contact-header">
            <h2 class="sub-title">Contact</h2>
            <h1 class="title">Échangeons ensemble</h1>
            <h3 class="title-description">Remplissez ce formulaire afin que nous puissions mieux comprendre votre projet
                et vous orienter vers le compagnon idéal pour votre mode de vie.</h3>
        </div>

        <form action="{{ route('front.contact.submit') }}" method="POST" class="contact-form" x-data="{
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

            @if (session('success'))
                <div class="form-alert form-alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="form-alert form-alert-error">Certains champs contiennent des erreurs.</div>
            @endif

            <div class="form-block">
                <h3 class="form-block-title">Information</h3>

                <div class="form-row">
                    <div class="form-field">
                        <label for="nom">Nom *</label>
                        <input type="text" id="nom" name="name" value="{{ old('name') }}" placeholder="Votre nom"
                            required />
                        @error('name') <small class="form-error">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-field">
                        <label for="prénom">Prénom *</label>
                        <input type="text" id="prénom" name="surname" value="{{ old('prénom') }}"
                            placeholder="Votre prénom" required />
                        @error('surname') <small class="form-error">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-field">
                        <label for="email">Adresse e-mail *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Votre adresse e-mail" required />
                        @error('email') <small class="form-error">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-field">
                        <label for="téléphone">Téléphone *</label>
                        <input type="text" id="téléphone" name="phone" value="{{ old('phone') }}"
                            placeholder="Votre numéro de téléphone" required />
                        @error('phone') <small class="form-error">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-field">
                    <label for="addresse">Adresse postale * (adresse, ville, pays)</label>
                    <input type="text" id="addresse" name="address" value="{{ old('address') }}"
                        placeholder="Votre adresse postale" required />
                    @error('address') <small class="form-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <span class="form-separator"></span>

            <div class="form-block">
                <h3 class="form-block-title">Le chiot</h3>
                <div class="form-row">
                    <div class="form-field">
                        <label for="race">Race souhaitée *</label>
                        <select name="breed_id" id="race" x-model="breedSelect" @change="onBreedChange()" required>
                            <option value="">- Sélectionner une race -</option>
                            @foreach ($breeds as $breed)
                                <option value="{{ $breed->id }}">{{ $breed->name }}</option>
                            @endforeach
                        </select>
                        @error('breed_id') <small class="form-error">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-field">
                        <label for="chiot">Quel chiot vous fait craquer ?</label>
                        <select id="chiot" name="puppy_id" x-model="puppySelect" :disabled="!breedSelect">
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
                        @error('puppy_id') <small class="form-error">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>

            <span class="form-separator"></span>

            <div class="form-block">
                <h3 class="form-block-title">Votre mode de vie</h3>

                <div class="form-field">
                    <label for="logement">Situation du logement *</label>
                    <select id="logement" name="housing" required>
                        <option value="">- Sélectionner un type de logement -</option>
                        <option value="house-yard" @selected(old('housing') === 'house-yard')>Maison avec un jardin
                        </option>
                        <option value="house-no-yard" @selected(old('housing') === 'house-no-yard')>Maison sans jardin
                        </option>
                        <option value="apartment" @selected(old('housing') === 'apartment')>Appartement</option>
                        <option value="other" @selected(old('housing') === 'other')>Autre</option>
                    </select>
                    @error('housing') <small class="form-error">{{ $message }}</small> @enderror
                </div>

                <div class="form-row">
                    <div class="form-field">
                        <label for="experience">Expérience canine</label>
                        <select id="experience" name="canine_experience">
                            <option value="">- Sélectionner une option -</option>
                            <option value="first-dog" @selected(old('canine_experience') === 'first-dog')>Premier chien
                            </option>
                            <option value="already" @selected(old('canine_experience') === 'already')>J'en ai déjà eu
                            </option>
                            <option value="advanced" @selected(old('canine_experience') === 'advanced')>Propriétaire
                                expérimenté</option>
                            <option value="pro-dog" @selected(old('canine_experience') === 'pro-dog')>Professionnel canin
                            </option>
                        </select>
                        @error('canine_experience') <small class="form-error">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-field">
                        <label for="enfants">Enfants ?</label>
                        <select id="enfants" name="children">
                            <option value="">- Sélectionner une option -</option>
                            <option value="yes" @selected(old('children') === 'yes')>Oui</option>
                            <option value="no" @selected(old('children') === 'no')>Non</option>
                        </select>
                        @error('children') <small class="form-error">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-field">
                    <label for="autres-animaux">Autres animaux ?</label>
                    <input type="text" id="autres-animaux" name="other_pets" value="{{ old('other_pets') }}"
                        placeholder="Quels animaux avez-vous déjà dans votre foyer ?" />
                    @error('other_pets') <small class="form-error">{{ $message }}</small> @enderror
                </div>

                <span class="form-separator"></span>

                <div class="form-field">
                    <label for="message">Votre message *</label>
                    <textarea id="message" name="message"
                        placeholder="Parlez-nous de votre projet ou posez-nous des questions..."
                        required>{{ old('message') }}</textarea>
                    @error('message') <small class="form-error">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="form-submit">Envoyer mon dossier</button>
            </div>

            <small class="form-disclaimer">
                En soumettant ce formulaire, vous acceptez que les informations saisies soient transmises par e-mail à
                l'éleveuse pour traiter votre demande. Pour en savoir plus sur la gestion de vos données, consultez
                notre <a href="/politique-de-confidentialite">Politique de Confidentialité</a>.
            </small>
        </form>

        <div class="contact-sidebar">
            <div class="contact-info-list">
                <div class="contact-info-item">
                    <i class="bi bi-telephone" aria-hidden="true"></i>
                    <div>
                        <small>Téléphone</small>
                        <p>+33 6 00 00 00 00</p>
                    </div>
                </div>
                <div class="contact-info-item">
                    <i class="bi bi-envelope" aria-hidden="true"></i>
                    <div>
                        <small>Mail</small>
                        <a href="mailto:elevageforetdesreves@gmail.com">elevageforetdesreves@gmail.com</a>
                    </div>
                </div>
                <div class="contact-info-item">
                    <i class="bi bi-geo-alt" aria-hidden="true"></i>
                    <div>
                        <small>Adresse</small>
                        <p>139 VC Cappelle Straete, 59470 Volckerinckhove</p>
                    </div>
                </div>
            </div>

            <iframe class="contact-map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2519.1548420146573!2d2.316606576847842!3d50.84681685874529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dcf76c238101e3%3A0x22f1de0d65168258!2sPension%20Happy%20Holidays%20Et%20Elevage%20de%20la%20For%C3%AAt%20des%20r%C3%AAves!5e0!3m2!1sfr!2sfr!4v1783515272975!5m2!1sfr!2sfr"
                title="Plan d'accès et localisation de l'élevage sur Google Maps" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>

            <div class="contact-hours">
                <h4>Horaires d'ouverture</h4>
                <p>Lundi au Samedi</p>
                <small>Uniquement sur rendez-vous</small>
            </div>
        </div>

    </section>
</x-layout>