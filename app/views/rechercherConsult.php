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
    <title>rechercher une consultation</title>
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
            <h1 class="formTitle">Rechercher une consultation</h1>
            <form method="GET" action="rechercherConsult.php#result">
                <div class="sectionTitleContainer">
                    <div></div>    
                    <h2 class="sectionTitle">Rechercher par</h2>
                    <div></div>
                </div> 
                <span>
                    <select name="animal_id">
                        <option value="">Sélectionnez un animal...</option>
                        <?php
                            foreach ($animaux as $animal){

                                // on remet les options selected pour éviter de les reselectionner
                                if (isset($_GET['animal_id']) && $_GET['animal_id'] == $animal->id){
                                    echo "<option value=\"$animal->id\" selected>$animal->nom, $animal->race</option>";
                                } else {
                                    echo "<option value=\"$animal->id\" >$animal->nom, $animal->race</option>";
                                }
                            }
                        ?>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>
                <span>
                    le <input type="date" name="date_consult" <?php if(isset($_GET['date_consult'])) {echo "value=\"".$_GET['date_consult']."\"";}?>> 
                </span>
                <span>
                    Type de consultation :
                    <select name="type_soin">
                        <option value="">Selectionnez un type...</option>
                        <?php
                            foreach ($types_consult as $type){
                                echo "<option value=\"$type->type_soin\" ". (isset($_GET['type_soin']) && $_GET['type_soin'] == $type->type_soin ? "selected" : "") .">$type->type_soin</option>";
                            }
                        ?>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>
                <span>Anamnèse :</span>
                <textarea name="anamnese" maxlength="100" ><?php if (isset($_GET['anamnese'])) { echo $_GET['anamnese']; }  ?></textarea>
                <span>Diagnostique :</span>
                <textarea name="diagnostique" maxlength="100" ><?php if (isset($_GET['diagnostique'])) { echo $_GET['diagnostique']; }  ?></textarea>
                <span>
                    Mode de localisation :
                    <select name="type_localisation">
                        <option value="">Selectionnez un type...</option>
                        <option value="cabinet" <?php if (isset($_GET['type_localisation']) && $_GET['type_localisation'] == "cabinet") {echo "selected";}?>>cabinet</option>
                        <option value="hors cabinet" <?php if (isset($_GET['type_localisation']) && $_GET['type_localisation'] == "hors cabinet") {echo "selected";}?>>hors cabinet</option>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>
                <span>
                    Tarif : <input type="number" min="0" name="tarif_standard" <?php if (isset($_GET['tarif_standard'])) {echo "value=\"".$_GET['tarif_standard']."\"";}?>>
                </span>
                <span>
                    Raison du tarif exeptionnel : 
                </span>
                <input type="text" maxlength="100" name="raison_tarif_exceptionnel" <?php if (isset($_GET['raison_tarif_exceptionnel'])) {echo "value=\"".$_GET['raison_tarif_exceptionnel']."\"";}?>>
                <span>
                    Consultation antérieur :
                    <select name="prev_consult">
                        <option value="">Selectionnez un consultation...</option>
                        <?php
                            foreach ($consultations as $consult){
                                echo "<option value=\"$consult->consultation_id\" ". (isset($_GET['prev_consult']) && $_GET['prev_consult'] == $consult->consultation_id ? "selected" : "") .">$consult->nom, $consult->race le $consult->date_consult</option>";
                            }
                        ?>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>
                <span>
                    <select name="code">
                        <option value="">Selectionnez une manipulation...</option>
                        <?php
                            foreach ($manipLst as $manip){
                                echo "<option value=\"$manip->code\" ". (isset($_GET['code']) && $_GET['code'] == $manip->code ? "selected" : "") .">$manip->code</option>";
                            }
                        ?>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>
                <span>
                    <select name="traitement_id">
                        <option value="">Selectionnez un traitement...</option>
                        <?php
                            foreach ($traitements as $traitement){
                                echo "<option value=\"$traitement->id\" ". (isset($_GET['traitement_id']) && $_GET['traitement_id'] == $traitement->id ? "selected" : "") .">$traitement->produit $traitement->dilution $traitement->quand pendant $traitement->duree_traitement jour". ($traitement->duree_traitement > 1 ? "s" : "")."</option>";
                            }
                        ?>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>

               
                <div class="btnSubResetContainer">
                    <input type="reset" value="Reinitialiser">
                    <input type="submit" value="Rechercher">
                </div>

                <div style="margin-bottom: 100px"></div>
                
            </form>
        </div>
        <div id="result" class="responseContainer">
            <div class="tableContainer">
                <?php
                    if (!empty($consultTrouveLst)){
                        echo '
                        <div class="sectionTitleContainer">
                                <div></div>    
                                <h2 class="sectionTitle">'.count($consultTrouveLst).' consultations trouvées</h2>
                                <div></div>
                            </div> 
                        <table>
                            <thead>
                                <tr>
                                    <th>date</th>
                                    <th>animal</th>
                                    <th>anamnese</th>
                                    <th>Où</th>
                                    <th>type</th>
                                    <th>tarif</th>
                                    <th>voir plus</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach ($consultTrouveLst as $consult){
                                echo "
                                <tr>
                                    <td>$consult->date_consult</td>
                                    <td>$consult->nom, $consult->race</td>
                                    <td>$consult->anamnese</td>
                                    <td>$consult->type_localisation</td>
                                    <td>$consult->type_soin</td>
                                    <td>$consult->tarif_standard €</td>
                                    <td><a href=\"modifierConsult.php?id=$consult->consultation_id\">voir/modifier</a></td>
                                </tr>";
                            }
                            echo '</tbody>
                        </table>
                    
                        ';
                    } else {
                        echo '
                            <div class="sectionTitleContainer">
                                <div></div>    
                                <h2 class="sectionTitle">aucune consultation trouvée</h2>
                                <div></div>
                            </div> 
                            <div class="noResponseContainer">
                                <p>Réessayer</p>
                                <p>ou</p>
                                <a href="nouvelleConsult.php">ajouter une consultation</a>
                            </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>