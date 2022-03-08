<?php

    require_once('includes/header.php');
    require_once('includes/functions_panier.php');

    if( $_SESSION['online'] != 1)
    {
        header("Location: connexion.php");
    }
    else if(isset($_POST['submit']))
    {
        $num = $_POST['num'];
        $date = $_POST['date'];
        $cryptogramme = $_POST['cryptogramme'];

        if($_SESSION['panier'] != NULL)
        {
            if($num && $date && $cryptogramme)
            {
                $prix = montantGlobal();
                $id_membre = $_SESSION['id'];
                $nb_articles = nombreArticlesTotal();
                $inserttransactions = $database->prepare("INSERT INTO transactions(id_membre, nb_articles, prix) VALUES(?, ?, ?)");
                $inserttransactions->execute((array($id_membre, $nb_articles, $prix)));

                $erreur = "Paiement effectué, votre panier est maintenant vide.";
                $_SESSION['panier'] = NULL;

            }
            else
            {
                $erreur = "Veuillez remplir tous les champs";
            }
        }
        else
        {
            $erreur = " Votre panier est vide !";
        }
    }
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


<form action="" method="post" enctype="multipart/form-data">
    <br/>
    <h3>Montant à payer : <?php echo montantGlobal(); ?> €</h3><br/><br/>
    <h3>Numéro de carte :</h3><input type="text" name="num"/>
    <h3>Date d'expiration :</h3><input type="month" name="date"></input>
    <h3>Cryptogramme visuel :</h3><input type="text" name="cryptogramme"/><br/><br/>
    <input type="submit" name="submit" value="Payer"/><br/><br/>
</form>
 <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>

<?php
    require_once('includes/footer.php');
?>