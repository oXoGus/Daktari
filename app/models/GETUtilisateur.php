<?php
try {
    include($originDir.'/config/connexion_db.php');
    $resMU = $cnx ->query('SELECT username FROM user_db where id='.$uID);
} catch (Exception $e) {
    echo "Une erreur est survenue. L'utilisateur n'est pas accessible pour le moment. Veuillez reessayer.";
}
?>