<?php 
    include($originDir."/config/middleware.php"); // page uniquement accèssible aux utilisateurs

    // si l'utilisateur à envoyé le form 
    if (isset($_GET['nom']) && isset($_GET['adresse']) && isset($_GET['telephone']) && isset($_GET['mail']) && isset($_GET['adresse_site_web']) && isset($_GET['IBAN'])){
        
        // on récupère le get sous forme d'url pour pouvoir revenir a cette recherche avec ces param
        $_SESSION['rechercheParam'] = $_SERVER['QUERY_STRING'];
        
        // on appel la partie modèle pour ajouter les données dans la base de donnée
        include($originDir."/app/models/rechercherEntreprise.php");

    } else {
        // on reset la search
        unset($_SESSION['rechercheParam']); 

        // par défaut
        $entrepriseTrouve = $cnx->query("SELECT id, nom, telephone, mail, adresse_site_web, libelle FROM responsable NATURAL JOIN professionnel NATURAL JOIN type_professionnel");
    }

    $entrepriseTrouveLst = array();
            
    // on met tout dans une liste
    while ($entreprise = $entrepriseTrouve->fetch(PDO::FETCH_OBJ)){
        $entrepriseTrouveLst[$entreprise->id] = $entreprise;
    }
    
    // on récupère la liste des type d'entreprises
    $res = $cnx->query("SELECT * FROM type_professionnel");
    
    $typeList = array();
    while ($type = $res->fetch(PDO::FETCH_OBJ)) {
        $typeList[$type->code] = $type->libelle;
    }

    // on affiche ensuite la page dynamique 
    include($originDir."/app/views/rechercherEntreprise.php");
?>
