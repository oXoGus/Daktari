<?php
try {
    //on essaye de se connecter à la base de données
    include($originDir.'/config/connexion_db.php');

    //On fait une requête de vérification pour savoir si le login et le mdp existe
    //On récupère le hash
    $res = $cnx->query("SELECT * FROM user_db WHERE username=".$cnx->quote($login)." and password_hash = md5(".$cnx->quote($password).")");
    //on renvoit le resultat obtenu au controleur
} catch (Exception $e) {
    $err = "Vérifiez que les champs sont remplis et que les logins soient correctes. Veuillez réessayer ";
}
?>