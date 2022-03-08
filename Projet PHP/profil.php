<?php
    require_once('includes/header.php');


    if(isset($_GET['id']) AND $_GET['id'] > 0) 
    {
      $getid = intval($_GET['id']);
      $requser = $database->prepare('SELECT * FROM membres WHERE id = ?');
      $requser->execute(array($getid));
      $userinfo = $requser->fetch();
?>

<body>
   <div align="center">
      <h2>Profil de <?php echo $userinfo['prenom']; echo ' ' ; echo $userinfo['nom'] ?></h2>
      <br /><br />
      Mail = <?php echo $userinfo['mail']; ?>
      <br />
      <?php
      if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
      {
      ?>
      <br />
      <a href="commandes.php">Mes commandes</a> <br />
      <a href="panier.php">Mon panier</a>  <br />
      <a href="deconnexion.php">Se déconnecter</a> <br/>
 
      <?php
      }
      ?>
   </div>
</body>

<?php
}
require_once('includes/footer.php');
?>