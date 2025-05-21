<?php 
    include($originDir."/config/middleware.php"); // page uniquement accèssible aux utilisateurs

    // si l'utilisateur à envoyé le form 
    if (isset($_GET['nom']) && isset($_GET['adresse']) && isset($_GET['telephone']) && isset($_GET['mail']) && isset($_GET['prenom']) && isset($_GET['date_de_naissance'])){
        
        // on récupère le get sous forme d'url pour pouvoir revenir a cette recherche avec ces param
        $_SESSION['rechercheParam'] = $_SERVER['QUERY_STRING'];
        
        // on appel la partie modèle pour ajouter les données dans la base de donnée
        include($originDir."/app/models/rechercherParticulier.php");

    } else {

        // on reset la search
        unset($_SESSION['rechercheParam']); 
        
        // par défaut
        $particulierTrouve = $cnx->query("SELECT id, nom, telephone, mail, prenom, date_de_naissance, adresse FROM responsable NATURAL JOIN particulier");
    }

    $particulierTrouveLst = array();
    
    // on met tout dans une liste
    while ($particulier = $particulierTrouve->fetch(PDO::FETCH_OBJ)){

        // on met en forme le timestamp en mode date pour la partie vue
        $dateNaiss = DateTime::createFromFormat('Y-m-d', $particulier->date_de_naissance);

        $particulier->date_de_naissance = $dateNaiss->format('d/m/Y'); // on change le format
        $particulierTrouveLst[$particulier->id] = $particulier;
    }
    

    // on affiche ensuite la page dynamique 
    include($originDir."/app/views/rechercherParticulier.php");
?>
