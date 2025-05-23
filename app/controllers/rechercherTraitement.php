<?php 
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté

    // on récupère le l'url pour pouvoir revenir a cette recherche avec ces param
    $_SESSION['rechercheParam'] = $_SERVER['PHP_SELF'].(isset($_SERVER['QUERY_STRING']) ? "?".$_SERVER['QUERY_STRING'] : "").$_SERVER['QUERY_STRING']."#result";

    $rechercherTraitement=array();
    $parametre = [];
    if (!empty($_GET["produit"])) {
        $rechercherTraitement["produit"]="produit=:produit";
        $parametre['produit']=$_GET['produit'];
    }
    if (!empty($_GET["dilution"])) {
        $rechercherTraitement["dilution"]="dilution=:dilution";
        $parametre['dilution']=$_GET['dilution'];
    }
    if (!empty($_GET["dose"])) {
        $rechercherTraitement["dose"]="dose=:dose";
        $parametre['dose']=$_GET['dose'];
    }
    if (!empty($_GET["duree_traitement"])) {
        $rechercherTraitement["duree_traitement"]="duree_traitement=:duree_traitement";
        $parametre['duree_traitement']=$_GET['duree_traitement'];
    }
    if (!empty($_GET["frequence"])) {
        $rechercherTraitement["frequence"]="frequence=:frequence";
        $parametre['frequence']=$_GET['frequence'];
    }
    if (!empty($_GET["quand"])) {
        $rechercherTraitement["quand"]="quand=:quand";
        $parametre['quand']=$_GET['quand'];
    }

    if (empty($rechercherTraitement)) {
        $resRT = $cnx->query("SELECT id, produit, dilution, dose, duree_traitement, frequence, quand FROM traitement");
        include($originDir."/app/views/rechercherTraitement.php");
    }
    else {
        $reqRT = "WHERE ";
        $sepRT="";
        foreach( $rechercherTraitement as $k => $v ) {
            $reqRT .=$sepRT.$v."";
            $sepRT=" AND ";
        }
        include($originDir."/app/models/rechercherTraitement.php");
        //Ajouter à la page le contenu de la ligne du tableau
        //utiliser echo ? => pour ecrire dans la page rechercher animal 
        include($originDir."/app/views/rechercherTraitement.php");
    }
?>