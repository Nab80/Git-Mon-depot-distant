<?php
require "db/db.php";
include "partials/header.php";
    $db = connectionBase();
    $requete = $db->prepare("SELECT * FROM disc inner join artist on disc.artist_id=artist.artist_id WHERE disc_id=?");
    $requete->execute(array($_GET["id"]));
    $disc = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();

    ?>



    <br>
    <br>

    <form method="post" action="script_disc_modif.php">

        <label for="nom_for_label">Nom de l'artiste :</label><br>
        <input type="text" name="nom" id="nom_for_label">
        <br><br>

        <label for="Année">Année de sortie :</label><br>
        <input type="text" name="year" id="year_for_label">
        <br><br>

        <label for="url_for_label">Adresse site internet :</label><br>
        <input type="text" name="url" id="url_for_label">
        <br><br>
        <input type="hidden" name="id" value="<?=$_GET["id"]?>">
        <input type="reset" value="Annuler">
        <input type="submit" value="Modifier">
        

    </form>

    <?php include "partials/footer.php";
?>
