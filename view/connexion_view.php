<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <p>Formulaire de connexion</p>
    <form action="/connexion/verif_connexion" method="post">
        <input type="text" name="client_mail" placeholder="Email">
        <input type="password" name="mot_de_passe" placeholder="Mot de passe">
        <input type="submit" value="Connexion">
    </form>
</body>
</html>