
<?php
    try {
        
        // si l'utilisateur n'a rien rempis dans les champs pour la recherche
        // on fait une requete sans clause WHERE
        if (empty($_GET['nom']) && empty($_GET['adresse']) && empty($_GET['telephone']) && empty($_GET['mail']) && empty($_GET['adresse_site_web']) && empty($_GET['IBAN']) && empty($_GET['code'])) {
            $entrepriseTrouve = $cnx->query("SELECT id, nom, telephone, mail, adresse_site_web, libelle FROM responsable NATURAL JOIN professionnel NATURAL JOIN type_professionnel");
        } else {
            // sinon on met dans une liste tout les 'bout' de clause WHERE
            $whereClauseLst = array();
            $params = array();

            // pour chaque clé dans le GET et dans la liste des clause pour empécher les injections SQL
            $champsAccepte = ["nom", "adresse", "telephone", "IBAN", "code", "mail", "adresse_site_web"];

            foreach ($_GET as $champ => $val){
                
                if (in_array($champ, $champsAccepte) && !empty($val)){
                    // on utilise la LIKE pour facilité la recherche
                    $whereClauseLst[] = "$champ LIKE :$champ";
                    $params[$champ] = "%".$val."%";                    
                }
            }
            $requete = "SELECT id, nom, telephone, mail, adresse_site_web, libelle FROM responsable NATURAL JOIN professionnel NATURAL JOIN type_professionnel WHERE " . implode(' AND ', $whereClauseLst);

            // on utilise le implode pour faire la clause where dynamiquement
            $entrepriseTrouve = $cnx->prepare($requete);
            $res = $entrepriseTrouve->execute($params);            
        }
    } catch (PDOException $e){
        $err = $e->getMessage();    
    }
?>