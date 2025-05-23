<?php
//on essaye de se connecter à la base de données
try {
    include($originDir.'/config/connexion_db.php');
    $addU = $cnx -> query($addUser);
} catch (Exception $e) {
    echo "Vérifiez que les champs sont remplis et ne contiennent pas de caractères spéciaux. Veuillez réessayer ";
}

?>