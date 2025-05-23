<?php
    try {
        $cnx->beginTransaction();
        
        
        $update = $cnx->prepare("UPDATE manipulation SET tarif  = :tarif , duree = :duree WHERE code = :code");
        $update->execute(["tarif" => $_GET['tarif'], "duree" => $_GET['duree'], "code" => $_GET['code']]);

        $cnx->commit();
        $msg = "La manipulation - ".$_GET['code']." a bien été modifié";
    
    } catch (PDOException $e){
        $cnx->rollBack();
        echo "Vérifiez que les champs sont remplis et ne contiennent pas de caractères spéciaux. Veuillez réessayer ";
    }
?>