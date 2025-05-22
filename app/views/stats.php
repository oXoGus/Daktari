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
                <h1 class="formContainerTitle">
                    Statistiques
                </h1>
                    <div class="sectionTitleContainer">
                        <div></div>
                        <h2 class="sectionTitle">Meilleurs clients</h2>
                        <div></div>
                    </div>
                    <table>
                    <thead>
                        <th scope="col">Nom du Client</th>
                        <th scope="col">Montant</th>
                    </thead>
                    <tbody>
                    <?php
                        $lignesB=$reqB->fetchAll(PDO::FETCH_OBJ);
                        foreach ($lignesB as $ligneB) {
                            echo"<tr><th>".$ligneB->nom ."</th><td>".$ligneB->total."</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <div class="sectionTitleContainer">
                    <div></div>
                        <h2 class='sectionTitle'> Manipulations du mois dernier </h2>
                    <div></div>
                </div>
                <table>
                    <thead>
                        <th scope="col">Client</th>
                        <th scope="col">Anima</th>
                        <th scope="col">Manipulation</th>
                    </thead>
                    <tbody>
                    <?php
                        $lignesM=$reqM->fetchAll(PDO::FETCH_OBJ);
                        foreach ($lignesM as $ligneM) {
                            echo"<tr><th>".$ligneM->client ."</th><td>".$ligneM->animal."</td><td>".$ligneM->code."</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <div class="sectionTitleContainer">
                    <div></div>
                        <h2 class='sectionTitle'> Types de consultations ayant augmenté de plus de 50% depuis 2020 </h2>
                    <div></div>
                </div>
                <table>
                    <thead>
                        <th scope="col">type de soins</th>
                        <th scope="col">type de localisation</th>
                        <th scope="col">premier tarif après 2020</th>
                        <th scope="col">dernier tarif</th>
                        <th scope="col">augmentation</th>
                    </thead>
                    <tbody>
                    <?php
                        $lignesA=$reqA->fetchAll(PDO::FETCH_OBJ);
                        foreach ($lignesA as $ligneA) {
                            echo"<tr><th>".$ligneA->type_soin ."</th><td>".$ligneA->type_localisation."</td><td>".$ligneA->tarif2020."</td><td>".$ligneA->tarifrecent."</td><td>".$ligneA->augmentation."</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>