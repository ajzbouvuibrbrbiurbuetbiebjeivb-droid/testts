<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <p>Formulaire d'inscription</p>
    <form action="/connexion/validation_inscription" method="post">
        <input type="text" name="client_nom" placeholder="Nom">
        <input type="text" name="client_prenom" placeholder="Prénom">
        <input type="text" name="client_mail" placeholder="Email">
        <input type="password" name="mot_de_passe" placeholder="Mot de passe">
        <input type="password" name="mot_de_passe2" placeholder="Confirmer mot de passe">
        <input type="submit" value="Inscription">
    </form>
</body>
</html>