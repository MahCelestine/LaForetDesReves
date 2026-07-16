<div>
    <x-layout-back />
    <div>
        <h1>Ajouter une portée</h1>
        <form>
            <div>
                <h2>Informations</h2>
                <div>
                    <div>
                        <label>Date de mise à bas</label>
                        <input type="date" />
                    </div>
                    <div>
                        <label>Race</label>
                        <select>
                            <option value="">Sélectionner la race</option>
                        </select>
                    </div>
                </div>
                <span></span>
                <div>
                    <h2>Attention avant de choisir les parents sélectionner la race pour que la liste des reproducteurs corresponde</h2>
                    <div>
                        <label>Père</label>
                        <select>
                            <option value="">Sélectionner le père</option>
                        </select>
                    </div>
                    <div>
                        <label>Mère</label>
                        <select>
                            <option value="">Sélectionner la mère</option>
                        </select>
                    </div>
                </div>
                <div>
                        <label>Status</label>
                        <select>
                            <option value="">Sélectionner le status</option>
                            <option value="en cours">Actif</option>
                            <option value="futur">Futur</option>
                            <option value="passée">Passée</option>
                        </select>
                    </div>
                <span></span>
                <button>Créer une nouvelle porté</button>
        </form>
    </div>
</div>