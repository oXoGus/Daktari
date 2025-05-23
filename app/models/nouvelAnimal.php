<?php
    //on essaye de se connecter à la base de données
    include($originDir.'/config/connexion_db.php');
    
    try {

        $cnx->beginTransaction();

        // on créer la chaine pour l'insertion
        $inputAnimalCol="(";
        $inputAnimalVal = "(";
        $sep = "";
        foreach ($nouvelAnimal as $cle => $val){
            $inputAnimalCol .= $sep . $cle;
            $inputAnimalVal .= $sep . ":" . $cle;
            $sep = ", ";
        }
        $inputAnimalCol .= ")";
        $inputAnimalVal .= ")";
        $sql = "INSERT INTO animaux $inputAnimalCol VALUES $inputAnimalVal RETURNING id";
        $animalAdd = $cnx->prepare($sql);
        $animalAdd->execute($nouvelAnimal);
        $animal_id = $animalAdd->fetch(PDO::FETCH_OBJ)->id;

        // si un vaccin a été reseigné
        if (isset($_GET['vaccin'])){
            
            $insert = $cnx->prepare("INSERT INTO vacciner VALUES ( :animal_id, :vaccin, :date_vaccin)");
            $insert->execute(["animal_id" => $animal_id, "vaccin" => $_GET['vaccin'], "date_vaccin" => (isset($_GET['date_vaccin']) && !empty($_GET['date_vaccin'])) ? $_GET['date_vaccin'] : null]);
        }

        $cnx->commit();

        $msg = "l'animal à bien été ajouté";

        
        //on renvoit le resultat obtenu au controleur
    } catch (PDOException $e){
        $cnx->rollBack();
        $err = "Vérifiez que les champs sont remplis et ne contiennent pas le caractère ' ";
    }
    
?>