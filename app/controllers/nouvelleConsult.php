<?php
    // page accessible uniquement aux utilisateurs connectés
    include($originDir."/config/middleware.php");

    // si l'utilisateur a bien envoyé le form
    if (isset($_GET['animal']) && isset($_GET['date_consult']) && isset($_GET['time_consult']) && isset($_GET['anamnese']) && isset($_GET['resume']) && isset($_GET['type_localisation']) && isset($_GET['tarif']) && isset($_GET['raison_tarif_exceptionnel']) && isset($_GET['prev_consult']) && isset($_GET['manip']) && isset($_GET['traitement']) && isset($_GET['duree'])) {

        // on format la date de la consultation pour la bdd
        $dateConsult = $_GET['date_consult'].' '.$_GET['time_consult'].':00';
        $dureeConsult = $_GET['duree'].":00"; 

        include($originDir."/app/models/nouvelleConsult.php");
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


    // on affiche la page dynamique
    include($originDir."/app/views/nouvelleConsult.php");
?>