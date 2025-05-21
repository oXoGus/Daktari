<?php
//on essaye de se connecter à la base de données
    include($originDir.'/config/connexion_db.php');
    $addU = $cnx -> query($addUser);

?>