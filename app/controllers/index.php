<?php
session_start();
    //On vérifie que l'utilisateur ait bien rempli son login et son mot de passe
    if (!empty($_GET['login']) && !empty($_GET['mdp'])) {

        //On recupère les infos de connexion de l'user
        $login = $_GET['login'];
        $password = $_GET['mdp'];

        //On tente la connexion, on appel donc le model
        include($originDir.'/app/models/index.php');

        //S'il n'y a pas de login et mdp correspondant
        if ($res->rowCount() == 0) {
            //On retourne une erreur sur l'écran et on renvoit le formulaire
            $err = "login ou mot de passe incorrect";
            include($originDir.'/app/view/index.php');
            exit;
        }

        //sinon on récupère les données de la première ligne du résultat 
        $user = $res-> fetch(PDO::FETCH_OBJ);
        $_SESSION['login']= $login;
        $_SESSION['mdp']=$user->password_hash;

        //on redirige l'user vers la page d'accueil
        header('location: /public/home.php');
        exit;
    }
    //Si l'utilisateur n'a pas rempli le formulaire
    else {
        //On va donc déconnecter l'user
        //Si il est connecté alors 
        if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
            unset($_SESSION['login']);
            unset($_SESSION['mdp']);
        }
        //On affiche de nouveau le formulaire de connexion
        include($originDir.'/app/views/index.php');
    }
?>