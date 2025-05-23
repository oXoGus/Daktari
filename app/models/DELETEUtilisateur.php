<?php
try {
    include($originDir.'/config/connexion_db.php');
    $resDU = $cnx ->query("DELETE FROM user_db WHERE id=".$u);
} catch (Exception $e) {
    echo "Une erreur est survenue, il se peut que l'utilisateur soit déjà supprimé ou inaccessible. Veuillez réessayer";
}
?>