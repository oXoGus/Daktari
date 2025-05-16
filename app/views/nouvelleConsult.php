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
            <h1 class="formTitle">Ajouter une consultation</h1>
            <form type="GET" action="nouvelleConsult.php">
                <div class="sectionTitleContainer">
                    <div></div>    
                    <h2 class="sectionTitle">Animal</h2>
                    <div></div>
                    <a class="newBtnRight" href="nouvelAnnimal.php">ajouter un animal</a>
                </div> 
                <span>
                    <select name="animal">
                        <option value="">Selectionnez un animal...</option>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>
                <div class="sectionTitleContainer">
                    <div></div>    
                    <h2 class="sectionTitle">Desciptif</h2>
                    <div></div>
                </div>
                <span>
                    le <input type="date" name="date_consult" value="2025-05-16"> à <input type="time" name="time_consult" value="14:03">
                </span>
                <span>
                    Type de consultation :
                    <select name="type_consultation">
                        <option value="">Selectionnez un type...</option>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>
                <span>Anamnèse :</span>
                <textarea name="anamnese"></textarea>
                <span>Diagnostique :</span>
                <textarea name="diagnostique"></textarea>
                <span>Résumé :</span>
                <textarea name="resume"></textarea>
                <span>
                    durée de la consultation<input type="time" name="duree" value="00:30">
                </span>
                <span>
                    Mode de localisation :
                    <select name="type_localisation">
                        <option value="">Selectionnez un type...</option>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>
                <span>
                    Tarif : <input type="number" name="tarif">
                </span>
                <span>
                    Raison du tarif exeptionnel : 
                </span>
                <input type="text" name="raison_tarif_exceptionnel">
                <span>
                    Consultation antérieur :
                    <select name="type_localisation">
                        <option value="">Selectionnez un consultation...</option>
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
                    <select name="manip[]">
                        <option value="">Selectionnez une manipulation...</option>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>

                <div class="sectionTitleContainer">
                    <div></div>
                    <h2 class="sectionTitle">Traitement</h2>
                    <div></div>
                    <a class="newBtnRight" href="nouveauTraitement.php">nouveau traitement</a>
                    <button type="submit"class="newBtnLeft">ajouter un traitement pour cette consultation </button>
                </div> 
                <span>
                    <select name="traitement[]">
                        <option value="">Selectionnez un traitement...</option>
                    </select>
                    <svg class="flecheBas" style="margin-left: 5px;" width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.73205 12C8.96225 13.3333 7.03775 13.3333 6.26795 12L1.0718 3C0.301996 1.66667 1.26425 0 2.80385 0L13.1962 0C14.7358 0 15.698 1.66667 14.9282 3L9.73205 12Z" /></svg>
                </span>

               
                <div class="btnSubResetContainer">
                    <input type="reset" value="Reinitialiser">
                    <input type="submit" value="Sauvegarder">
                </div>

                <div style="margin-bottom: 100px"></div>
                
            </form>
        </div>
    </div>
</body>
</html>