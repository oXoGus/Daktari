
<?php
    try {
        
        // si l'utilisateur n'a rien rempis dans les champs pour la recherche
        // on fait une requete sans clause WHERE
        if (empty($_GET['nom']) && empty($_GET['adresse']) && empty($_GET['telephone']) && empty($_GET['mail']) && empty($_GET['adresse']) && empty($_GET['date_de_naissance']) && empty($_GET['prenom'])) {
            $particulierTrouve = $cnx->query("SELECT id, nom, telephone, mail, prenom, date_de_naissance, adresse FROM responsable NATURAL JOIN particulier");
        } else {
            // sinon on met dans une liste tout les 'bout' de clause WHERE
            $whereClauseLst = array();
            $params = array();

            // pour chaque clé dans le GET et dans la liste des clause pour empécher les injections SQL
            $champsAccepte = ["nom", "adresse", "telephone", "prenom", "date_de_naissance", "mail"];

            foreach ($_GET as $champ => $val){
                
                if (in_array($champ, $champsAccepte) && !empty($val)){
                    // on utilise la LIKE pour facilité la recherche
                    $whereClauseLst[] = "$champ LIKE :$champ";
                    $params[$champ] = "%".$val."%";                    
                }
            }
            $requete = "SELECT id, nom, telephone, mail, prenom, date_de_naissance, adresse FROM responsable NATURAL JOIN particulier WHERE " . implode(' AND ', $whereClauseLst);

            // on utilise le implode pour faire la clause where dynamiquement
            $particulierTrouve = $cnx->prepare($requete);
            $res = $particulierTrouve->execute($params);            
        }
    } catch (PDOException $e){
        $err = $e->getMessage();    
    }
?>