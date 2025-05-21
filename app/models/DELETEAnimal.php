<?php
    include($originDir.'/config/connexion_db.php');
    //$resDA = $cnx ->query("DELETE FROM traitement_consult WHERE traitement_id=".$a);
    $cnx ->prepare("DELETE FROM traiter WHERE animal_id=:id")->execute(['id' => $a]);
    $cnx ->prepare("DELETE FROM vacciner WHERE animal_id=:id")->execute(['id' => $a]);
    $cnx ->prepare("DELETE FROM animaux WHERE id=:id")->execute(['id' => $a]);
?>