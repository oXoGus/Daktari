<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajouter un animal</title>
        <link rel="stylesheet" href="style/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    </head>
    <body>
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
        <div class="formContainer">
        <h1 class="formTitle">Ajouter un animal</h1>
        <form type="GET" action="nouvelAnimal.php">
            <div class="sectionTitleContainer">
                <div></div>
                <h2 class="sectionTitle">Responsable</h2>
                <div></div>
                <a class="newBtnRight" href="nouveauParticulier.php">Nouveau particulier</a>
                <a class="newBtnLeft" href="nouvelleEntreprise.php">Nouveau professionnel</a>
            </div>
            <span>
                <select name="resp" required>
                    <option value="">Choisissez un Responsable...</option>
                    <?php
                    include($originDir."/app/models/GETResponsable.php");
                    $rows=$resResp->fetchAll(PDO::FETCH_OBJ);
                    foreach ($rows as $row) {
                        echo"<option value='".$row->id."'>".$row->nom."</option>";
                    }
                    ?>
                </select>
                <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
            </span>
            <div class="sectionTitleContainer">
                <div></div>
            <h2 class="sectionTitle">Descriptif</h2>
            <div>
            </div>
            </div>
            <div class="spanContainer">
                    <span>Nom : <input type="text" name="nom" maxlength="50" required></span>
            <span>Espece :
                <input type="text" name="espece" maxlength="50" required>
            </span>
            <span>
                Race :
                <input type="text" name="race" maxlength="50" required>
            </span>
            </div>
            
            <span>
                Genre : 
                <input type="radio" value="F" name="genre" required>
                F
                <input type="radio" value="M" name="genre">
                M
            </span>
            <span> Taille : <input type="number" min="0" name="taille">
            </span>
            <span>Castré : 
                <input type="radio" value="t" name="castre" required>
                Oui
                <input type="radio" value="f" name="castre" required>
                Non
            </span>
            <span>
                Poids : <input type="number" min="0" name="poids" >
            </span>
            <div class="sectionTitleContainer">
                <div></div>
                <h2 class="sectionTitle">Vaccins</h2>
                <div></div>
                <a class="newBtnRight" href="nouveauTraitement.php">nouveau vaccin</a>
                <button type="submit"class="newBtnLeft">ajouter un vaccin pour cet animal </button>
            </div>
            <span>
                <select name="vaccin">
                    <option value="">Choisissez un vaccin</option>
                    <?php
                    include($originDir."/app/models/GETVaccins.php");
                    $vaccins=$resVaccins->fetchAll(PDO::FETCH_OBJ);
                    foreach ($vaccins as $vaccin) {
                        echo"<option value='".$vaccin->nom_vaccin."'>".$vaccin->nom_vaccin."</option>";
                    }
                    ?>
                </select>
                <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
            </span>
            <span>
                Date du Vaccin : <input type="date" name="dateVaccin">
            </span>
            <div class="btnSubResetContainer">
                <input type="reset" value="Annuler les modifications">
                <input type="submit" value="Sauvegarder" id="save">
            </div>
            <div style="margin-bottom: 100px"></div>
        </form>
        </div>
        </div>
    </body>
</html>