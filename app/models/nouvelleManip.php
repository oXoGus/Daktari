<?php 
    include($originDir."/config/connexion_db.php"); // connextion a la db
    
    try {

        // on ajoutes les info dans la table manipulation
        $cnx->exec("INSERT INTO manipulation (code, tarif, duree) VALUES (".$cnx->quote($_GET['code']).", ".$cnx->quote($_GET['tarif']).", ".$cnx->quote($_GET['duree']).")");

        $msg = "la manipulation a bien été ajouté";

    } catch (PDOException $e){
        $cnx->rollBack();
        echo "Vérifiez que les champs sont remplis et ne contiennent pas de caractères spéciaux. Veuillez réessayer ";
    }
?>
