<?php
    include($originDir.'/config/connexion_db.php');
    try {
        $inputVacc = $cnx ->query($inputVaccin);
        $msg = "le vaccin a bien été ajouté ";
    } catch (PDOException $e) {
        echo "Vérifiez que les champs sont remplis et ne contiennent pas de caractères spéciaux. Veuillez réessayer ";
    } 
?>