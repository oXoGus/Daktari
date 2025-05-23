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
    <title>Rechercher une entreprise</title>
</head>
<body>
    <div class="mainContainer">
        <div class="navBar" style="margin-top: 10px">
            <a href="nouvelleentreprise.php">nouvelle entrepriseation</a>
            <a href="nouvelAnimal.php">nouvel animal</a>
            <a href="rechercherentreprise.php">rechercher une entrepriseation</a>
            <div class="menuDeroulantContainer">
                <span class="menuDeroulantBtn">ajouter...<svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg></span>
                <div class="menuDeroulant">
                    <a class="menuItem" href="nouvelAnimal.php">un animal</a>
                    <a class="menuItem" href="nouvelleEntreprise.php">une entreprise</a>
                    <a class="menuItem" href="nouveauParticulier.php">un particulier</a>
                    <a class="menuItem" href="nouvelleentreprise.php">une entrepriseation</a>
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
                    <a class="menuItem" href="nouveauParticulier.php">un particulier</a>
                    <a class="menuItem" href="rechercherentreprise.php">une entrepriseation</a>
                    <a class="menuItem" href="rechercherTraitement.php">un traitement</a>
                    <a class="menuItem" href="rechercherManip.php">une manipulation</a>
                    <a class="menuItem" href="rechercherUtilisateur.php">un utilisateur</a>
                </div>
            </div>
            <a href="connexion.php">se déconnecter</a>
        </div>

        <div class="formContainer">
            <h1 class="formTitle">Rechercher une entreprise</h1>
            <form method="GET" action="rechercherEntreprise.php#result">
                <div class="sectionTitleContainer">
                    <div></div>    
                    <h2 class="sectionTitle">Info générales</h2>
                    <div></div>
                </div> 
                <div class="spanContainer">
                <span>
                    Nom : <input type="text" maxlength="50" name="nom" <?php if (isset($_GET['nom'])) {echo "value=\"".$_GET['nom']."\"";}?>>
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
                </div>
                
                <div class="sectionTitleContainer">
                    <div></div>    
                    <h2 class="sectionTitle">Entreprise</h2>
                    <div></div>
                </div>
                
                <span>
                    Adresse site web : <input type="text" maxlength="50" name="adresse_site_web" <?php if (isset($_GET['adresse_site_web'])) {echo "value=\"".$_GET['adresse_site_web']."\"";}?>>
                </span>
                <span>
                    IBAN : <input type="text" maxlength="27" name="IBAN" <?php if (isset($_GET['IBAN'])) {echo "value=\"".$_GET['IBAN']."\"";}?>>
                </span>
                <span>
                    Type d'entreprise :
                    <select name="code">
                        <option value="">Selectionnez un type...</option>
                        <?php
                            foreach ($typeList as $code => $libelle){
                                echo "<option value=\"".$code."\"". (isset($_GET['code']) && $_GET['code'] == $code ? "selected" : "") .">$libelle</option>";
                            }
                        ?>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
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
                    if (!empty($entrepriseTrouveLst)){
                        echo '
                        <div class="sectionTitleContainer">
                                <div></div>    
                                <h2 class="sectionTitle">'.count($entrepriseTrouveLst).' entrepriseations trouvées</h2>
                                <div></div>
                            </div> 
                        <table>
                            <thead>
                                <tr>
                                    <th>nom</th>
                                    <th>téléphone</th>
                                    <th>mail</th>
                                    <th>site</th>
                                    <th>type</th>
                                    <th>voir plus</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach ($entrepriseTrouveLst as $entreprise){
                                echo "
                                <tr>
                                    <td>$entreprise->nom</td>
                                    <td>$entreprise->telephone</td>
                                    <td>$entreprise->mail</td>
                                    <td>$entreprise->adresse_site_web</td>
                                    <td>$entreprise->libelle</td>
                                    <td><a href=\"modifierEntreprise.php?id=$entreprise->id\">voir/modifier</a></td>
                                </tr>";
                            }
                            echo '</tbody>
                        </table>';
                    } else {
                        echo '
                            <div class="sectionTitleContainer">
                                <div></div>    
                                <h2 class="sectionTitle">aucune entreprise trouvée</h2>
                                <div></div>
                            </div> 
                            <div class="noResponseContainer">
                                <p>Réessayer</p>
                                <p>ou</p>
                                <a href="nouvelleEntreprise.php">ajouter une entreprise</a>
                            </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>