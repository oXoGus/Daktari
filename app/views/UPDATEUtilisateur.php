<?php
    include($originDir.'/config/connexion_db.php');
    $resUU = $cnx ->query("UPDATE user_db SET username ='".$_GET['usernamemodif']."' WHERE id=".$_GET['id']);
?>