<?php
try {
    //on essaye de se connecter à la base de données
    include($originDir.'/config/connexion_db.php');

    //On fait une requête de vérification pour savoir si le login et le mdp existe
    //On récupère le hash
    $animalAdd = $cnx->query("INSERT INTO animaux (nom, espece, race, genre, castre, taille, poids, id_responsable)  VALUES ".$inputAnimal. " RETURNING id");
    //on renvoit le resultat obtenu au controleur
} catch (Exception $e) {
    echo "Vérifiez que les champs sont remplis et ne contiennent pas le caractère ' ";
}
?>