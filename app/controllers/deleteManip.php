<?php
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté

    if (isset($_GET['code'])){
        // grace au on delete cascade pour chaque foreign key 
        // on a juste a supprimer la manip 
        // et cela supprimera toutes les entré qui on id qui vient d'etre supp en foreign key
        try {
            $delete = $cnx->prepare("DELETE FROM manipulation WHERE code = :code");
            $delete->execute(["code" => $_GET['code']]);
        } catch (PDOException $e){} // on redirige même en cas d'erreur

        // on redirige l'utilisateur sur la page de recherche 
        header('location: rechercherManip.php'.(isset($_SESSION['rechercheParam']) ? "?".$_SESSION['rechercheParam'] : "")."#result");
        
    } else {
        header('location: rechercherManip.php');
        exit;
    }
?>