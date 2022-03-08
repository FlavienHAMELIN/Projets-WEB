<?php

    require_once('includes/header.php');

    require_once('includes/sidebar.php');

?>
<form action="" method="post" enctype="multipart/form-data">
    <p style="margin: 10px">
        Ordonner par nom :
        <select style="margin: 10px" name="ordre_nom">
            <option>ASC</option>
            <option>DESC</option>
        </select>
        <input style="margin: 10px" type="submit" name="submit_alphabet" value="Soumettre"/>
    </p>
</form>
<form action="" method="post" enctype="multipart/form-data">
    <p style="margin: 10px">
        Ordonner par prix :
        <select style="margin: 10px" name="ordre_prix">
            <option>ASC</option>
            <option>DESC</option>
        </select>
        <input style="margin: 10px" type="submit" name="submit_prix" value="Soumettre"/>
    </p>
</form>



    <form method="POST" action="">

        <td><input type="submit" style="margin: 5px" name="afficher" value="Afficher les filtres" /></td>
        <td><input type="submit" style="margin: 5px" name="cacher" value="Cacher les filtres" /></td>
    </form>

<?php

    $afficher = (isset($_POST['afficher'])?$_POST['afficher']:(isset($_GET['afficher'])?$_GET['afficher']:null));
    $cacher = (isset($_POST['cacher'])?$_POST['cacher']:(isset($_GET['cacher'])?$_GET['cacher']:null));

    $display=(isset($_GET['display'])?$_GET['display']:'none');
    $allproducts=(isset($_GET['allproducts'])?$_GET['allproducts']:0);

    $min = (isset($_POST['min'])?$_POST['min']:0);
    $max = (isset($_POST['max'])?$_POST['max']:999999);
    $ordre_nom = (isset($_POST['ordre_nom'])?$_POST['ordre_nom']:0);
    $ordre_prix = (isset($_POST['ordre_prix'])?$_POST['ordre_prix']:0);


    if($cacher)
    {
        $display = 'none';
    }

    if($afficher)
    {
        $display ='inline-block';
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .dropdown {
                position: relative;
                display: <?php echo $display; ?>;
            }
        </style>
    </head>

    <body>



        <div class="dropdown">
            <button class="dropbtn">Catégories</button>
            <div class="dropdown-content">

                <?php $select = $database->query("SELECT * FROM category");

                while($s = $select->fetch(PDO::FETCH_OBJ))
                {
                ?>
                    <a href ="?category=<?php echo $s->name;?>&amp;display=inline-block"><h3><?php echo $s->name?></h3></a>

                <?php

                }
                ?>
            </div>
        </div>

        <form action="" method="post">
            <td><p class="dropdown" style="margin: 10px">Prix min</p><input class="dropdown" type="number" name="min" value="0"/></td>
            <td><p class="dropdown" style="margin: 10px">Prix max</p><input class="dropdown" type="number" name="max" value="999999"/></td>
            <td><input class="dropdown" style="margin: 10px" type="submit" name="submit" value="Soumettre"/></td>
        </form>



    </body>
</html>

<?php

    if($allproducts)
    {
            if($ordre_nom)
            {
                $select = $database->prepare("SELECT * FROM products WHERE stock>0 AND '$min'<=price AND price<='$max' ORDER BY title $ordre_nom");
                $select->execute();



                while($s=$select->fetch(PDO::FETCH_OBJ))
                {
                    $length=100;
                    $description = $s->description;
                    $new_description=substr($description,0,$length)."...";
                    $description_finale=wordwrap($new_description,50,'<br/>',false);

                    ?>
                    <br/>
                    <a href="produit.php?show=<?php echo $s->title; ?>"><img src="admin/imgs/<?php echo $s->title; ?>.jpg"/></a>
                    <a href="produit.php?show=<?php echo $s->title; ?>"><h2><?php echo $s->title;?></h2></a>
                    <h5><?php echo $new_description;?></h5>
                    <h4><?php echo $s->price;?> €</h4>
                    <a href="panier.php?action=ajout&amp;l=<?php echo $s->title ?>&amp;q=1&amp;p=<?php echo $s->price ?>">Ajouter au panier</a>

                    </br></br>

                    <?php
                }
            }

            else if($ordre_prix)
            {
                $select = $database->prepare("SELECT * FROM products WHERE stock>0 AND '$min'<=price AND price<='$max' ORDER BY price $ordre_prix");
                $select->execute();



                while($s=$select->fetch(PDO::FETCH_OBJ))
                {
                    $length=100;
                    $description = $s->description;
                    $new_description=substr($description,0,$length)."...";
                    $description_finale=wordwrap($new_description,50,'<br/>',false);

                    ?>
                    <br/>
                    <a href="produit.php?show=<?php echo $s->title; ?>"><img src="admin/imgs/<?php echo $s->title; ?>.jpg"/></a>
                    <a href="produit.php?show=<?php echo $s->title; ?>"><h2><?php echo $s->title;?></h2></a>
                    <h5><?php echo $new_description;?></h5>
                    <h4><?php echo $s->price;?> €</h4>
                    <a href="panier.php?action=ajout&amp;l=<?php echo $s->title ?>&amp;q=1&amp;p=<?php echo $s->price ?>">Ajouter au panier</a>

                    </br></br>

                    <?php
                }
            }
            else if(!$ordre_nom && !$ordre_prix)
            {    
                $select = $database->prepare("SELECT * FROM products WHERE stock>0 AND '$min'<=price AND price<='$max'");
                $select->execute();



                while($s=$select->fetch(PDO::FETCH_OBJ))
                {
                    $length=100;
                    $description = $s->description;
                    $new_description=substr($description,0,$length)."...";
                    $description_finale=wordwrap($new_description,50,'<br/>',false);

                    ?>
                    <br/>
                    <a href="produit.php?show=<?php echo $s->title; ?>"><img src="admin/imgs/<?php echo $s->title; ?>.jpg"/></a>
                    <a href="produit.php?show=<?php echo $s->title; ?>"><h2><?php echo $s->title;?></h2></a>
                    <h5><?php echo $new_description;?></h5>
                    <h4><?php echo $s->price;?> €</h4>
                    <a href="panier.php?action=ajout&amp;l=<?php echo $s->title ?>&amp;q=1&amp;p=<?php echo $s->price ?>">Ajouter au panier</a>

                    </br></br>

                    <?php
                }
            }
            





    }

?>



<?php

    if(isset($_GET['show']))
    {

        $product = $_GET['show'];

        $select = $database->prepare("SELECT * FROM products WHERE title='$product'");
        $select->execute();

        $s = $select->fetch(PDO::FETCH_OBJ);

        $description = $s->description;

        $description_finale=wordwrap($description,100,'<br/>',false);

        ?>

        <br/>
        <div style="text-align:center;">
            <img src="admin/imgs/<?php echo $s->title; ?>.jpg"/>
            <h1><?php echo $s->title; ?></h1>
            <h5><?php echo $description_finale; ?></h5>
            <a href="panier.php?action=ajout&amp;l=<?php echo $s->title ?>&amp;q=1&amp;p=<?php echo $s->price ?>">Ajouter au panier</a>
        </div>
        <br/>

        <?php

    }
    else
    {



        if(isset($_GET['category']))
        {
            $category=$_GET['category'];

            if($ordre_nom)
            {
                $select = $database->prepare("SELECT * FROM products WHERE category='$category' AND stock>0 AND '$min'<=price AND price<='$max' ORDER BY title $ordre_nom");
                $select->execute();



                while($s=$select->fetch(PDO::FETCH_OBJ))
                {
                    $length=100;
                    $description = $s->description;
                    $new_description=substr($description,0,$length)."...";
                    $description_finale=wordwrap($new_description,50,'<br/>',false);

                    ?>
                    <br/>
                    <a href="produit.php?show=<?php echo $s->title; ?>"><img src="admin/imgs/<?php echo $s->title; ?>.jpg"/></a>
                    <a href="produit.php?show=<?php echo $s->title; ?>"><h2><?php echo $s->title;?></h2></a>
                    <h5><?php echo $new_description;?></h5>
                    <h4><?php echo $s->price;?> €</h4>
                    <a href="panier.php?action=ajout&amp;l=<?php echo $s->title ?>&amp;q=1&amp;p=<?php echo $s->price ?>">Ajouter au panier</a>

                    </br></br>

                    <?php
                }
            }
            else if($ordre_prix)
            {
                $select = $database->prepare("SELECT * FROM products WHERE category='$category' AND stock>0 AND '$min'<=price AND price<='$max' ORDER BY price $ordre_prix");
                $select->execute();



                while($s=$select->fetch(PDO::FETCH_OBJ))
                {
                    $length=100;
                    $description = $s->description;
                    $new_description=substr($description,0,$length)."...";
                    $description_finale=wordwrap($new_description,50,'<br/>',false);

                    ?>
                    <br/>
                    <a href="produit.php?show=<?php echo $s->title; ?>"><img src="admin/imgs/<?php echo $s->title; ?>.jpg"/></a>
                    <a href="produit.php?show=<?php echo $s->title; ?>"><h2><?php echo $s->title;?></h2></a>
                    <h5><?php echo $new_description;?></h5>
                    <h4><?php echo $s->price;?> €</h4>
                    <a href="panier.php?action=ajout&amp;l=<?php echo $s->title ?>&amp;q=1&amp;p=<?php echo $s->price ?>">Ajouter au panier</a>

                    </br></br>

                    <?php
                }
            }
            else if(!$ordre_nom && !$ordre_prix)
            {
                $select = $database->prepare("SELECT * FROM products WHERE category='$category' AND stock>0 AND '$min'<=price AND price<='$max'");
                $select->execute();



                while($s=$select->fetch(PDO::FETCH_OBJ))
                {
                    $length=100;
                    $description = $s->description;
                    $new_description=substr($description,0,$length)."...";
                    $description_finale=wordwrap($new_description,50,'<br/>',false);

                    ?>
                    <br/>
                    <a href="produit.php?show=<?php echo $s->title; ?>"><img src="admin/imgs/<?php echo $s->title; ?>.jpg"/></a>
                    <a href="produit.php?show=<?php echo $s->title; ?>"><h2><?php echo $s->title;?></h2></a>
                    <h5><?php echo $new_description;?></h5>
                    <h4><?php echo $s->price;?> €</h4>
                    <a href="panier.php?action=ajout&amp;l=<?php echo $s->title ?>&amp;q=1&amp;p=<?php echo $s->price ?>">Ajouter au panier</a>

                    </br></br>

                    <?php
                }
            }
            ?>

            <br/><br/><br/><br/>

            <?php

        }
        else
        {

        }



    }
echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
require_once('includes/footer.php');
?>
