<?php

    require_once('includes/header.php');
    require_once('includes/functions_panier.php');

    $erreur=false;

    $action = (isset($_POST['action'])?$_POST['action']:(isset($_GET['action'])?$_GET['action']:null));

    if($action!==null)
    {
        if(!in_array($action, array('ajout','suppression','refresh')))

        $erreur=true;

        $l = (isset($_POST['l'])?$_POST['l']:(isset($_GET['l'])?$_GET['l']:null));
        $p = (isset($_POST['p'])?$_POST['p']:(isset($_GET['p'])?$_GET['p']:null));
        $q = (isset($_POST['q'])?$_POST['q']:(isset($_GET['q'])?$_GET['q']:null));

        $l = preg_replace('#\v#','',$l);
        $p = floatval($p);

        if(is_array($q))
        {
            $QteProduit = array();
            $i = 0;
            foreach ($q as $contenu)
            {
                $QteProduit[$i++] = intval($contenu);
            }
        }
        else
        {
            $q = intval($q);
        }

    }

    if(!$erreur)
    {

        switch($action)
        {
            Case 'ajout':
            {

                ajouterArticle($l,$q,$p);
                break;
            }
            Case 'suppression':
            {
                supprimerArticle($l);
                break;
            }
            Case 'refresh':
            {
                for($i = 0; $i<count($QteProduit);$i++)
                {
                    modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteProduit[$i]));
                }
            }
            Default:
            {
                break;
            }
        }
    }

    ?>

    <form method="post" action="">
        <table width="800">
            <tr>
                <td colspan="4">Votre panier</td>
            </tr>
            <tr>
                <td>Libellé produit</td>
                <td>Prix unitaire</td>
                <td>Quantité</td>
                <td>Modifier la quantité</td>
                <td>Action</td>
            </tr>
            <?php

                if(isset($_GET['deletepanier']) && $_GET['deletepanier']==true)
                {
                    supprimerPanier();
                }

                if(creationPanier())
                {

                    $nbProduits = count($_SESSION['panier']['libelleProduit']);
                    if($nbProduits<=0)
                    {
                        echo "<p style='font-size:20px; color:Red;'>Oups, panier vide !</p>";
                    }
                    else
                    {
                        for($i=0;$i<$nbProduits;$i++)
                        {
                            ?>

                            <tr>
                                <td><br/><?php echo $_SESSION['panier']['libelleProduit'][$i];?></td>
                                <td><br/><?php echo $_SESSION['panier']['prixProduit'][$i]; ?></td>
                                <td><br/><?php echo $_SESSION['panier']['qteProduit'][$i]; ?></td>
                                <td><br/><input name="q[]" value="<?php echo $_SESSION['panier']['qteProduit'][$i] ?>"/></td>
                                <td><br/><a href="panier.php?action=suppression&amp;l=<?php echo rawurlencode($_SESSION['panier']['libelleProduit'][$i]); ?>">X</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td colspan="2">
                                <br/>
                                <p>Total : <?php echo montantGlobal(); ?> €</p>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <a href="?deletepanier=true">Supprimer le panier</a><br/><br/>
                                <a href="paiement.php">Valider et payer le panier</a><br/><br/>
                                <input type="submit" value="rafraichir"/>
                                <input type="hidden" name="action" value="refresh"/>
                            </td>
                        </tr>
                        <?php

                    }
                }

            ?>
        </table>
    </form>
    </br></br></br>
    <?php

    require_once('includes/footer.php');

?>