<?php 

    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté

    $rechercherAnimal=array();
    $parametres = [];
    if (!empty($_GET["resp"])) {
        $rechercherAnimal["responsable"]="b.nom=:resp";
        $parametres[':resp']=$_GET['resp'];
    }
    if (!empty($_GET["nom"])) {
        $rechercherAnimal["nom"]="a.nom=:nom";
        $parametres[':nom']=$_GET['nom'];
    }
    if (!empty($_GET["espece"])) {
        $rechercherAnimal["espece"]="a.espece=:espece";
        $parametres[':espece']=$_GET['espece'];
    }
    if (!empty($_GET["race"])) {
        $rechercherAnimal["race"]="a.race=:race";
        $parametres[':race']=$_GET['race'];
    }
    if (!empty($_GET["genre"])) {
        $rechercherAnimal["genre"]="a.genre=:genre";
        $parametres[':genre']=$_GET['genre'];
    }
    if (!empty($_GET["taille"])) {
        $rechercherAnimal["taille"]="a.taille=:taille";
        $parametres[':taille']=$_GET['taille'];
    }
    if (!empty($_GET["poids"])) {
        $rechercherAnimal["poids"]="a.poids=:poids";
        $parametres[':poids']=$_GET['poids'];
    }

    if (empty($rechercherAnimal)) {
        include($originDir."/app/views/rechercherAnimal.php");
    }
    else {
        $req = "WHERE a.id_responsable=b.id AND ";
        $sep="";
        foreach( $rechercherAnimal as $key => $value ) {
            $req .=$sep.$value."";
            $sep="AND ";
        }
        include($originDir."/app/models/rechercherAnimal.php");
        //Ajouter à la page le contenu de la ligne du tableau
        //utiliser echo ? => pour ecrire dans la page rechercher animal 
        include($originDir."/app/views/rechercherAnimal.php");
    }
?>