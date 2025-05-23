<?php
    include($originDir.'/config/connexion_db.php');
    try {
        $resUU = $cnx ->query("UPDATE user_db SET username ='".$_GET['usernamemodif']."' WHERE id=".$_GET['id']);
        $msg = "l'utilisateur a bien été modifié";
    } catch (PDOException $e) {
        $err = $e->getMessage();
    }
?>