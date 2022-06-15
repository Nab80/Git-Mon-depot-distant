<?php
include "db/db.php";
$db = connectionBase();
$tableau = findDiscs();
// $JeanMichel = findArtists();
include "partials/header.php";
?>


<div class="container">
    <h1>Nous avons  <span class="text-primary"><?= count($tableau) ?></span>  Disques en stock : </h1>
    <table class="table table-striped">
        <tr>
            <th>Pochette</th>
            <th>Artistes</th>
            <th>Label</th>
            <th>Année</th>
            
        </tr>
        <!-- <?php
        // foreach ($tableau as $discs) {

        //     var_dump($discs);
        // // foreach($JeanMichel as $Artist) {
        // //     var_dump($Artist);

        // }
            
        // // }
        
        
        ?> -->



        <?php foreach ($tableau as $discs) : ?>
        <?php //foreach($JeanMichel as $Artist) : 
            
            // if ($Artist->artist_id == $discs->artist_id) {
            
            ?>

            <tr>
            <td class=""> <img src="<?= "/images/".$discs->disc_picture?>" class="card-img-top" style="width: 18rem" ></td>
                <td class=""><?= $discs->artist_name ?></td>
                <td class=""><?= $discs->disc_label ?></td>
                <td class=""><?= $discs->disc_year ?></td>
                <td class=""> <a class="btn btn-dark btn-sm" href="detail.php?id=<?= $discs->disc_id?>"  >Détail </svg></a> </td>
            </tr>

            <?php //} ?>

        <?php //endforeach; ?>
        <?php endforeach; ?> 
    </table>
</div>

<?php include "partials/footer.php";
