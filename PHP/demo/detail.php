<?php
    // On se connecte à la BDD via notre fichier db.php :
    // var_dump($_GET);
    // die;
    require "db/db.php";
    $db = connectionBase();

    // // version no-sécurisée
    // $requete = $db->query("SELECT * FROM disc where disc_id=" . $_GET["id"]);

    // version sécurisée
    $requete = $db->prepare("SELECT * FROM disc where disc_id=?");
    $requete->bindValue(1, $_GET["id"]);
    $requete->execute();

    $disc = $requete->fetch(PDO::FETCH_OBJ);  
    $requete->closeCursor();
    // return $tableau;

include "partials/header.php";

?>
<div class="container">
    <h1>FICHE <span class="text-primary"></span>  ARTISTE <?= $_GET["id"]?></h1>
<div class="row">


        <div class="col-3 bg-black text-danger card m-2 p-0" style="width: 25rem;">
            <div class="card-header">Album : <?=$disc->disc_title?></div>
            <img src="<?= "images/".$disc->disc_picture?>" class="card-img-top" alt="pochette" style="width: 25rem" >
            <p class="card-text"><b>Année de sortie :</b> <?= $disc->disc_year ?></p>
            <p class="card-text"><b>Genre :</b> <?= $disc->disc_genre ?></p>
            <p class="card-text"><b>Prix :</b> <?= $disc->disc_price ?></p>
            <p class="card-text"><b>Label :</b> <?= $disc->disc_label ?></p>

        <p class="card-text"><b><?php echo $disc->disc_id ?></p>

</div>

   
<!--<button type="button" >Primary</button>  -->    
<a href="disc_form.php?id=<?= $disc->disc_id ?>" type="button" class="btn btn-primary" >Modifier</a>   



<?php
include "partials/footer.php";
?>


