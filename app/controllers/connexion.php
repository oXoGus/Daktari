<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>Daktari</title>
</head>
<body>
    <div class="login_Container">
        <h1>
            (Re)Bonjour !
        </h1>
        <form action="connexion.php" method="get">
            <p>Utilisateur</p>
            <input type="text" name="login" required>
            <p>Mot de passe</p>
            <input type="text" name="mdp" required>
            <input id="submitBtn" type="submit" value="Se connecter">
        </form>
    </div>
</body>
</html>