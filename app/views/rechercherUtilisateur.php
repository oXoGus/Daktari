<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rechercher un utilisateur</title>
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
                <h1 class="formTitle">
                    Rechercher un utilisateur
                </h1>
                <form type="GET" action="rechercherUtilisateur.php#result">
                    <div class="sectionTitleContainer">
                        <div></div>
                        <h2 class="sectionTitle">Infos Générales</h2>
                        <div></div>
                    </div>
                    <span>
                        Nom d'utilisateur : <input type="text" maxlength="50" name="username" value="<?php if (isset($_GET['username'])) { echo $_GET['username'];}?>">
                    </span>
                    <div></div>
                    <div class="btnSubResetContainer">
                        <input type="reset" value="Réinitialiser">
                        <input type="submit" value="Sauvegarder">
                    </div>
                    <div style="margin-bottom: 30px;"></div>
                </form>
            </div>

            <div id="result" class="responseContainer">
                <div class="tableContainer">
                    <?php
                        if ($resRU->rowCount() > 0){
                            echo '
                            <div class="sectionTitleContainer">
                                    <div></div>    
                                    <h2 class="sectionTitle">'.$resRU->rowCount().' utilisateurs trouvés</h2>
                                    <div></div>
                                </div> 
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col">Nom d\'utilisateur</th>
                                        <th scope="col">Voir plus</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                $lignesRU=$resRU->fetchAll(PDO::FETCH_OBJ);
                                foreach ($lignesRU as $ligneRU) {
                                    echo"<tr><td>".$ligneRU->username ."</td><td><a href='modifierUtilisateur.php?id=".$ligneRU->id."'>Voir/Modifier</a></td></tr>";
                                }
                                echo '</tbody>
                            </table>
                        
                            ';
                        } else {
                            echo '
                                <div class="sectionTitleContainer">
                                    <div></div>    
                                    <h2 class="sectionTitle">aucun utilisateur trouvée</h2>
                                    <div></div>
                                </div> 
                                <div class="noResponseContainer">
                                    <p>Réessayer</p>
                                    <p>ou</p>
                                    <a href="nouvelUtilisateur.php">ajouter un utilisateur</a>
                                </div>
                            ';
                        }
                    ?>
                </div>
            </div>
        </div>
        <script src="script/fermerErr.js"></script>
    </body>
</html>