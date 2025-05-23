<?php 

    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté

    // on récupère le l'url pour pouvoir revenir a cette recherche avec ces param
    $_SESSION['rechercheParam'] = $_SERVER['PHP_SELF'].(isset($_SERVER['QUERY_STRING']) ? "?".$_SERVER['QUERY_STRING'] : "").$_SERVER['QUERY_STRING']."#result";
        
    $rechercherAnimal=array();
    $parametres = [];
    if (!empty($_GET["resp"])) {
        $rechercherAnimal["responsable"]="b.id= :resp";
        $parametres["resp"]= (int) $_GET['resp'];
    }
    if (!empty($_GET["nom"])) {
        $rechercherAnimal["nom"]="a.nom=:nom";
        $parametres['nom']=$_GET['nom'];
    }
    if (!empty($_GET["espece"])) {
        $rechercherAnimal["espece"]="a.espece=:espece";
        $parametres['espece']=$_GET['espece'];
    }
    if (!empty($_GET["castre"])) {
        $rechercherAnimal["castre"]="a.castre=:castre";
        $parametres['castre']= $_GET['castre'];
    }
    if (!empty($_GET["race"])) {
        $rechercherAnimal["race"]="a.race=:race";
        $parametres['race']=$_GET['race'];
    }
    if (!empty($_GET["genre"])) {
        $rechercherAnimal["genre"]="a.genre=:genre";
        $parametres['genre']=$_GET['genre'];
    }
    if (!empty($_GET["taille"])) {
        $rechercherAnimal["taille"]="a.taille=:taille";
        $parametres['taille']=$_GET['taille'];
    }
    if (!empty($_GET["poids"])) {
        $rechercherAnimal["poids"]="a.poids=:poids";
        $parametres['poids']=$_GET['poids'];
    }

    if (empty($rechercherAnimal)) {
        // on affiche tout les animaux par défaut 
        $res = $cnx->query("SELECT a.id as id, b.nom as responsable, a.nom as nom, a.espece as espece, a.race as race, a.genre as genre, a.taille as taille FROM animaux a JOIN responsable b ON a.id_responsable = b.id");
        include($originDir."/app/views/rechercherAnimal.php");
    }
    else {
        $req = "WHERE ";
        $sep="";
        foreach( $rechercherAnimal as $key => $value ) {
            $req .=$sep.$value."";
            $sep=" AND ";
        }
        include($originDir."/app/models/GETResponsable.php");
        $rowsMA=$resResp->fetchAll(PDO::FETCH_OBJ);
        
        //On affiche tous les vaccins
        include($originDir."/app/models/GETVaccins.php");
        $rowsVaccins=$resVaccins->fetchAll(PDO::FETCH_OBJ);

        include($originDir."/app/models/rechercherAnimal.php");

        include($originDir."/app/views/rechercherAnimal.php");
    }
?>