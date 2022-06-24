<?php
    // Récupération des valeurs :
    $id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
    $nom = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom'] : Null;
    $url = (isset($_POST['url']) && $_POST['url'] != "") ? $_POST['url'] : Null;
    $year = (isset($_POST['year']) && $_POST['year'] != "") ? $_POST['year'] : Null;

    print_r($_POST);


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
        $requete = $db->prepare("UPDATE artist SET artist_id = :nom, artist_url = :url, SET Sdisc_year=:year WHERE disc_id = :id;");
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
        $requete->bindValue(":url", $url, PDO::PARAM_STR);
        $requete->bindValue(":year", $year, PDO::PARAM_STR);


        $requete->execute();
        $requete->closeCursor();
    }

    catch (Exception $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_modif.php)");
    }

    // Si OK: redirection vers la page artist_detail.php
    //header("Location: detail.php?id=" . $id);
    //exit;