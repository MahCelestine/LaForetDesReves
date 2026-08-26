<div>
    <x-layout-back />
    <div>
        <h1>Ajouter un chien</h1>
        <form action="{{ route('back.back-chien-store') }}" method="POST">
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
                        <input type="text" name="identification_number" required/>
                    </div>
                    <div>
                        <label>Cotation</label>
                        <input type="text" name="cotation" />
                    </div>
                </div>
                <div>
                    <label>Race</label>
                    <select name="breed" required>
                        <option value="">- Sélectionnez -</option>
                        <option value="samoyède">Samoyède</option>
                        <option value="staffordshire bull terrier">Staffordshire Bull Terrier</option>
                        <option value="berger américain">Berger Américain</option>
                    </select>
                </div>
                <div>
                    <label>Description de l'animal</label>
                    <textarea placeholder="Parler de  l’animal, de son comportement t out ce qui pourrait être intéressant de savoir" name="description" ></textarea>
                </div>
                <span></span>
            </div>
            <!-- <div>
                <h2>Photos</h2>
                <div>
                    <label>Pour le thumbail</label>
                    <form>
                        <input type="file" />
                        <button>Chercher dans les fichiers</button>
                    </form>
                </div>
                    <label>Pour le carrousel (plusieurs fichiers possible)</label>
                    <div>
                        <input type="file"/>
                        <button>Chercher dans les fichiers</button>
                    </div>
                </div>
                <span></span>
            </div> -->
            <button type="submit" >Créer un nouveau reproducteur</button>
        </form>
    </div>
    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
