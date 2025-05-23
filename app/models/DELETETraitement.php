<?php
try {
    include($originDir.'/config/connexion_db.php');
    $resDT = $cnx ->query("DELETE FROM traitement WHERE id=".$t);
} catch (Exception $e) {
    echo "Une erreur est survenue, il se peut que le traitement soit déjà supprimé ou inaccessible. Veuillez réessayer";
}
?>