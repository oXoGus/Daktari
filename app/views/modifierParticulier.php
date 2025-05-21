<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <title>particulier n°<?php if (isset($_GET['id'])) echo $_GET['id'];?></title>
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
                    <a class="menuItem" href="nouvelleparticulier.php">une particulier</a>
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
                    <a class="menuItem" href="rechercherparticulier.php">une particulier</a>
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
            <a class="backLink" href="rechercherParticulier.php<?php if (isset($_SESSION['rechercheParam'])) { echo "?".$_SESSION['rechercheParam'];} ?>#result" >
                <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>    
                Revenir à la recherche
            </a>
            <h1 class="formTitle">particulier n°<?php if (isset($_GET['id'])) echo $_GET['id'];?></h1>
            <form method="GET" action="modifierParticulier.php">
                <div class="sectionTitleContainer">
                    <div></div>    
                    <h2 class="sectionTitle">Info générales</h2>
                    <div></div>
                </div> 
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                <span>
                    Nom : <input type="text" maxlength="50" name="nom" <?php if (!isset($err)) {echo "value=\"".$particulierInfo->nom."\"";}?>>
                </span>
                <span>
                    Prénom : <input type="text" maxlength="50" name="prenom" <?php if (!isset($err)) {echo "value=\"".$particulierInfo->prenom."\"";}?>>
                </span>
                <span>
                    Date de naissance : <input type="date" name="date_de_naissance" <?php if (!isset($err)) {echo "value=\"".$particulierInfo->date_de_naissance."\"";}?>>
                </span>
                <span>
                    Adresse : <input type="text" maxlength="50" name="adresse" <?php if (!isset($err)) {echo "value=\"".$particulierInfo->adresse."\"";}?>>
                </span>
                <span>
                    Téléphone : <input type="text" maxlength="15" name="telephone" <?php if (!isset($err)) {echo "value=\"".$particulierInfo->telephone."\"";}?>>
                </span>
                <span>
                    Mail : <input type="text" maxlength="50" name="mail" <?php if (!isset($err)) {echo "value=\"".$particulierInfo->mail."\"";}?>>
                </span>

                <div class="btnSubResetContainer">
                    <input type="reset" value="reinitialiser">
                    <input type="submit" value="rechercher">
                </div>

                <div style="display: none;" class="doubleVerifContainer" id="doubleVerifContainer">
                    <div>
                        <h1>ATTENTION !</h1>
                        <p>êtes vous bien sûr de vouloir supprimer ce particulier ?</p>
                        <div>
                            <a href="deleteParticulier.php?id=<?php echo $_GET['id'] ?>">Oui</a>
                            <button type="button" onClick="fermerErr('doubleVerifContainer')">Non</button>
                        </div>
                        <button type="button" class="closeBtn" onClick="fermerErr('doubleVerifContainer')"></button>';
                    </div>
                </div>
                <button type="button" class="deleteBtn" onClick="fermerErr('doubleVerifContainer')">supprimer</button>
                
                <div style="margin-bottom: 50px;"></div>
            </form>
        </div>
        <script src="script/fermerErr.js"></script>
    </div>
</body>
</html>