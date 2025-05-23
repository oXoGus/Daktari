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
    <title>Ajouter une consultation</title>
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
            <a class="backLink" href="<?php if (isset($_SESSION['rechercheParam'])) { echo $_SESSION['rechercheParam'];} ?>">
            <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>    
                Revenir à la recherche
            </a>
            <h1 class="formTitle">Consultation n°<?php echo $_GET['id']?></h1>
            <form method="GET" action="modifierConsult.php">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                <div class="sectionTitleContainer">
                    <div></div>    
                    <h2 class="sectionTitle">Animal</h2>
                    <div></div>
                    <a class="newBtnRight" href="modifierAnimal.php?id=<?php echo $consultInfo->animal_id ?>">voir l'animal</a>
                </div> 
                <span>
                    <select name="animal">
                        <option value="">Selectionnez un animal...</option>
                        <?php
                            foreach ($animaux as $animal){
                                echo "<option value=\"$animal->id\" ".(!isset($err) && $consultInfo->animal_id == $animal->id ? "selected" : "").">$animal->nom, $animal->race</option>";
                            }
                        ?>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>
                <div class="sectionTitleContainer">
                    <div></div>    
                    <h2 class="sectionTitle">Desciptif</h2>
                    <div></div>
                </div>
                <span>
                    le <input type="date" name="date_consult" <?php if(!isset($err)) {echo "value=\"".$consultInfo->date_consult."\"";}?> required> à <input type="time" name="time_consult" <?php if(!isset($err)) {echo "value=\"".$consultInfo->time_consult."\"";}?> required>
                </span>
                <span>
                    Type de consultation :
                    <select name="type_consultation">
                        <option value="">Selectionnez un type...</option>
                        <?php
                            foreach ($types_consult as $type){
                                echo "<option value=\"$type->type_soin\" ". (!isset($err) && $consultInfo->type_soin == $type->type_soin ? "selected" : "") .">$type->type_soin</option>";
                            }
                        ?>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>
                <span>Anamnèse :</span>
                <textarea name="anamnese" maxlength="100"><?php if (!isset($err)) { echo $consultInfo->anamnese; }  ?></textarea>
                <span>Diagnostique :</span>
                <textarea name="diagnostique" maxlength="100"><?php if (!isset($err)) { echo $consultInfo->diagnostique; }  ?></textarea>
                <span>Résumé :</span>
                <textarea name="resume" maxlength="255"><?php if (!isset($err)) { echo $consultInfo->resume; }  ?></textarea>
                <span>
                    durée de la consultation<input type="time" name="duree" <?php if(!isset($err)) {echo "value=\"".$consultInfo->duree."\"";}?>>
                </span>
                <span>
                    Mode de localisation :
                    <select name="type_localisation" required>
                        <option value="">Selectionnez un type...</option>
                        <option value="cabinet" <?php if (!isset($err) && $consultInfo->type_localisation == "cabinet") {echo "selected";}?>>cabinet</option>
                        <option value="hors cabinet" <?php if (!isset($err) && $consultInfo->type_localisation == "hors cabinet") {echo "selected";}?>>hors cabinet</option>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>
                <span>
                    Tarif : <input type="number" min="0" name="tarif" <?php if (!isset($err)) {echo "value=\"".$consultInfo->tarif_standard."\"";}?> required>
                </span>
                <span>
                    Raison du tarif exeptionnel : 
                </span>
                <input type="text" maxlength="100" name="raison_tarif_exceptionnel"<?php if (!isset($err)) {echo "value=\"".$consultInfo->raison_tarif_exceptionnel."\"";}?>>
                <span>
                    Consultation antérieur :
                    <select name="prev_consult">
                        <option value="">Selectionnez un consultation...</option>
                        <?php
                            foreach ($consultations as $consult){
                                echo "<option value=\"$consult->consultation_id\" ". (!isset($err) && $consultInfo->prev_consult == $consult->consultation_id ? "selected" : "") .">$consult->nom, $consult->race le $consult->date_consult</option>";
                            }
                        ?>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>
                <div class="sectionTitleContainer">
                    <div></div>    
                    <h2 class="sectionTitle">Manipulations</h2>
                    <div></div>
                    <a class="newBtnRight" href="nouvelleManip.php">créer une manipulation</a>
                    <button type="submit"class="newBtnLeft">ajouter une manipulation pour cette consultation </button>
                </div> 
                <span>
                    <select name="manip">
                        <option value="">Selectionnez une manipulation...</option>
                        <?php
                            foreach ($manipLst as $manip){
                                echo "<option value=\"$manip->code\" ". (!isset($err) && $consultInfo->code == $manip->code ? "selected" : "") .">$manip->code</option>";
                            }
                        ?>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>

                <div class="sectionTitleContainer">
                    <div></div>
                    <h2 class="sectionTitle">Traitement</h2>
                    <div></div>
                    <a class="newBtnRight" href="nouveauTraitement.php">nouveau traitement</a>
                    <button type="submit"class="newBtnLeft">ajouter un traitement pour cette consultation</button>
                </div> 
                <span>
                    <select name="traitement">
                        <option value="">Selectionnez un traitement...</option>
                        <?php
                            foreach ($traitements as $traitement){
                                echo "<option value=\"$traitement->id\" ". (!isset($err) && $consultInfo->traitement_id == $traitement->id ? "selected" : "") .">$traitement->produit $traitement->dilution $traitement->quand pendant $traitement->duree_traitement jour". ($traitement->duree_traitement > 1 ? "s" : "")."</option>";
                            }
                        ?>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>

               
                <div class="btnSubResetContainer">
                    <input type="reset" value="Reinitialiser">
                    <input type="submit" value="Sauvegarder">
                </div>
                

                <div style="display: none;" class="doubleVerifContainer" id="doubleVerifContainer">
                    <div>
                        <h1>ATTENTION !</h1>
                        <p>êtes vous bien sûr de vouloir supprimer cette consultation ?</p>
                        <div>
                            <a href="deleteConsult.php?id=<?php echo $_GET['id'] ?>">Oui</a>
                            <button type="button" onClick="fermerErr('doubleVerifContainer')">Non</button>
                        </div>
                        <button type="button" class="closeBtn" onClick="fermerErr('doubleVerifContainer')"></button>';
                    </div>
                </div>
                <button type="button" class="deleteBtn" onClick="fermerErr('doubleVerifContainer')">supprimer</button>
                
                <div style="margin-bottom: 180px;"></div>
                
            </form>
        </div>
    </div>
    <script src="script/fermerErr.js"></script>
</body>
</html>