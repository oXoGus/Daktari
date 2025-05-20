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
        <div class="navBar" style="height:70px; margin-top: 10px">
            <a href="nouvelleConsult.php">nouvelle consultation</a>
            <a href="nouvelAnimal.php">nouvel animal</a>
            <a href="rechercherConsult.php">rechercher une consultation</a>
            <div class="menuDeroulantContainer">
                <span class="menuDeroulantBtn">ajouter...<svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg></span>
                <div class="menuDeroulant">
                    <a class="menuItem" href="nouvelAnimal.php">un animal</a>
                    <a class="menuItem" href="nouvelleEntreprise.php">une entreprise</a>
                    <a class="menuItem" href="nouveauParticuler.php">un particulier</a>
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
                <a class="newBtnRight" href="nouveauResponsable.php">Nouveau Responsable</a>
            </div>
            <span>
                <select name="resp">
                    <option value="">--Choisissez un Responsable--</option>
                </select>
                <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
            </span>
            <div class="sectionTitleContainer">
                <div></div>
            <h2 class="sectionTitle">Descriptif</h2>
            <div>
            </div>
            </div>
            <span>Nom : <input type="text" name="nom"></span>
            <span>Espece :
                <select name="'espece">
                    <option value="">--Selectionnez une espèce--</option>
                </select>
                <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
            </span>
            <span>
                Race :
                <select name="race">
                    <option value="">--Selectionnez une race--</option>
                    <option value="a">a</option>
                </select>
                <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
            </span>
            <span>
                Genre : 
                <input type="radio" value="F" name="genre">
                F
                <input type="radio" value="M" name="genre">
                M
            </span>
            <span> Taille : <input type="text" name="taille">
            </span>
            <span>Castré : 
                <input type="radio" value="O" name="genre">
                Oui
                <input type="radio" value="N" name="genre">
                Non
            </span>
            <span>
                Poids : <input type="text" name="poids">
            </span>
            <div class="sectionTitleContainer">
                <div></div>
                <h2 class="sectionTitle">Vaccins</h2>
                <div></div>
                <a class="newBtnRight" href="nouveauTraitement.php">nouveau traitement</a>
                <button type="submit"class="newBtnLeft">ajouter un traitement pour cette consultation </button>
            </div>
            <span>
                <select name="Vaccin">
                    <option value="">--Nom du Vaccin--</option>
                </select>
                <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
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