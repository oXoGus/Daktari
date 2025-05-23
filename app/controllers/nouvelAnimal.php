<?php

    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté

    //On ajoute les variables de recherche
    $nouvelAnimal=array();
    if (isset($_GET['resp']) && !empty($_GET["resp"])) {
        $nouvelAnimal["id_responsable"]=$_GET["resp"];
    }
    if (isset($_GET['resp']) && !empty($_GET["nom"])) {
        $nouvelAnimal["name"]=$_GET["nom"];
    }
    if (isset($_GET['resp']) && !empty($_GET["espece"])) {
        $nouvelAnimal["espece"]=$_GET["espece"];
    }
    if (isset($_GET['resp']) && !empty($_GET["race"])) {
        $nouvelAnimal["race"]=$_GET["race"];
    }
    if (isset($_GET['resp']) && !empty($_GET["genre"])) {
        $nouvelAnimal["genre"]=$_GET["genre"];
    }
    if (isset($_GET['resp']) && !empty($_GET["taille"])) {
        $nouvelAnimal["taille"]=$_GET["taille"];
    }
    if (isset($_GET['resp']) && !empty($_GET["poids"])) {
        $nouvelAnimal["poids"]=$_GET["poids"];
    }
    if (empty($nouvelAnimal)) {
        include($originDir."/app/views/nouvelAnimal.php");
    }
    else {
        
        //On ajoute le nouvel animal
        include($originDir."/app/models/nouvelAnimal.php");
        //C'est bon jusq'ici
        $idAnimal =$animalAdd->fetchALL(PDO::FETCH_OBJ);
        $inputVaccin = "INSERT INTO vacciner VALUES (".$idAnimal[0]->id.", '".$nouvelAnimal['vaccin']."', '".$_GET['dateVaccin']."')";
        include($originDir."/app/models/INSERTVaccin.php");
        include($originDir."/app/views/nouvelAnimal.php");
    }
?>
