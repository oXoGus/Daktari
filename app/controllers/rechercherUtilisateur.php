<?php
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté
    $rechercherUtilisateur=array();
    $param = [];
    if (!empty($_GET["username"])) {
        $rechercherUtilisateur["username"]="username LIKE :username";
        $param[':username']=$_GET['username'].'%';
        $reqRU = "WHERE ";
        $sepRU="";
        foreach( $rechercherUtilisateur as $i => $j ) {
            $reqRU .=$sepRU.$j."";
            $sepRU="AND ";
        }
        include($originDir."/app/models/rechercherUtilisateur.php");
        //Ajouter à la page le contenu de la ligne du tableau
        //utiliser echo ? => pour ecrire dans la page rechercher animal 
    }
    include($originDir."/app/views/rechercherUtilisateur.php");
?>