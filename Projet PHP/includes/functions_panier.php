<?php

    function creationPanier()
    {


        if(!isset($_SESSION['panier']))
        {
            $_SESSION['panier']=array();
            $_SESSION['panier']['libelleProduit']=array();
            $_SESSION['panier']['qteProduit']=array();
            $_SESSION['panier']['prixProduit']=array();
            $_SESSION['panier']['verrou']=false;


        }
        return true;
    }

    function ajouterArticle($libelleProduit,$QteProduit,$prixProduit)
    {
        if(creationPanier() && !isVerrouille())
        {
            $position_produit=array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);
            if($position_produit !== false)
            {
                $_SESSION['panier']['qteProduit'][$position_produit] += $QteProduit;
            }
            else
            {
                array_push($_SESSION['panier']['libelleProduit'],$libelleProduit);
                array_push($_SESSION['panier']['qteProduit'],$QteProduit);
                array_push($_SESSION['panier']['prixProduit'],$prixProduit);

            }
        }
        else
        {
            echo "Erreur, veuillez contacter l'administrateur";
        }
    }

    function modifierQTeArticle($libelleProduit,$qteProduit)
    {
        $positionProduit = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);
        if($positionProduit !== false)
        {
            $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit;
        }

    }


    function supprimerArticle($libelleProduit)
    {
        if(creationPanier() && !isVerrouille())
        {
            $tmp=array();
            $tmp['libelleProduit']=array();
            $tmp['qteProduit']=array();
            $tmp['prixProduit']=array();
            $tmp['verrou']= $_SESSION['panier']['verrou'];

            $i=0;

            for($i; $i<count($_SESSION['panier']['libelleProduit']); $i++)
            {
                if($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
                {
                    array_push($tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
                    array_push($tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
                    array_push($tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
                }
            }
            $_SESSION['panier'] = $tmp;

            unset($tmp);

        }
        else
        {
            echo "Erreur, veuillez contacter l'administrateur";
        }
    }

    function montantGlobal()
    {
        $total = 0;
        $i=0;
        for($i; $i<count($_SESSION['panier']['libelleProduit']); $i++)
        {
            $total += $_SESSION['panier']['qteProduit'][$i]*$_SESSION['panier']['prixProduit'][$i];
        }
        return $total;
    }

    function nombreArticlesTotal()
    {
        $total = 0;
        $i=0;
        for($i; $i<count($_SESSION['panier']['libelleProduit']); $i++)
        {
            $total += $_SESSION['panier']['qteProduit'][$i];
        }
        return $total;
    }

    function supprimerPanier()
    {
        unset($_SESSION['panier']);
    }

    function isVerrouille()
    {
        if(isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function compterArticles()
    {
        if(isset($_SESSION['panier']))
        {
            return count($_SESSION['panier']['libelleProduit']);
        }
        else
        {
            return 0;
        }
    }


?>