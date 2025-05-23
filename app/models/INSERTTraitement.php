<?php
    include($originDir.'/config/connexion_db.php');
    try {
        $addT = $cnx -> exec($inputTraitement);
        $msg = "le traitement a bien été ajouté";
    } catch (PDOException $e) {
        echo "Vérifiez que les champs sont remplis et ne contiennent pas de caractères spéciaux. Veuillez réessayer ";
    }
?>