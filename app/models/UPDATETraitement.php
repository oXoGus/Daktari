<?php
    include($originDir.'/config/connexion_db.php');
    try {
        $resUT = $cnx ->query("UPDATE traitement SET ".$reqUT." WHERE id=".$_GET['id']);
        $msg = "le traitement à bien été modifier";
    } catch (PDOException $e){
        echo "Vérifiez que les champs sont remplis et ne contiennent pas le caractère ' ";
    }
?>