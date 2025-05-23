<?php
    try {
        $cnx->beginTransaction();
        
        // on modifit d'abord la table responsable
        $update = $cnx->prepare("UPDATE responsable SET nom  = :nom , adresse = :adresse , telephone = :telephone , mail = :mail WHERE id = :id");
        $update->execute(["nom" => $_GET['nom'], "adresse" => $_GET['adresse'], "telephone" => $_GET['telephone'], "mail" => $_GET['mail'], "id" => (int) $_GET['id']]);
        
        $update = $cnx->prepare("UPDATE particulier SET date_de_naissance  = :date_de_naissance , prenom = :prenom WHERE id = :id");
        $update->execute(["date_de_naissance" => $_GET['date_de_naissance'], "prenom" => $_GET['prenom'], "id" => (int) $_GET['id']]);

        $cnx->commit();
        $msg = "Le particulier n°".$_GET['id']." a bien été modifié";
    
    } catch (PDOException $e){
        $cnx->rollBack();
        echo "Vérifiez que les champs sont remplis et ne contiennent pas de caractères spéciaux. Veuillez réessayer ";
    }
?>