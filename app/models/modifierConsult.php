<?php
    try {
        $cnx->beginTransaction();
        
        // on commence par modifier la table consultation
        $update = $cnx->prepare("UPDATE consultation SET anamnese = :anamnese , diagnostique = :diagnostique , type_localisation = :type_localisation , resume = :resume , duree = :duree , prev_consult = :prev_consult WHERE id = :id");
        $update->execute(["anamnese" => $_GET['anamnese'], "diagnostique" => $_GET['diagnostique'], "type_localisation" => $_GET['type_localisation'], "resume" => $_GET['resume'], "duree" => $_GET['duree'], "prev_consult" => (empty($_GET['prev_consult']) ? null : (int) $_GET['prev_consult']), "id" => $_GET['id'],]);
        
        // ensuite la table traiter
        $update = $cnx->prepare("UPDATE traiter SET animal_id = :animal , type_soin = :type_consultation , tarif_standard = :tarif , date_consult = :date_consult , raison_tarif_exceptionnel = :raison_tarif_exceptionnel WHERE consultation_id = :id");
        $update->execute(["animal" => $_GET['animal'], "type_consultation" => $_GET['type_consultation'], "tarif" => $_GET['tarif'], "date_consult" => $_GET['date_consult'], "raison_tarif_exceptionnel" => $_GET['raison_tarif_exceptionnel'], "id" => $_GET['id'],]);
        
        // la table manip_consult
        // si le code est vide on supprime la ligne 
        if (empty($_GET['manip'])){
            $update = $cnx->prepare("DELETE FROM manip_consult WHERE consultation_id = :id");
            $update->execute(["id" => $_GET['id']]);
        } else {
            $update = $cnx->prepare("UPDATE manip_consult SET code = :manip WHERE consultation_id = :id");
            $update->execute(["manip" => $_GET['manip'], "id" => $_GET['id']]);
        }

        // meme chose pour la table traitement
        // si l"id est vide on supprime la ligne 
        if (empty($_GET['traitement'])){
            $update = $cnx->prepare("DELETE FROM traitement_consult WHERE consultation_id = :id");
            $update->execute(["id" => $_GET['id']]);
        } else {
            $update = $cnx->prepare("UPDATE traitement_consult SET traitement_id = :traitement_id WHERE consultation_id = :id");
            $update->execute(["traitement_id" => $_GET['traitement'], "id" => $_GET['id']]);
        }

        $cnx->commit();
        $msg = "cette consultation n°".$_GET['id']." a bien été modifié";

    } catch (PDOException $e) {

        $cnx->rollBack();
        $err = $e;
    }

?>