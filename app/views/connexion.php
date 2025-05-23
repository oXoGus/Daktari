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
    <div class="mainContainer" style="height: 100vh;">
        <div class="loginContainer">
            <h1>(Re)Bonjour !</h1>
            <form action="connexion.php" method="get">
                <p>Utilisateur</p>
                <input type="text" autocomplete="off" name="login" required>
                <p>Mot de passe</p>
                <div class="inputContainer">
                    <input id="mdp" type="password" name="mdp" required>
                    <button type="button" id="btnEye" class="btnEye" onclick="changerVisibiliteMDP('mdp', 'btnEye')" ></button>
                </div>
                <input type="submit" value="Se connecter">
            </form>
            <?php 
                if (isset($err)){
                    echo "<div class=\"errLogin\">";
                        echo "<p>$err</p>";
                    echo "</div>";
                    unset($err);
                } 
            ?>
        </div>    
    </div>
    <script src="script/affichageMDP.js"></script>
</body>
</html>