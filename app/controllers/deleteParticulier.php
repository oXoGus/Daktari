<?php
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté

    if (isset($_GET['id'])){
        // grace au on delete cascade pour chaque foreign key 
        // on a juste a supprimer le particulier 
        // et cela supprimera toutes les entré qui on id qui vient d'etre supp en foreign key
        try {
            $delete = $cnx->prepare("DELETE FROM responsable WHERE id = :id");
            $delete->execute(["id" => (int) $_GET['id']]);
        } catch (PDOException $e){} // on redirige même en cas d'erreur

       
    } 

    // on redirige l'utilisateur sur la page de recherche 
    header("location: ".(isset($_SESSION['rechercheParam']) ? $_SESSION['rechercheParam'] : "rechercherParticulier.php"));   

?>