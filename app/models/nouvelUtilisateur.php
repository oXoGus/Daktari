<?php
try {
    $addU = $cnx->prepare("INSERT INTO user_db (username, password_hash) VALUES (:username, md5(:mdp))");
    $addU->execute(["username" => $_GET['username'], "mdp" => $_GET['mdp']]);
    $msg = "l'utilisateur à bien été ajouté";
} catch (PDOException $e) {
    $err = "Ce nom d'utilisateur est déja pris";
}

?>