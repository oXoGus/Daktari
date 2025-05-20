
<?php
    try {
        
        // si l'utilisateur n'a rien rempis dans les champs pour la recherche
        // on fait une requete sans clause WHERE
        if (empty($_GET['code']) && empty($_GET['tarif']) && empty($_GET['duree'])) {
            $manipTrouve = $cnx->query("SELECT code, ROUND(tarif/100, 0) tarif, duree FROM manipulation");
        } else {
            // sinon on met dans une liste tout les 'bout' de clause WHERE
            $whereClauseLst = array();
            $params = array();

            // pour chaque clé dans le GET et dans la liste des clause pour empécher les injections SQL
            $champsAccepte = ["code", "tarif", "duree"];

            foreach ($_GET as $champ => $val){
                
                if (in_array($champ, $champsAccepte) && !empty($val)){
                    
                    // clause dynamique en fonction du _GET
                    $whereClauseLst[] = "$champ = :$champ";
                    $params[$champ] = $val;                    
                }
            }
            $requete = "SELECT code, ROUND(tarif/100, 0) tarif, duree FROM manipulation WHERE " . implode(' AND ', $whereClauseLst);

            // on utilise le implode pour faire la clause where dynamiquement
            $manipTrouve = $cnx->prepare($requete);
            $res = $manipTrouve->execute($params);            
        }
    } catch (PDOException $e){
        $err = $e->getMessage();    
    }
?>