<?php 
    include($originDir."/config/middleware.php");
    
    // si l'utilisateur à envoyé le form 
    if (isset($_GET['nom']) && isset($_GET['adresse']) && isset($_GET['telephone']) && isset($_GET['mail']) && isset($_GET['date_de_naissance']) && isset($_GET['prenom'])){
        
        // on appel la partie modèle pour ajouter les données dans la base de donnée
        include($originDir."/app/models/nouveauParticulier.php");
    } 
    
    include($originDir."/app/views/nouveauParticulier.php");
?>
