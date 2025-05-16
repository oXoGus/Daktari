<?php
    // page accessible uniquement aux utilisateurs connectés
    include($originDir."/config/middleware.php");

    // récupération des données pour les option dans les select 
    include($originDir."/app/models/nouvelleConsult.php");

    // on affiche la page dynamique
    include($originDir."/app/views/nouvelleConsult.php");
?>