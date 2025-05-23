<?php 
    include($originDir."/config/middleware.php");

    // on récupère le l'url pour pouvoir revenir a cette recherche avec ces param
    $_SESSION['rechercheParam'] = $_SERVER['PHP_SELF'].(isset($_SERVER['QUERY_STRING']) ? "?".$_SERVER['QUERY_STRING'] : "").$_SERVER['QUERY_STRING']."#result";
    

    // si l'utilisateur a bien envoyé le form
    if (isset($_GET['animal_id']) && isset($_GET['date_consult']) && isset($_GET['anamnese']) && isset($_GET['diagnostique']) && isset($_GET['type_localisation']) && isset($_GET['tarif_standard']) && isset($_GET['raison_tarif_exceptionnel']) && isset($_GET['prev_consult']) && isset($_GET['code']) && isset($_GET['traitement_id']) && isset($_GET['type_soin'])) {
        
        include($originDir."/app/models/rechercherConsult.php");
    } else {


        // on affiche la liste de toutes les consultations du plus récent au plus ancien 
        // par défaut
        $consultTrouve = $cnx->query("SELECT consultation_id, animaux.nom, animaux.race, consultation.anamnese, date_consult, consultation.type_localisation, tarif_standard, type_soin FROM traiter JOIN animaux ON traiter.animal_id = animaux.id JOIN consultation ON traiter.consultation_id = consultation.id ORDER BY date_consult DESC");
    }

    $consultTrouveLst = array();
            
    // on met tout dans une liste
    while ($consult = $consultTrouve->fetch(PDO::FETCH_OBJ)){
        
        // on met en forme le timestamp en mode date pour la partie vue
        $dateConsult = DateTime::createFromFormat('Y-m-d H:i:s', $consult->date_consult);
        
        $consult->date_consult = $dateConsult->format('d/m/Y'); // on change le format
        $consultTrouveLst[$consult->consultation_id] = $consult;
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

    include($originDir."/app/views/rechercherConsult.php");
?>
