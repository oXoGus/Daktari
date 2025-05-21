<?php
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté
    if ($usernameMU[0]->username != $_GET["usernamemodif"]){  
        include($originDir."/app/models/UPDATEUtilisateur.php");
    }
    include($originDir."/app/views/modifierUtilisateur.php");
    ?>
