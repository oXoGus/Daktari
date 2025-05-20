<?php 
    include($originDir."/config/connexion_db.php"); // connextion a la db
    
    try {
        // on commence une transaction puisque l'on doit faire deux requete 
        $cnx->beginTransaction();
        
        // on fait une première requete pour la table responsable
        $res = $cnx->query("INSERT INTO responsable (nom, adresse, telephone, mail) VALUES (".$cnx->quote($_GET['nom']).", ".$cnx->quote($_GET['adresse']).", ".$cnx->quote($_GET['telephone']).", ".$cnx->quote($_GET['mail']).") RETURNING id");
        
        // on récup l'id pour le mettre en clé primaire de la table particulier
        $id = $res->fetch(PDO::FETCH_OBJ)->id;

        // le reste des info pour la table particulier
        $res = $cnx->exec("INSERT INTO particulier (id, prenom, date_de_naissance) VALUES ($id, ".$cnx->quote($_GET['prenom']).", ".$cnx->quote($_GET['date_de_naissance']).")");

        // on enristre les modifications
        $cnx->commit();
        
        $msg = "le particulier a bien été ajouté";

    } catch (PDOException $e){
        $cnx->rollBack();
        $err = $e->getMessage();
    }
?>
