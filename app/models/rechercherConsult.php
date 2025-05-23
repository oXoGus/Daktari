
<?php
    try {
        
        // si l'utilisateur n'a rien rempis dans les champs pour la recherche
        // on fait une requete sans clause WHERE
        if (empty($_GET['animal_id']) && empty($_GET['date_consult']) && empty($_GET['anamnese']) && empty($_GET['diagnostique']) && empty($_GET['type_localisation']) && empty($_GET['tarif_standard']) && empty($_GET['raison_tarif_exceptionnel']) && empty($_GET['prev_consult']) && empty($_GET['code']) && empty($_GET['traitement_id']) && empty($_GET['type_soin'])) {
            $consultTrouve = $cnx->query("SELECT consultation_id, animaux.nom, animaux.race, consultation.anamnese, date_consult, consultation.type_localisation, tarif_standard, type_soin FROM traiter JOIN animaux ON traiter.animal_id = animaux.id JOIN consultation ON traiter.consultation_id = consultation.id ORDER BY date_consult DESC");
        } else {
            // sinon on met dans une liste tout les 'bout' de clause WHERE
            $whereClauseLst = array();
            $params = array();

            // pour chaque clé dans le GET et dans la liste des clause pour empécher les injections SQL
            $champsAccepte = ["animal_id", "date_consult", "anamnese", "type_localisation", "tarif_standard", "raison_tarif_exceptionnel", "prev_consult", "code", "traitement_id", "duree", "type_soin", "diagnostique"];
            $champsLike = ["anamnese", "raison_tarif_exceptionnel", "diagnostique"];

            foreach ($_GET as $champ => $val){
                
                if (in_array($champ, $champsAccepte) && !empty($val)){

                    // les clause qui utilise des LIKE et non pas des =
                    if (in_array($champ, $champsLike)){
                        $whereClauseLst[] = "$champ LIKE :$champ";
                        $params[$champ] = "%".$val."%";
                    } elseif ($champ == "date_consult") {
                        // on doit prendre la partie DAY du timestamp
                        $whereClauseLst[] = "CAST($champ AS DATE) = :$champ";
                        $params[$champ] = $val;
                    } else {
                        $whereClauseLst[] = "$champ = :$champ";
                        $params[$champ] = $val;
                    }
                    
                    
                }
            }
            $reqete = "SELECT consultation_id, animaux.nom, animaux.race, consultation.anamnese, date_consult, consultation.type_localisation, tarif_standard, type_soin FROM traiter JOIN animaux ON traiter.animal_id = animaux.id JOIN consultation ON traiter.consultation_id = consultation.id NATURAL JOIN manip_consult NATURAL JOIN traitement_consult WHERE " . implode(' AND ', $whereClauseLst). " GROUP BY consultation_id, animaux.nom, animaux.race, consultation.anamnese, date_consult, consultation.type_localisation, tarif_standard, type_soin ORDER BY date_consult DESC";

            // on utilise le implode pour faire la clause where dynamiquement
            $consultTrouve = $cnx->prepare($reqete);
            $consultTrouve->execute($params);
        }
    } catch (PDOException $e){
        echo "Vérifiez que les champs sont remplis et ne contiennent pas de caractères spéciaux. Veuillez réessayer ";
        $err = $e->getMessage();    
    }
?>