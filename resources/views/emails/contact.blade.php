<h2>Nouvelle demande de réservation</h2>

<p><strong>Nom :</strong> {{ $data['name'] }} {{ $data['surname'] }}</p>
<p><strong>Email :</strong> {{ $data['email'] }}</p>
<p><strong>Téléphone :</strong> {{ $data['phone'] }}</p>
<p><strong>Adresse :</strong> {{ $data['address'] }}</p>

<hr>

<h3>Projet Chiot</h3>
<p><strong>Race :</strong> {{ $data['breed_name'] }}</p>
<p><strong>Chiot / Option :</strong> {{ $data['puppy_name'] }}</p>

<hr>

<h3>Mode de vie</h3>
<p><strong>Logement :</strong> {{ $data['housing'] }}</p>
<p><strong>Expérience canine :</strong> {{ $data['canine_experience'] ?? 'Non renseignée' }}</p>
<p><strong>Enfants :</strong> {{ $data['children'] ?? 'Non renseigné' }}</p>
<p><strong>Autres animaux :</strong> {{ $data['other_pets'] ?? 'Aucun' }}</p>

<hr>

<h3>Message :</h3>
<p>{{ nl2br(e($data['message'])) }}</p>