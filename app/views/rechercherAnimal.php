<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rechercher un animal</title>
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
                        <a class="menuItem" href="rechercherParticuler.php">un particulier</a>
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
                <h1 class="formTitle">Rechercher un animal</h1>
                <form method="GET" action="rechercherAnimal.php#result">
                    <div class="sectionTitleContainer">
                        <div></div>
                        <h2 class="sectionTitle">Responsable</h2>
                        <div></div>
                    </div>
                    <span>
                        <select name="resp">
                            <option value="">Selectionnez un responsable...</option>
                            <?php
                                include($originDir."/app/models/GETResponsable.php");
                                $rows=$resResp->fetchAll(PDO::FETCH_OBJ);
                                var_dump($rows);
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
                        <div></div>
                    </div>
                    <span>Nom : <input type="text" maxlength="50" name="nom">
                    </span>
                    <span>Espece : <input type="text" maxlength="50" name="espece">
                    </span>
                    <span>
                        Race : <input type="text" maxlength="50" name="race">
                    </span>
                    <span>
                        Genre : 
                        <input type="radio" value="F" name="genre">
                        F
                        <input type="radio" value="M" name="genre">
                        M
                    </span>
                    <span> Taille : <input type="number" step="any" name="taille">
                    </span>
                    <span>Castré : 
                        <input type="radio" value="t" name="castre">
                        Oui
                        <input type="radio" value="f" name="castre">
                        Non
                    </span>
                    <span>
                        Poids : <input type="number" step="any" min="0" name="poids">
                    </span>
                    <div class="sectionTitleContainer">
                        <div></div>
                        <h2 class="sectionTitle">Vaccins</h2>
                        <div></div>
                    </div>
                    <span>
                        <select name="vaccins">
                            <option value="">Selectionnez un vaccin...</option>
                        </select>
                        <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg></span>
                    </span>
                    <div class="btnSubResetContainer">
                        <input type="reset" value="Réinitialiser">
                        <input type="submit" value="Sauvegarder">
                    </div>
                </form>
            </div>
                                
            <div id="result" class="responseContainer">
                <div class="tableContainer">
                    <?php
                        if ($res->rowCount() > 0){
                            echo '
                            <div class="sectionTitleContainer">
                                    <div></div>    
                                    <h2 class="sectionTitle">'.$res->rowCount().' animaux trouvée</h2>
                                    <div></div>
                                </div> 
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col">Responsable</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Espece</th>
                                        <th scope="col">Race</th>
                                        <th scope="col">Genre</th>
                                        <th scope="col">Taille</th>
                                        <th scope="col">Voir plus</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                $lignes=$res->fetchAll(PDO::FETCH_OBJ);
                                foreach ($lignes as $ligne) {
                                    echo"<tr><td>".$ligne->responsable ."</td><td>".$ligne->nom ."</td><td>".$ligne->espece ."</td><td>".$ligne->race ."</td><td>".$ligne->genre."</td><td>".$ligne->taille."</td><td><a href='modifierAnimal.php?id=".$ligne->id."'>Voir/Modifier</a></td></tr>";
                                }
                                echo '</tbody>
                            </table>
                        
                            ';
                        } else {
                            echo '
                                <div class="sectionTitleContainer">
                                    <div></div>    
                                    <h2 class="sectionTitle">aucun animal trouvée</h2>
                                    <div></div>
                                </div> 
                                <div class="noResponseContainer">
                                    <p>Réessayer</p>
                                    <p>ou</p>
                                    <a href="nouvelAnimal.php">ajouter un animal</a>
                                </div>
                            ';
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>