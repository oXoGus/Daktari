<?php
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté

    if (isset($_GET['id']) && !empty($_GET['id'])){
        $delete = $cnx->prepare("DELETE FROM traitement WHERE id = :id");
        $delete->execute(["id" => $_GET['id']]);
    } 
    // on redirige l'utilisateur vers la page de recherche
    header("location: ".(isset($_SESSION['rechercheParam']) ? $_SESSION['rechercheParam'] : "rechercherTraitement.php"));   
?>