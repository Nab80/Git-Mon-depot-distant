<?php
// TODO: Valeurs à modifier

use PhpParser\Node\Expr\Cast\Object_;

define( 'URL' , 'mysql:host=localhost;dbname=record;charset=utf8');
define('USER' , 'nabi');
define('PASS' , '8060*Empress');


function connectionBase() 
{
    try 
    {
        $connection = new PDO(URL,USER ,PASS );
        $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (Exception $e)
    {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die('Fin du script');
    }
}

function findArtists(){
    try {
        $db = connectionBase();
        $requete = $db->query("SELECT * FROM artist");
        // on récupère tous les résultats trouvés dans une variable
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
        // on clôt la requête en BDD
        $requete->closeCursor();
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die('Fin du script');
    }
    return $tableau;
}

// fonction de récupération
function findDiscs()
{
    $db = connectionBase();
    $requetePrep = $db->query("SELECT * FROM disc join artist on disc.artist_id = artist.artist_id");
    //$requetePrep2 = $db->query("SELECT * From artist"); 
    //$requetePrep->execute();
    $result = $requetePrep->fetchAll(PDO::FETCH_OBJ);
    $requetePrep->closeCursor();
    return $result;

  //  $result2 = $requetePrep2->fetchAll(PDO::FETCH_OBJ);
   // $requetePrep2->closeCursor();
    //var_dump($result);
   // return $result2;
}


// function findAllDiscs(){
//     $db = connectionBase();
//     $requete = $db->query("SELECT * FROM disc d join artist a on a.artist_id = d.artist_id");
//     $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
//     // on clôt la requête en BDD
//     $requete->closeCursor();
//     return $tableau;
// }

//function findDetails() {
    //$db = connectionBase();
    //$requete = $db->query("SELECT * FROM disc");
    //$tableau = $requete->fetchAll(PDO::FETCH_OBJ);  
   // $requete->closeCursor();
   // return $tableau;
//}
