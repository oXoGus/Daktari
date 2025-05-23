<?php
    include($originDir.'/config/connexion_db.php');
    try {
        $resUA = $cnx ->prepare("UPDATE animaux SET ".$reqUA." WHERE id=".$_GET['id']);
        $resUA -> execute($parametresA);
        $msg = "l'animal a bien été modifier";
        
    } catch (PDOException $e) {
        echo "Vérifiez que les champs sont remplis et ne contiennent pas le caractère ' ";
    }
   
?>