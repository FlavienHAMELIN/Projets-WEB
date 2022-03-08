<?php

    session_start();



    try
    {
        $database = new PDO('mysql:host=localhost;dbname=site-e-commerce', 'root', 'root');
        $database->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //Les noms de champs sont en caractères minuscules
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //les erreurs lancent des exceptions
    }
    catch(Exception $e)
    {
        die('Une erreur dans la base de donnée site-e-commerce est survenue');
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
    <header>
        <br/><h1>Flayuki Shop</h1><br/>
        <ul class="menu">
            <li><a href="index2.php">Accueil</a></li>
            <li><a href="boutique.php?allproducts=1">Boutique</a></li>
            <li><a href="panier.php">Panier</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <li><a href="connexion.php">Mon profil</a></li>

        </ul>
    </header>
</html>
