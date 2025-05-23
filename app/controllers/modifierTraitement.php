<?php
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté
    
    // on recup les info du traitement
    if (isset($_GET['id'])) {
        $infosMT = $cnx->prepare("SELECT * FROM traitement WHERE id = :id");
        $infosMT->execute(["id" => $_GET['id']]);
        $infosMT = $infosMT->fetchAll(PDO::FETCH_OBJ);

        // si il n'y a aucun traitement avec cet id 
        if(empty($infosMT)){
            
            // retour a la recherche
            header("location: ".(isset($_SESSION['rechercheParam']) ? $_SESSION['rechercheParam'] : "rechercherTraitement.php"));   
            exit;
        }

        $modifT=array();
        if (isset($_GET["produit"]) && $infosMT[0]->produit != $_GET["produit"]){  
            $modifT["produit"]="'".($_GET["produit"])."'";
        }
        if (isset($_GET["dilution"]) &&  $infosMT[0]->dilution != $_GET["dilution"]){  
            $modifT["dilution"]=$_GET["dilution"];
        }
        if (isset($_GET["dose"]) && $infosMT[0]->dose != $_GET["dose"]){  
            $modifT["dose"]=$_GET["dose"];
        }
        if (isset($_GET["duree_traitement"]) && $infosMT[0]->duree_traitement != $_GET["duree_traitement"]){  
            $modifT["duree_traitement"]=$_GET["duree_traitement"];
        }
        if (isset($_GET["frequence"]) && $infosMT[0]->frequence != $_GET["frequence"]){  
            $modifT["frequence"]=$_GET["frequence"];
        }
        if (isset($_GET["quand"]) && $infosMT[0]->quand != $_GET["quand"]){  
            $modifT["quand"]="'".$_GET["quand"]."'";
        }
        $reqUT = "";
        $sq = "";
        foreach($modifT as $a => $b) {
            $reqUT.=$sq.$a.'='.$b;
            $sq=", ";
        }
        if (!empty($modifT)) {
            include($originDir."/app/models/UPDATETraitement.php");

            // on refait la requete avec les donnés mises a jour
            $infosMT = $cnx->prepare("SELECT * FROM traitement WHERE id = :id");
            $infosMT->execute(["id" => $_GET['id']]);
            $infosMT = $infosMT->fetchAll(PDO::FETCH_OBJ);

            
        }
        include($originDir."/app/views/modifierTraitement.php");

        
    } else {
        
        // retour a la recherche
        header('location: rechercherTraitement.php');
        exit;
    }

    
    ?>
