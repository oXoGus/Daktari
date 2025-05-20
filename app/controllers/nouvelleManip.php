<?php 
    include($originDir."/config/middleware.php");
    
    // si l'utilisateur à envoyé le form 
    if (isset($_GET['code']) && isset($_GET['tarif']) && isset($_GET['duree'])){
        
        // on appel la partie modèle pour ajouter les données dans la base de donnée
        include($originDir."/app/models/nouvelleManip.php");
    } 
    
    include($originDir."/app/views/nouvelleManip.php");
?>
