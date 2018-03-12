<?php

    /**
     * @param $co connexion bdd
     * @return PDO
     */
    function getPDO($co)
    {
        $pdo=$co;
        if($pdo === null)
        {
            $pdo = new PDO('mysql:host=localhost;dbname=parc', 'root', '');
            $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return $pdo;

    }


    /**
     * @param $co connexion dbb
     * @param $requete_sql la requete de recherche
     * @return array du resulta
     */
    function rechrche($co, $requete_sql){
          //Connexion Ã  la bdd :
          $pdo = getPDO($co);
          //On prÃ©pare la requÃªte (entre autre contre les injections avec pdo->prepare)
          $requete = $pdo->prepare($requete_sql);
          //On effectue la requete
          $requete->execute();
          //On met sous forme d'objet la rÃ©ponse Ã  la reqÃªte
          $resulta = $requete->fetch(PDO::FETCH_ASSOC);
          //on retourne le resulta
          return $resulta;

        }
   function rechrcheall($co, $requete_sql){
          //Connexion Ã  la bdd :
          $pdo = getPDO($co);
          //On prÃ©pare la requÃªte (entre autre contre les injections avec pdo->prepare)
          $requete = $pdo->prepare($requete_sql);
          //On effectue la requete
          $requete->execute();
          //On met sous forme d'objet la rÃ©ponse Ã  la reqÃªte
          $resulta = $requete->fetchall(PDO::FETCH_ASSOC);
          //on retourne le resulta
          return $resulta;

        }


    /**
     * @param $co
     * @param $requete_sql pour l'nssersion
     *
     */
    function inssertion($co, $requete_sql){
          //Connexion Ã  la bdd :
          $pdo = getPDO($co);
          //On prÃ©pare la requÃªte (entre autre contre les injections avec pdo->prepare)
          $requete = $pdo->prepare($requete_sql);
          //On effectue la requete
          $requete->execute();
          return $requete;
    }

/**
 * @param $co
 * @param $requete_sql requete de suppression
 * 
 */
function supprime($co, $requete_sql){
        //Connexion Ã  la bdd :
        $pdo = getPDO($co);
        //On prÃ©pare la requÃªte (entre autre contre les injections avec pdo->prepare)
        $requete = $pdo->prepare($requete_sql);
        //On effectue la requete
        $requete->execute();
    }

        function modification($co,$requete_sql)
        {
          //Connexion Ã  la bdd :
          $pdo = getPDO($co);
          //On prÃ©pare la requÃªte (entre autre contre les injections avec pdo->prepare)
          $requete = $pdo->prepare($requete_sql);
          //On effectue la requete
          $requete->execute();
          return $requete;

        }




    ?>
