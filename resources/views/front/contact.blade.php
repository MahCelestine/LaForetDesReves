<x-layout>
    <section>
        <div>
            <div>
                <h2>Contact</h2>
                <h1>Échangeons ensemble</h1>
                <h3>Remplissez ce formulaire afin que nous puissions mieux comprendre votre projet et vous orienter vers
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
        <form>
            @csrf
            <div>
                <h3>Information</h3>
                <div>
                    <div>
                        <label>Nom *</label>
                        <input type="text" name="name" placeholder="Votre nom" required />
                    </div>
                    <div>
                        <label>Prenom *</label>
                        <input type="text" name="surname" placeholder="Votre prénom" required />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Adresse e-mail *</label>
                        <input type="email" name="email" placeholder="Votre adresse e-mail" required />
                    </div>
                    <div>
                        <label>Téléphone *</label>
                        <input type="text" name="phone" placeholder="Votre numéro de téléphone" required />
                    </div>
                </div>
                <div>
                    <label>Adresse postale *</label>
                    <input type="text" name="address" placeholder="Votre adresse postale" required />
                </div>
            </div>
            <span></span>
            <div>
                <h3>Le chiot</h3>
                <div>
                    <div>
                        <label>Race souhaitée *</label>
                        <select name="breed" required>
                            <option value="" selected>- Sélectionner une race -</option>
                            <option value="samoyede">Samoyède</option>
                            <option value="staffie">Staffordshire Bull Terrier</option>
                            <option value="ber-americain">Berger Américain</option>
                        </select>
                    </div>
                    <div>
                        <label>Quel chiot vous fait craquer ? </label>
                        <select name="puppy">
                            <option value="" selected>- Sélectionner une option -</option>
                            <option value="samoyede">liste d'attente</option>
                            <option value="puppy-id">chiot collier rose</option>
                            <option value="puppy-id">chiot collier rose</option>
                        </select>
                    </div>
                </div>
                <span></span>
                <div>
                    <h3>Votre mode de vie</h3>
                    <div>
                        <div>
                            <label>Situation du logement</label>
                            <select name="houding" required>
                                <option value="" selected>- Sélectionner un type de logement -</option>
                                <option value="house-yard">Maison avec un jardin</option>
                                <option value="house-no-yard">Maison sans jardin</option>
                                <option value="apartment">Appartement</option>
                                <option value="other">Autre</option>
                            </select>
                        </div>
                        <div>
                            <div>
                                <label>Expérience canine </label>
                                <select name="canine_experience">
                                    <option value="" selected>- Sélectionner une option -</option>
                                    <option value="first-dog">Premier chien</option>
                                    <option value="already">J'en ai déjà eu</option>
                                    <option value="advanced">Propriétaire expérimenté</option>
                                    <option value="pro-dog">Professionel canin</option>
                                </select>
                            </div>
                            <div>
                                <label>Enfants ?</label>
                                <select name="children">
                                    <option value="" selected>- Sélectionner une option -</option>
                                    <option value="yes">Oui</option>
                                    <option value="no">Non</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label>Autre animaux ?</label>
                            <input type="text" name="other_pets"
                                placeholder="Quels animaux avez-vous déjà dans votre foyer ?" />
                        </div>
                    </div>
                </div>
                <span></span>
                <div>
                    <label>Votre message *</label>
                    <textarea name="message"
                        placeholder="Parler nous de votre projet  ou posez-nous des questions ... " required></textarea>
                </div>
                <button type="submit">Envoyer mon dossier</button>
        </form>
    </section>
</x-layout>