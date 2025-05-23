<?php 
    include($originDir."/config/connexion_db.php"); // connextion a la db
    
    try {
        // on commence une transaction puisque l'on doit faire deux requete 
        $cnx->beginTransaction();
        
        // on fait une première requete pour la table responsable
        $res = $cnx->query("INSERT INTO responsable (nom, adresse, telephone, mail) VALUES (".$cnx->quote($_GET['nom']).", ".$cnx->quote($_GET['adresse']).", ".$cnx->quote($_GET['telephone']).", ".$cnx->quote($_GET['mail']).") RETURNING id");
        
        // on récup l'id pour le mettre en clé primaire de la table professionnel
        $id = $res->fetch(PDO::FETCH_OBJ)->id;


        $res = $cnx->exec("INSERT INTO professionnel (id, code, adresse_site_web, IBAN) VALUES ($id, ".$cnx->quote($_GET['code']).", ".$cnx->quote($_GET['adresse_site_web']).", ".$cnx->quote($_GET['IBAN']).")");

        // on enristre les modifications
        $cnx->commit();
        
        $msg = "l'entreprise a bien ajouté";

    } catch (PDOException $e){
        $cnx->rollBack();
        echo "Vérifiez que les champs sont remplis et ne contiennent pas de caractères spéciaux. Veuillez réessayer ";
    }
?>
