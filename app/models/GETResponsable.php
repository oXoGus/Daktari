<?php
try {
    include($originDir.'/config/connexion_db.php');
    $resResp = $cnx ->query('SELECT id, nom FROM responsable GROUP BY id');
} catch (Exception $e) {
    echo "Une erreur est survenue. Le responsable cherché n'est pas accessible pour le moment.Veuillez réessayer";
}
?>