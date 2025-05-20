<?php 
    include($originDir."/config/middleware.php"); // page uniquement accèssible aux utilisateurs

    // si l'utilisateur à envoyé le form 
    if (isset($_GET['nom']) && isset($_GET['adresse']) && isset($_GET['telephone']) && isset($_GET['mail']) && isset($_GET['adresse_site_web']) && isset($_GET['IBAN'])){
        
        // on appel la partie modèle pour ajouter les données dans la base de donnée
        include($originDir."/app/models/nouvelleEntreprise.php");

    } 
    
    // on récupère la liste des type d'entreprises
    $res = $cnx->query("SELECT * FROM type_professionnel");
    
    $typeList = array();
    while ($type = $res->fetch(PDO::FETCH_OBJ)) {
        $typeList[$type->code] = $type->libelle;
    }

    // on affiche ensuite la page dynamique 
    include($originDir."/app/views/nouvelleEntreprise.php");
?>
