<?php
    session_start();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<h1>Bienvenue, <?php echo $_SESSION['username']; ?></h1>

<br/>

<a href="?action=add">Ajouter un produit</a> <br/>
<a href="?action=modifyanddelete">Modifier/Supprimer un produit</a><br/><br/>

<a href="?action=add_category">Ajouter une catégorie</a> <br/>
<a href="?action=modifyanddelete_category">Modifier/Supprimer une catégorie</a><br/><br/>

<a href="deconnexionadmin.php">Se déconnecter</a> <br/><br/>

<?php

    try
    {
        $database = new PDO('mysql:host=localhost;dbname=site-e-commerce', 'root', 'root');
        $database->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //Les noms de champs sont en caractères minuscules
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //les erreurs lancent des exceptions


    }
    catch(Exception $e)
    {
        die('Une erreur est survenue');
    }

    if(isset($_SESSION['username']))
    {
        if(isset($_GET['action']))
        {
            if($_GET['action'] == 'add')
            {

                if(isset($_POST['submit']))
                {
                    $stock = $_POST['stock'];
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];


                    $img_tmp = $_FILES['img']['name'];


                    if(!empty($img_tmp))
                    {
                        $image = explode('.',$img_tmp);

                        $image_ext = end($image);

                        //print_r($image_ext);

                        if(in_array(strtolower($image_ext),array('png','jpg','jpeg'))===false)
                        {
                            echo 'Veuillez entrer une image ayant pour extension : png, jpg ou jpeg';
                        }
                        else
                        {


                            $image_size = getimagesize($img_tmp);

                            //print_r($image_size);

                            if($image_size['mime']=='image/jpeg')
                            {
                                $image_src = imagecreatefromjpeg($img_tmp);
                            }
                            else if($image_size['mime']=='image/png')
                            {
                                $image_src = imagecreatefrompng($img_tmp);
                            }
                            else
                            {
                                $image_src = false;
                                echo'Veuillez entrer une image valide1';
                            }
                            if($image_src !== false)
                            {
                                $image_width = 200;

                                if($image_size[0]==$image_width)
                                {
                                    $image_finale = $image_src;
                                }
                                else
                                {
                                    $new_width[0] = $image_width;
                                    $new_height[1] = 200;
                                    $image_finale = imagecreatetruecolor($new_width[0],$new_height[1]);
                                    imagecopyresampled($image_finale,$image_src,0,0,0,0,$new_width[0],$new_height[1],$image_size[0],$image_size[1]);
                                }
                                imagejpeg($image_finale,'imgs/'.$title.'.jpg');

                            }
                        }
                    }
                    else
                    {
                        echo 'Veuillez entrer une image2';
                    }

                    if($title && $description && $price && $stock)
                    {
                        $category=$_POST['category'];

                        $insert = $database->prepare("INSERT INTO products (title,description,price,category,stock) VALUES('$title','$description','$price','$category','$stock')");
                        $insert->execute();
                    }
                    else
                    {
                        echo"Veuillez remplir tous les champs";
                    }
                }

            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <h3>Titre du produit :</h3><input type="text" name="title"/>
                <h3>Description du produit :</h3><textarea name="description"></textarea>
                <h3>Prix du produit :</h3><input type="text" name="price"/><br/><br/>
                <h3>Image :</h3>
                <input type="file" name="img" /><br/><br/>
                <h3>Catégorie :</h3>
                <select name="category">
                    <?php
                        $select=$database->query("SELECT * FROM category");
                        while($s = $select->fetch(PDO::FETCH_OBJ))
                        {
                            ?>

                            <option><?php echo $s->name; ?></option>

                            <?php
                        }

                    ?>
                </select><br/><br/>
                <h3>Stock : </h3><input type="text" name="stock"/><br/><br/>
                <input type="submit" name="submit"/>
            </form>

            <?php

            }
            else if($_GET['action'] == 'modifyanddelete')
            {
                $select = $database->prepare("SELECT * FROM products");
                $select->execute();

                while($s=$select->fetch(PDO::FETCH_OBJ))
                {
                    echo $s->title;

                    ?>

                    <a href="?action=modify&amp;id=<?php echo $s->id; ?>">Modifier</a>
                    <a href="?action=delete&amp;id=<?php echo $s->id; ?>">X</a><br/><br/>
                    <?php
                }

            }
            else if($_GET['action'] == 'modify')
            {


                $id=$_GET['id'];

                $select = $database->prepare("SELECT * FROM products WHERE id=$id");
                $select->execute();

                $data = $select->fetch(PDO::FETCH_OBJ);

                ?>

                <form action="" method="post">
                    <h3>Titre du produit :</h3><input value="<?php echo $data->title; ?>" type="text" name="title"/>
                    <h3>Description du produit :</h3><textarea name="description"><?php echo $data->description; ?></textarea>
                    <h3>Prix du produit :</h3><input value="<?php echo $data->price; ?>" type="text" name="price"/>
                    <h3>Stock : </h3><input type="text" value="<?php echo $data->stock; ?>" name="stock"/><br/><br/>
                    <input type="submit" name="submit" value="Modifier"/>
                </form>

                <?php

                if(isset($_POST['submit']))
                {
                    $stock = $_POST['stock'];
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];

                    $update = $database->prepare("UPDATE products SET title='$title',description='$description',price=$price,stock='$stock' WHERE id=$id");
                    $update->execute();

                    header('Location: admin.php?action=modifyanddelete');

                }


            }
            else if($_GET['action'] == 'delete')
            {
                $id=$_GET['id'];
                $delete = $database->prepare("DELETE FROM products WHERE id=$id");
                $delete->execute();
            }
            else if($_GET['action']=='add_category')
            {
                if(isset($_POST['submit']))
                {
                    $name = $_POST['name'];

                    if($name)
                    {
                        $insert = $database->prepare("INSERT INTO category (name) VALUES('$name')");
                        $insert->execute();
                    }
                    else
                    {
                        echo "Veuillez remplir tous les champs";
                    }
                }
                ?>

                <form action="" method="post">
                    <h3>Titre de la catégorie :</h3><input type="text" name="name"/><br/><br/>
                    <input type="submit" name="submit" value="Ajouter"/>
                </form>

                <?php
            }
            else if($_GET['action']=='modifyanddelete_category')
            {
                $select = $database->prepare("SELECT * FROM category");
                $select->execute();

                while($s=$select->fetch(PDO::FETCH_OBJ))
                {
                    echo $s->name;

                    ?>

                    <a href="?action=modify_category&amp;id=<?php echo $s->id; ?>">Modifier</a>
                    <a href="?action=delete_category&amp;id=<?php echo $s->id; ?>"> X</a><br/><br/>
                    <?php
                }
            }
            else if($_GET['action']=='modify_category')
            {
                $id=$_GET['id'];

                $select = $database->prepare("SELECT * FROM category WHERE id=$id");
                $select->execute();

                $data = $select->fetch(PDO::FETCH_OBJ);

                ?>

                <form action="" method="post">
                    <h3>Titre du produit :</h3><input value="<?php echo $data->name; ?>" type="text" name="title"/>
                    <input type="submit" name="submit" value="Modifier"/>
                </form>

                <?php

                if(isset($_POST['submit']))
                {
                    $title = $_POST['title'];

                    $update = $database->prepare("UPDATE category SET name='$title' WHERE id=$id");
                    $update->execute();

                    header('Location: admin.php?action=modifyanddelete_category');

                }
            }
            else if($_GET['action']=='delete_category')
            {
                $id=$_GET['id'];
                $delete = $database->prepare("DELETE FROM category WHERE id=$id");
                $delete->execute();

                header('Location: admin.php?action=modifyanddelete_category');
            }
            else
            {
                die("Une erreur s'est produite.");
            }
        }
    }
    else
    {
        header('Location: ../index.php');
    }

?>





