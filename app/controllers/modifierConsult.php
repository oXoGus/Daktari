<?php
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté

    // si l'utilisateur a bien envoyé le form
    if (isset($_GET['id']) && isset($_GET['animal']) && isset($_GET['date_consult']) && isset($_GET['time_consult']) && isset($_GET['type_consultation']) && isset($_GET['anamnese']) && isset($_GET['diagnostique']) && isset($_GET['resume']) && isset($_GET['duree']) && isset($_GET['type_localisation']) && isset($_GET['tarif']) && isset($_GET['raison_tarif_exceptionnel']) && isset($_GET['prev_consult']) && isset($_GET['manip']) && isset($_GET['traitement'])) {

        // on format la date de la consultation pour la bdd
        $_GET['date_consult'] = $_GET['date_consult'].' '.$_GET['time_consult'].':00';
        $_GET['duree'] = $_GET['duree'].":00"; 

        // on update toutes les données
        include($originDir."/app/models/modifierConsult.php");
    }

    if (isset($_GET['id']) && !empty($_GET['id'])){
        
        // on charge toutes les info de la consultation
        $consultInfo = $cnx->prepare("SELECT consultation_id, animaux.id animal_id, consultation.anamnese, date_consult, consultation.type_localisation, tarif_standard, type_soin, diagnostique, resume, raison_tarif_exceptionnel, prev_consult, code, traitement_id, consultation.duree FROM traiter JOIN animaux ON traiter.animal_id = animaux.id JOIN consultation ON traiter.consultation_id = consultation.id NATURAL LEFT JOIN traitement_consult NATURAL LEFT JOIN manip_consult WHERE consultation_id = :id");
        $consultInfo->execute(["id" => $_GET['id']]);
        $consultInfo = $consultInfo->fetch(PDO::FETCH_OBJ);
        
        // pas de consult trouvé
        if ($consultInfo == false){
            $err = "aucune consultation avec cet id";
        } else {
            // mise en forme de la date et de l'heure
            $dateConsult = DateTime::createFromFormat('Y-m-d H:i:s', $consultInfo->date_consult);
            $consultInfo->time_consult = $dateConsult->format("H:i");
            $consultInfo->date_consult = $dateConsult->format("Y-m-d");
            $consultInfo->duree = DateTime::createFromFormat('H:i:s', $consultInfo->duree)->format('H:i');
        }

        
        // récupération des données pour les option dans les select 
        $res = $cnx->query("SELECT id, nom, race FROM animaux");
        
        $animaux = array();
        while ($animal = $res->fetch(PDO::FETCH_OBJ)){
            $animaux[$animal->id] = $animal;
        }

        // pour les types de consultations 
        $res = $cnx->query("SELECT type_soin FROM type_consult");
        
        $types_consult = array();
        while ($type = $res->fetch(PDO::FETCH_OBJ)){
            $types_consult[] = $type; 
        }

        // pour les consult anterieurs
        $res = $cnx->query("SELECT consultation_id, animaux.nom, animaux.race, consultation.anamnese, date_consult FROM traiter JOIN animaux ON traiter.animal_id = animaux.id JOIN consultation ON traiter.consultation_id = consultation.id");
        
        $consultations = array();
        while ($consult = $res->fetch(PDO::FETCH_OBJ)){

            // on met en forme le timestamp en mode date pour la partie vue
            $dateConsult = DateTime::createFromFormat('Y-m-d H:i:s', $consult->date_consult);
            
            $consult->date_consult = $dateConsult->format('d/m/Y'); // on change le format
            $consultations[$consult->consultation_id] = $consult;
        }

        $res = $cnx->query("SELECT code FROM manipulation");
        
        $manipLst = array();
        while ($manip = $res->fetch(PDO::FETCH_OBJ)){
            $manipLst[] = $manip;
        }

        $res = $cnx->query("SELECT * FROM traitement");
        
        $traitements = array();
        while ($traitement = $res->fetch(PDO::FETCH_OBJ)){
            $traitements[$traitement->id] = $traitement;
        }
    } else {
        // sinon on le renvoie a la page de recherche
        header("location: rechercherConsult.php");
    }

    

    include($originDir."/app/views/modifierConsult.php");
    
?>