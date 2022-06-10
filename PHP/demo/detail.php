<?php
include "db/db.php";

//On teste si on a un ou plusieurs disques
if (isset($_GET["id"]) && isset($_GET["name"])) {
    $discs = findDiscs($_GET["id"]);

    if (count($discs) <= 0) header('Location: 404.php');
} else {
    header('Location: 404.php');
}


include "partials/header.php";

?>
<div class="container">
    <h1>Nous avons  <span class="text-primary"><?= count($discs) ?></span>  disques de <?= $_GET["name"]?></h1>
<div class="row">
    <?php
    foreach ($discs as $disc) {
    ?>
        <div class="col-3 bg-primary text-white card m-2 p-0" style="width: 18rem;">
            <div class="card-header"><?=$disc->disc_title?></div>
            <img src="<?= "images/".$disc->disc_picture?>" class="card-img-top" alt="pochette" style="height: 18rem" >
        </div>


    <?php } ?>

</div>

</div>


<?php
include "partials/footer.php";
?>