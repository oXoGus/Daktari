<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consulter/Modifier un Animal</title>
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
                        <a class="menuItem" href="rechercherParticuler.php">un particulier</a>
                        <a class="menuItem" href="rechercherConsult.php">une consultation</a>
                        <a class="menuItem" href="rechercherTraitement.php">un traitement</a>
                        <a class="menuItem" href="rechercherManip.php">une manipulation</a>
                        <a class="menuItem" href="rechercherUtilisateur.php">un utilisateur</a>
                    </div>
                </div>
                <a href="connexion.php">se déconnecter</a>
            </div>
            <div class="formContainer">
                <a class="btnReturn" href="">Revenir à la recherche</a>
                <h1 class="formContainerTitle">
                    Animal n°...
                </h1>
                <form method="GET" action="modifierAnimal.php">
                    <div class="sectionTitleContainer">
                        <div></div>
                        <h2 class="sectionTitle">
                            Responsable
                        </h2>
                        <div></div>
                        <a class="newBtnRight" href="modifierResponsable.php">Consulter/Modifier le Responsable</a>
                    </div>
                    <span>
                        <select name="responsable">
                            <option value="">--Selectionner le Responsable--</option>
                            <?php
                                include($originDir."/app/models/GETResponsable.php");
                                $rowsMA=$resResp->fetchAll(PDO::FETCH_OBJ);
                                $selectedResponsable = $infosMA[0]->id_responsable ?? '';
                                foreach ($rowsMA as $rowMA) {
                                    $selected = ($selectedResponsable === $rowMA->id) ? ' selected' : '';
                                    echo"<option value='".$rowMA->id."'".$selected." >".$rowMA->nom."</option>";
                                }
                            ?>
                        </select>
                        <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                    </span>
                    <div class="sectionTitleContainer">
                        <div></div>
                        <h2 class="sectionTitle">
                            Descriptif
                        </h2>
                        <div></div>
                    </div>
                    <span><input type="hidden" name="id" value="<?= htmlspecialchars($aID ?? '');?>"></span>
                    <span>Nom : <input type="text" name="nom" value="<?= htmlspecialchars($infosMA[0]->nom ?? '');?>"></span>
                    <span>Espece :
                        <input type="text" name="espece" value="<?= htmlspecialchars($infosMA[0]->espece ?? '');?>">
                    </span>
                    <span>
                        Race :
                        <input type="text" name="race" value="<?= htmlspecialchars($infosMA[0]->race ?? '');?>">
                    </span>
                    <span>
                        Genre : 
                        <input type="radio" value="F" name="genre"<?php echo htmlspecialchars($infosMA[0]->genre ?? '')=='F'?'checked':'';?>>
                        F
                        <input type="radio" value="M" name="genre"<?php echo htmlspecialchars($infosMA[0]->genre ?? '')=='M'?'checked':'';?>>
                        M
                    </span>
                    <span> Taille : <input type="text" name="taille" value="<?= htmlspecialchars($infosMA[0]->taille ?? '');?>">
                    </span>
                    <span>Castré : 
                        <input type="radio" value="t" name="castre" <?php echo ($infosMA[0]->castre === true)?'checked':'';?>>
                        Oui
                        <input type="radio" value="f" name="castre" <?php echo ($infosMA[0]->castre === false)?'checked':'';?>>
                        Non
                    </span>
                    <span>
                        Poids : <input type="text" name="poids" value="<?= htmlspecialchars($infosMA[0]->poids ?? '');?>">
                    </span>
                    <div class="sectionTitleContainer">
                        <div></div>
                        <h2 class="sectionTitle">Vaccins</h2>
                        <div></div>
                        <a class="newBtnLeft" href="nouveauVaccins">Ajouter un vaccin pour cet animal</a>
                    </div>
                    <span>
                        <select name="vaccin">
                            <option value="">--Selectionnez un vaccin--</option>
                            <?php
                                foreach ($rowsVaccins as $rowVaccin) {
                                    $selectedV = ($selectedVaccin == $rowVaccin->nom_vaccin) ? ' selected' : '';
                                    echo"<option value='".$rowVaccin->nom_vaccin."'".$selectedV." >".$rowVaccin->nom_vaccin."</option>";
                                }
                            ?>
                            </select>
                        <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                    </span>
                    <div style="margin-bottom: 100px"></div>
                    <a class="btnDelete" href="DELETEAnimal.php?id=<?= $_GET['id']?>">Supprimer</a>
                    <div class="btnSubResetContainer">
                        <input type="reset" value="Annuler les modifications">
                        <input type="submit" value="Enregistrer les modifications" id="save" name="save">
                    </div>
                    <div style="margin-bottom: 100px"></div>
                </form>
            </div>
        </div>
    </body>
</html>