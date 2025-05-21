<?php 
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté

    if (!empty($_GET["produit"]) && !empty($_GET["dilution"]) && !empty($_GET["dose"]) && !empty($_GET["duree_traitement"]) && !empty($_GET["frequence"]) && !empty($_GET["quand"])) {
        $inputTraitement = "INSERT INTO traitement (produit, dilution, dose, duree_traitement, frequence, quand) VALUES ('".$_GET['produit']."', ".$_GET['dilution'].", ".$_GET['dose'].", ".$_GET['duree_traitement'].", ".$_GET['frequence'].", '".$_GET['quand']."')";
        include($originDir."/app/models/INSERTTraitement.php");
    }
    include($originDir."/app/views/nouveauTraitement.php");
?>
