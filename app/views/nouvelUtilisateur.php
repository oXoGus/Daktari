<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style/style.css">
    </head>
    <div class="mainContainer">
        <div class="navBar" style="margin-top: 10px">
            <a href="nouvelleConsult.php">nouvelle consultation</a>
            <a href="nouvelAnimal.php">nouvel animal</a>
            <a href="rechercherConsult.php">rechercher une consultation</a>
            <div class="menuDeroulantContainer">
                <span class="menuDeroulantBtn">ajouter...<svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg></span>
                <div class="menuDeroulant">
                    <a class="menuItem" href="nouvelAnimal.php">un animal</a>
                    <a class="menuItem" href="nouvelleEntreprise.php">une entreprise</a>
                    <a class="menuItem" href="nouveauParticulier.php">un particulier</a>
                    <a class="menuItem" href="nouvelleConsult.php">une consultation</a>
                    <a class="menuItem" href="nouveauTraitement.php">un traitement</a>
                    <a class="menuItem" href="nouvelleManip.php">une manipulation</a>
                    <a class="menuItem" href="nouvelUtilisateur.php">un utilisateur</a>
                </div>
            </div>
            <div class="menuDeroulantContainer">
                <span class="menuDeroulantBtn">rechercher...<svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg></span>
                <div class="menuDeroulant">
                    <a class="menuItem" href="rechercherAnimal.php">un animal</a>
                    <a class="menuItem" href="rechercherEntreprise.php">une entreprise</a>
                    <a class="menuItem" href="rechercherParticulier.php">un particulier</a>
                    <a class="menuItem" href="rechercherConsult.php">une consultation</a>
                    <a class="menuItem" href="rechercherTraitement.php">un traitement</a>
                    <a class="menuItem" href="rechercherManip.php">une manipulation</a>
                    <a class="menuItem" href="rechercherUtilisateur.php">un utilisateur</a>
                </div>
            </div>
            <a href="connexion.php">se déconnecter</a>
        </div>

        <?php 
            if (isset($err)){
                echo "<div id=\"errContainer\" class=\"errContainer\">";
                    echo "<div>";
                        echo "<h1>erreur :</h1>";
                        echo "<p>$err</p>";
                        echo '<button type="button" onClick="fermerErr()"></button>';
                    echo "</div>";
                echo "</div>";
                unset($err);
            } if (isset($msg)){
                echo "<div id=\"errContainer\" class=\"msgContainer\">";
                    echo "<div>";
                        echo "<p>$msg</p>";                        
                        echo '<button type="button" onClick="fermerErr()"></button>';
                    echo "</div>";
                echo "</div>";
                unset($msg);
            }
        ?>

        <div class="formContainer">
            <h1 class="formTitle">Nouvel Utilisateur</h1>
            <div class="sectionTitleContainer">
            <div></div>
        <h2 class="sectionTitle">Infos générales</h2>
        <div></div>
        </div>
        <form type="get" action="nouvelUtilisateur.php">
            <div class="user">
                <div class="spanContainer">
                    <span>Nom d'utilisateur : <input type="text" name="username" maxlength="50" required></span><br>
                    <span>Mot de passe : <input type="text" name="mdp" maxlength="50" required></span>
                </div>
                <div class="btnSubResetContainer">
                    <input type="reset" value="Réinitialiser">
                    <input type="submit" value="Sauvegarder" id="save">
                </div>
                <div style="margin-bottom: 50px"></div> 
            </div>
        </form>
    </div>
    </div>
    <script src="script/fermerErr.js"></script>
    </body>
</html>