<?php
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté

    //On récupère les infos pour pouvoir les afficher
    $aID = $_GET["id"];
    include($originDir."/app/models/GETAnimal.php");
    $infosMA = $resMA -> fetchAll(PDO::FETCH_OBJ);

    //On affiche tous les vaccins
    include($originDir."/app/models/GETVaccins.php");
    $rowsVaccins=$resVaccins->fetchAll(PDO::FETCH_OBJ);

    //On va chercher le vaccin que id_animal a fait 
    include($originDir."/app/models/GETVaccinAnimal.php");
    $rowsAnimalVaccin = $resVaccinAnimal->fetchAll(PDO::FETCH_OBJ);
    
    //ON récupère les vaccins effectuer par l'animal
    if (!empty($rowsAnimalVaccin)){
        $selectedVaccin = $rowsAnimalVaccin[0]->nom_vaccin;
    }

    // on recherche si le responsable de l'animal est un particulier ou un professionnel
    $idResp = $infosMA[0]->id_responsable;
    $particulierLst = $cnx->query("SELECT * FROM particulier WHERE id = $idResp");
    $isParticulier = $particulierLst->rowCount() == 1;

    //Recherche des modifications effectuées 
    $modifA=array();
    $parametresA=[];
    if (isset($_GET['save'])) {
        if ($infosMA[0]->nom != $_GET["nom"]){
            $modifA["nom"]="nom=:nom";
            $parametresA[':nom']=$_GET['nom'];
        }
        if ($infosMA[0]->espece != $_GET["espece"]){  
            $modifA["espece"]="espece=:espece";
            $parametresA[':espece']=$_GET['espece'];
        }
        if ($infosMA[0]->race != $_GET["race"]){  
            $modifA["race"]="race=:race";
            $parametresA[':race']=$_GET['race'];
        }
        if ($infosMA[0]->genre != $_GET["genre"]){  
            $modifA["genre"]="genre=:genre";
            $parametresA[':genre']=$_GET['genre'];
        }
        if ($infosMA[0]->castre != $_GET["castre"]){  
            $modifA["castre"]="castre=:castre";
            $parametresA[':castre']=$_GET['castre'];
        }
        if ($infosMA[0]->taille != $_GET["taille"]){  
            $modifA["taille"]="taille=:taille";
            $parametresA[':taille']=$_GET['taille'];
        }
        if ($infosMA[0]->poids != $_GET["poids"]){  
            $modifA["poids"]="poids=:poids";
            $parametresA[':poids']=$_GET['poids'];
        }
        if ($infosMA[0]->responsable != $_GET["responsable"]){  
            $modifA["responsable"]="id_responsable=:responsable";
            $parametresA[':responsable']=$_GET['responsable'];
        }
        $reqUA = implode(", ", $modifA);
    }
    if (!empty($modifA)) {
        include($originDir."/app/models/UPDATEAnimal.php");
        
        // on refait la requete pour afficher les donnés modifier
        include($originDir."/app/models/GETAnimal.php");
        $infosMA = $resMA -> fetchAll(PDO::FETCH_OBJ);
    }
    include($originDir."/app/views/modifierAnimal.php");
    ?>
