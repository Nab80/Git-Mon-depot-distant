<?php
    // Récupération des valeurs :
    $id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
    $nom = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom'] : Null;
    $url = (isset($_POST['url']) && $_POST['url'] != "") ? $_POST['url'] : Null;
    $year = (isset($_POST['year']) && $_POST['year'] != "") ? $_POST['year'] : Null;
    $label = (isset($_POST['label']) && $_POST['label'] != "") ? $_POST['label'] : Null;
    $genre = (isset($_POST['genre']) && $_POST['genre'] != "") ? $_POST['genre'] : Null;
    $title = (isset($_POST['title']) && $_POST['title'] != "") ? $_POST['title'] : Null;
    $price = (isset($_POST['price']) && $_POST['price'] != "") ? $_POST['price'] : Null;
    $id = $_POST['id'];
var_dump($year);
var_dump($title);
var_dump($genre);
var_dump($label);

    




    // En cas d'erreur, on renvoie vers le formulaire
    if ($id == Null) {
        header("Location: disc_form.php");
    }
    /*elseif ($nom == Null || $url == Null) {
        header("Location: disc_form.php?id=".$id);
        exit;
    }*/

    // Si la vérification des données est ok :
    require "db/db.php"; 
    $db = connectionBase();

    try {
        // Construction de la requête UPDATE sans injection SQL :
        $requete = $db->prepare("UPDATE disc SET disc_year=:year, disc_title = :title, disc_label = :label, disc_genre = :genre,
        disc_price = :price WHERE disc_id = $id");

        //$requete2 = $db->prepare("UPDATE disc SET disc_label=:label WHERE disc_id = :id;");

        $requete->bindValue(":title", $title, PDO::PARAM_INT);
        $requete->bindValue(":year", $year, PDO::PARAM_STR);
        $requete->bindValue(":label", $label, PDO::PARAM_STR);
        $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
        $requete->bindValue(":price", $price, PDO::PARAM_INT);

        //$requete2->bindValue(":label", $label, PDO::PARAM_STR);




        $requete->execute();
        //$requete2->execute();

        $requete->closeCursor();
       // $requete2->closeCursor();
    }

    catch (Exception $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_modif.php)");
    }

    // Si OK: redirection vers la page artist_detail.php
    header("Location: detail.php?id=" . $id);
    exit;