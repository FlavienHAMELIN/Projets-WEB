<?php
	 
	require_once('includes/header.php');


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
    require_once('includes/footer.php');
?>

