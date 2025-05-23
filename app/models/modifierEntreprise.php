<?php
    try {
        $cnx->beginTransaction();
        
        // on modifit d'abord la table responsable
        $update = $cnx->prepare("UPDATE responsable SET nom  = :nom , adresse = :adresse , telephone = :telephone , mail = :mail WHERE id = :id");
        $update->execute(["nom" => $_GET['nom'], "adresse" => $_GET['adresse'], "telephone" => $_GET['telephone'], "mail" => $_GET['mail'], "id" => (int) $_GET['id']]);
        
        $update = $cnx->prepare("UPDATE professionnel SET code  = :code , adresse_site_web = :adresse_site_web , IBAN = :IBAN WHERE id = :id");
        $update->execute(["code" => $_GET['code'], "adresse_site_web" => $_GET['adresse_site_web'], "IBAN" => $_GET['IBAN'], "id" => (int) $_GET['id']]);

        $cnx->commit();
        $msg = "L'entreprise n°".$_GET['id']." a bien été modifié";
    
    } catch (PDOException $e){
        $cnx->rollBack();
        echo "Vérifiez que les champs sont remplis et ne contiennent pas de caractères spéciaux. Veuillez réessayer ";
    }
?>