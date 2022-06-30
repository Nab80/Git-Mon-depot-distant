<?php

require "db/db.php"; 
$db = connectionBase();


    // Récupération des valeurs :
    $id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
    $nom = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom'] : Null;
    $year = (isset($_POST['year']) && $_POST['year'] != "") ? $_POST['year'] : Null;
    $label = (isset($_POST['label']) && $_POST['label'] != "") ? $_POST['label'] : Null;
    $genre = (isset($_POST['genre']) && $_POST['genre'] != "") ? $_POST['genre'] : Null;
    $title = (isset($_POST['title']) && $_POST['title'] != "") ? $_POST['title'] : Null;
    $price = (isset($_POST['price']) && $_POST['price'] != "") ? $_POST['price'] : Null;
    //$picture = (isset($_POST['picture']) && $_POST['picture'] != "") ? $_POST['picture'] : Null;
    

    // En cas d'erreur, on renvoie vers le formulaire
    if ($nom == Null || $price == Null)  {
        header("Location: disc_new.php");
    }
    else{
        //var_dump($_POST);
        header("Location: index.php");
       // exit;
    }

    // Si la vérification des données est ok :


    try {
        // Construction de la requête INSERT sans injection SQL :
        $requete = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_genre, disc_label, disc_price) VALUES (:title, :year, :genre, :label, :price)");

        //$requete2 = $db->prepare("INSERT disc SET disc_label=:label WHERE disc_id = :id;");
    
        $requete->bindValue(":title", $title, PDO::PARAM_STR);
        $requete->bindValue(":year", $year, PDO::PARAM_INT);
        $requete->bindValue(":label", $label, PDO::PARAM_STR);
        $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
        $requete->bindValue(":price", $price, PDO::PARAM_INT);
        //$requete->bindValue(":picture", $picture, PDO::PARAM_STR);
        
    
        $requete->execute();
        //$requete2->execute();
    
        $requete->closeCursor();
       // $requete2->closeCursor();
    }

    catch (Exception $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_new.php)");
    }

    // Si OK: redirection vers la page artist_detail.php
    header("Location: detail.php?id=" . $id);
    exit;