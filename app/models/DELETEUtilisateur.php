<?php
    include($originDir.'/config/connexion_db.php');
    $resDU = $cnx ->query("DELETE FROM user_db WHERE id=".$u);
?>