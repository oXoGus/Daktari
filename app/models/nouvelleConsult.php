<?php
    try {

        // plusieurs insertion donc transaction
        $cnx->beginTransaction();

        // on crée d'abord la consultation 
        $res = $cnx->query("INSERT INTO consultation (anamnese, diagnostique, type_localisation, resume, duree, prev_consult) VALUES (".$cnx->quote($_GET['anamnese']).", ".$cnx->quote($_GET['diagnostique']).", ".$cnx->quote($_GET['type_localisation']).", ".$cnx->quote($_GET['resume']).", ".$cnx->quote($dureeConsult).", ".(empty($_GET['prev_consult']) ? "NULL" : $_GET['prev_consult']).") RETURNING id");
        $id = $res->fetch(PDO::FETCH_OBJ)->id;
        $res->closeCursor();

        // ensuite la table traiter
        $cnx->exec("INSERT INTO traiter (animal_id, consultation_id, type_soin, tarif_standard, date_consult, raison_tarif_exceptionnel) VALUES (".$_GET['animal'].", $id, ".$cnx->quote($_GET['type_consultation']).", ".$_GET['tarif'].", ".$cnx->quote($dateConsult).", ".$cnx->quote($_GET['raison_tarif_exceptionnel']).")");
        
        // la manip si elle a eu lieu
        if (!empty($_GET['manip'])){
            $cnx->exec("INSERT INTO manip_consult (consultation_id, code) VALUES ($id, ".$cnx->quote($_GET['manip']).")");
        }
        
        // le traitement si il y en a un 
        if (!empty($_GET['traitement'])){
            $cnx->exec("INSERT INTO traitement_consult (consultation_id, traitement_id) VALUES ($id, ".$_GET['traitement'].")");
        }

        $cnx->commit();
        
        $msg = "la consultation a bien été ajouté";
    } catch (PDOException $e){
        $cnx->rollBack();
        echo "Vérifiez que les champs sont remplis et ne contiennent pas de caractères spéciaux. Veuillez réessayer "; 
    }
?>