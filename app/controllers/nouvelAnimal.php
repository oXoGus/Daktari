<?php

    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté

    //On ajoute les variables de recherche
    $nouvelAnimal=array();
    if (!empty($_GET["resp"])) {
        $nouvelAnimal["responsable"]=$_GET["resp"];
    }
    if (!empty($_GET["nom"])) {
        $nouvelAnimal["name"]=$_GET["nom"];
    }
    if (!empty($_GET["espece"])) {
        $nouvelAnimal["espece"]=$_GET["espece"];
    }
    if (!empty($_GET["race"])) {
        $nouvelAnimal["race"]=$_GET["race"];
    }
    if (!empty($_GET["genre"])) {
        $nouvelAnimal["genre"]=$_GET["genre"];
    }
    if (!empty($_GET["taille"])) {
        $nouvelAnimal["taille"]=$_GET["taille"];
    }
    if (!empty($_GET["poids"])) {
        $nouvelAnimal["poids"]=$_GET["poids"];
    }
    if (!empty($_GET["vaccin"])) {
        $nouvelAnimal["vaccin"]=$_GET["vaccin"];
    }
    if (empty($nouvelAnimal)) {
        include($originDir."/app/views/nouvelAnimal.php");
    }
    else {
        $inputAnimal="('".$_GET["nom"]."', '".$_GET["espece"]."', '".$_GET["race"]."', '".$_GET["genre"]."', '".$_GET["castre"]."', ".$_GET["taille"].", ".$_GET["poids"].", ".$_GET["resp"].")";
        //On ajoute le nouvel animal
        include($originDir."/app/models/nouvelAnimal.php");
        //C'est bon jusq'ici
        $idAnimal =$animalAdd->fetchALL(PDO::FETCH_OBJ);
        $inputVaccin = "INSERT INTO vacciner VALUES (".$idAnimal[0]->id.", '".$nouvelAnimal['vaccin']."', '".$_GET['dateVaccin']."')";
        include($originDir."/app/models/INSERTVaccin.php");
        include($originDir."/app/views/nouvelAnimal.php");
    }
?>
