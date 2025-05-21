<?php
    include($originDir.'/config/connexion_db.php');
    $resDT = $cnx ->query("DELETE FROM traitement_consult WHERE traitement_id=".$t);
    $resDT = $cnx ->query("DELETE FROM traitement WHERE id=".$t);
?>