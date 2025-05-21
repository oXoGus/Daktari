<?php
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté

    include ($originDir."/app/models/DELETEUtilisateur.php");
    // si l'utilisateur est connecté 
    // on inclue directment la vue puiqu'il n'y à aucune info à récup
    include($originDir."/app/views/rechercherUtilisateur.php");
    
?>