<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle demande de réservation</title>
</head>
<body style="margin:0; padding:0; background-color:#F8F6FF; font-family: Arial, Helvetica, sans-serif;">

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#F8F6FF; padding: 2rem 0;">
        <tr>
            <td align="center">

                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; background-color:#ffffff; border-radius: 16px; overflow:hidden; box-shadow: 3px 4px 6px 1px rgba(0,0,0,0.06);">

                    <!-- En-tête -->
                    <tr>
                        <td style="background-color:#2D2066; padding: 1.75rem 2rem; text-align:center;">
                            <p style="margin:0; color:#a99df0; font-size:12px; letter-spacing:0.08em; text-transform:uppercase;">Back-office</p>
                            <h1 style="margin:0.3rem 0 0; color:#ffffff; font-size:20px; font-weight:700;">Nouvelle demande de réservation</h1>
                        </td>
                    </tr>

                    <!-- Contenu -->
                    <tr>
                        <td style="padding: 2rem;">

                            <!-- Bloc Identité -->
                            <h2 style="margin:0 0 0.9rem; color:#5B4FCF; font-size:14px; text-transform:uppercase; letter-spacing:0.06em;">Identité</h2>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:1.5rem;">
                                <tr>
                                    <td style="padding:6px 0; color:#6b6b6b; font-size:14px; width:150px;">Nom</td>
                                    <td style="padding:6px 0; color:#2D2066; font-size:14px; font-weight:600;">{{ $data['name'] }} {{ $data['surname'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:6px 0; color:#6b6b6b; font-size:14px;">Email</td>
                                    <td style="padding:6px 0; font-size:14px;"><a href="mailto:{{ $data['email'] }}" style="color:#5B4FCF; text-decoration:none; font-weight:600;">{{ $data['email'] }}</a></td>
                                </tr>
                                <tr>
                                    <td style="padding:6px 0; color:#6b6b6b; font-size:14px;">Téléphone</td>
                                    <td style="padding:6px 0; color:#2D2066; font-size:14px; font-weight:600;">{{ $data['phone'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:6px 0; color:#6b6b6b; font-size:14px; vertical-align:top;">Adresse</td>
                                    <td style="padding:6px 0; color:#2D2066; font-size:14px; font-weight:600;">{{ $data['address'] }}</td>
                                </tr>
                            </table>

                            <hr style="border:none; border-top:1px solid #e5e5e5; margin: 1.5rem 0;">

                            <!-- Bloc Projet Chiot -->
                            <h2 style="margin:0 0 0.9rem; color:#5B4FCF; font-size:14px; text-transform:uppercase; letter-spacing:0.06em;">Projet chiot</h2>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:1.5rem;">
                                <tr>
                                    <td style="padding:6px 0; color:#6b6b6b; font-size:14px; width:150px;">Race</td>
                                    <td style="padding:6px 0; color:#2D2066; font-size:14px; font-weight:600;">{{ $data['breed_name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:6px 0; color:#6b6b6b; font-size:14px;">Chiot / Option</td>
                                    <td style="padding:6px 0; color:#2D2066; font-size:14px; font-weight:600;">{{ $data['puppy_name'] }}</td>
                                </tr>
                            </table>

                            <hr style="border:none; border-top:1px solid #e5e5e5; margin: 1.5rem 0;">

                            <!-- Bloc Mode de vie -->
                            <h2 style="margin:0 0 0.9rem; color:#5B4FCF; font-size:14px; text-transform:uppercase; letter-spacing:0.06em;">Mode de vie</h2>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:1.5rem;">
                                <tr>
                                    <td style="padding:6px 0; color:#6b6b6b; font-size:14px; width:150px;">Logement</td>
                                    <td style="padding:6px 0; color:#2D2066; font-size:14px; font-weight:600;">{{ $data['housing'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:6px 0; color:#6b6b6b; font-size:14px;">Expérience canine</td>
                                    <td style="padding:6px 0; color:#2D2066; font-size:14px; font-weight:600;">{{ $data['canine_experience'] ?? 'Non renseignée' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:6px 0; color:#6b6b6b; font-size:14px;">Enfants</td>
                                    <td style="padding:6px 0; color:#2D2066; font-size:14px; font-weight:600;">{{ $data['children'] ?? 'Non renseigné' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:6px 0; color:#6b6b6b; font-size:14px;">Autres animaux</td>
                                    <td style="padding:6px 0; color:#2D2066; font-size:14px; font-weight:600;">{{ $data['other_pets'] ?? 'Aucun' }}</td>
                                </tr>
                            </table>

                            <hr style="border:none; border-top:1px solid #e5e5e5; margin: 1.5rem 0;">

                            <!-- Bloc Message -->
                            <h2 style="margin:0 0 0.9rem; color:#5B4FCF; font-size:14px; text-transform:uppercase; letter-spacing:0.06em;">Message</h2>
                            <div style="background-color:#F8F6FF; border-radius:10px; padding:1rem 1.25rem; color:#2D2066; font-size:14px; line-height:1.6;">
                                {{ nl2br(e($data['message'])) }}
                            </div>

                        </td>
                    </tr>

                    <!-- Pied -->
                    <tr>
                        <td style="background-color:#F8F6FF; padding: 1.25rem 2rem; text-align:center;">
                            <p style="margin:0; color:#8675D2; font-size:12px;">Élevage de la Forêt des Rêves — Formulaire de contact du site</p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>