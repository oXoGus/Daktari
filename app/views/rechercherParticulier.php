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
    <title>Rechercher un particulier</title>
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
            <h1 class="formTitle">Rechercher un particulier</h1>
            <form method="GET" action="rechercherParticulier.php#result">
                <div class="sectionTitleContainer">
                    <div></div>    
                    <h2 class="sectionTitle">Info générales</h2>
                    <div></div>
                </div> 
                <span>
                    Nom : <input type="text" maxlength="50" name="nom" <?php if (isset($_GET['nom'])) {echo "value=\"".$_GET['nom']."\"";}?>>
                </span>
                <span>
                    Prénom : <input type="text" maxlength="50" name="prenom" <?php if (isset($_GET['prenom'])) {echo "value=\"".$_GET['prenom']."\"";}?>>
                </span>
                <span>
                    Date de naissance : <input type="date" name="date_de_naissance" <?php if (isset($_GET['date_de_naissance'])) {echo "value=\"".$_GET['date_de_naissance']."\"";}?>>
                </span>
                <span>
                    Adresse : <input type="text" maxlength="50" name="adresse" <?php if (isset($_GET['adresse'])) {echo "value=\"".$_GET['adresse']."\"";}?>>
                </span>
                <span>
                    Téléphone : <input type="text" maxlength="15" name="telephone" <?php if (isset($_GET['telephone'])) {echo "value=\"".$_GET['telephone']."\"";}?>>
                </span>
                <span>
                    Mail : <input type="text" maxlength="50" name="mail" <?php if (isset($_GET['mail'])) {echo "value=\"".$_GET['mail']."\"";}?>>
                </span>

                <div class="btnSubResetContainer">
                    <input type="reset" value="reinitialiser">
                    <input type="submit" value="rechercher">
                </div>

                <div style="margin-bottom: 50px;"></div>
            </form>
        </div>

        <div id="result" class="responseContainer">
            <div class="tableContainer">
                <?php
                    if (!empty($particulierTrouveLst)){
                        echo '
                        <div class="sectionTitleContainer">
                                <div></div>    
                                <h2 class="sectionTitle">'.count($particulierTrouveLst).' particuliers trouvés</h2>
                                <div></div>
                            </div> 
                        <table>
                            <thead>
                                <tr>
                                    <th>nom</th>
                                    <th>prénom</th>
                                    <th style="width: min-content">date de naissance</th>
                                    <th>adresse</th>
                                    <th>téléphone</th>
                                    <th>mail</th>
                                    <th>voir plus</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach ($particulierTrouveLst as $particulier){
                                echo "
                                <tr>
                                    <td>$particulier->nom</td>
                                    <td>$particulier->prenom</td>
                                    <td>$particulier->date_de_naissance</td>
                                    <td>$particulier->adresse
                                    <td>$particulier->telephone</td>
                                    <td>$particulier->mail</td>
                                    <td><a href=\"modifierParticulier.php?id=$particulier->id\">voir/modifier</a></td>
                                </tr>";
                            }
                            echo '</tbody>
                        </table>';
                    } else {
                        echo '
                            <div class="sectionTitleContainer">
                                <div></div>    
                                <h2 class="sectionTitle">aucun particulier trouvé</h2>
                                <div></div>
                            </div> 
                            <div class="noResponseContainer">
                                <p>Réessayer</p>
                                <p>ou</p>
                                <a href="nouveauParticulier.php">ajouter un particulier</a>
                            </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>