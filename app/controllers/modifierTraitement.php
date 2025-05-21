<?php
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté
    $modifT=array();
    if ($infosMT[0]->produit != $_GET["produit"]){  
        $modifT["produit"]="'".($_GET["produit"])."'";
    }
    if ($infosMT[0]->dilution != $_GET["dilution"]){  
        $modifT["dilution"]=$_GET["dilution"];
    }
    if ($infosMT[0]->dose != $_GET["dose"]){  
        $modifT["dose"]=$_GET["dose"];
    }
    if ($infosMT[0]->duree_traitement != $_GET["duree_traitement"]){  
        $modifT["duree_traitement"]=$_GET["duree_traitement"];
    }
    if ($infosMT[0]->frequence != $_GET["frequence"]){  
        $modifT["frequence"]=$_GET["frequence"];
    }
    if ($infosMT[0]->quand != $_GET["quand"]){  
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
    }
    include($originDir."/app/views/modifierTraitement.php");
    ?>
