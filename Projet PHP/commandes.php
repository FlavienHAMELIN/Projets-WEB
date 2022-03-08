<?php

	require_once('includes/header.php');
    $id = $_SESSION['id'];

    $commandes = $database->prepare("SELECT * FROM transactions WHERE id_membre = $id");

    $commandes->execute();

?>


<h4> Mes commandes </h4>
<table>
    <tr>
    	
        <th>Nombre d'articles&emsp;</th>
        <th>Prix total&emsp;</th>
        <th>Date &emsp;</th>

    </tr>
	<tr>
	<?php
	while($commande = $commandes->fetch(PDO::FETCH_OBJ))
	{
	?>
	    <td><?php echo $commande->nb_articles; ?></br></td>
	    <td><?php echo $commande->prix; ?> €</br></td>
	    <td><?php echo $commande->date_trans; ?></br></td>

	</tr>

	<?php
	} 
	?>

</table>
</br></br></br>


<?php
require_once('includes/footer.php');
?>