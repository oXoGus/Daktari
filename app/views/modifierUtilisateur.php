<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
    <div class="mainContainer">
        <div class="navBar" style="height:70px; margin-top: 10px">
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
        <div class="formContainer">
            <h1 class="formTitle">Modifier Utilisateur</h1>
            <div class="sectionTitleContainer">
            <div></div>
        <h2 class="sectionTitle">Infos générales</h2>
        <div></div>
        </div>
        <form method="get" action="modifierUtilisateur.php">
            <div class="user">
                <?php
                $uID = $_GET['id'];
                include($originDir."/app/models/GETUtilisateur.php");
                $usernameMU = $resMU->fetchAll(PDO::FETCH_OBJ);
                ?>
                <span><input type="hidden" name="id" value="<?= htmlspecialchars($_GET["id"]) ?>"></span>
                <span>Nom d'utilisateur : <input type="text" name="usernamemodif" value="<?= htmlspecialchars($usernameMU[0]->username ?? '');?>"></span><br>
                <div style="margin-bottom: 100px"></div>
                <a class="btnDelete" href="DELETEUtilisateur.php?id=<?= $_GET['id']?>" >Supprimer</a>
                <div class="btnSubResetContainer">
                    <input type="reset" value="Réinitialiser">
                    <input type="submit" value="Sauvegarder" id="save">
                </div>
                <div style="margin-bottom: 100px"></div> 
            </div>
        </form>
    </div>
    </div>
    </body>
</html>