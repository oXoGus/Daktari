<?php
    include($originDir.'/config/connexion_db.php');
    $resMU = $cnx ->query('SELECT username FROM user_db where id='.$uID);
?>