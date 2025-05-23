<?php
    include($originDir.'/config/connexion_db.php');
    try {
        $resUU = $cnx ->query("UPDATE user_db SET username ='".$_GET['usernamemodif']."' WHERE id=".$_GET['id']);
        $msg = "l'utilisateur a bien été modifié";
    } catch (PDOException $e) {
        echo"Une erreur est survenue. Vérifiez que le nom d'utilisateur entré n'existe pas déjà, que vous avez bien rentré au moins 1 caractère et qu'il n'y a pas de caractères spéciaux ";
    }
?>