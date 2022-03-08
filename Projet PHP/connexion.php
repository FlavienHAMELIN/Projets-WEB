<?php
require_once ('includes/header.php');


// si quelqu'un est déjà connecté -> profil
if ($_SESSION['online'] == 1) header("Location: profil.php?id=" . $_SESSION['id']);
// Sinon, on essaie la connexion
else if (isset($_POST['formconnexion']))
{
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if (!empty($mailconnect) and !empty($mdpconnect))
    {
        $requete_user = $database->prepare("SELECT * FROM membres WHERE mail = ? AND pass_md5 = ?");
        $requete_user->execute(array(
            $mailconnect,
            $mdpconnect
        ));
        $user_exist = $requete_user->rowCount();
        if ($user_exist == 1)
        {
            $userinfo = $requete_user->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['mail'] = $userinfo['mail'];
            $_SESSION['online'] = 1;
            header("Location: profil.php?id=" . $_SESSION['id']);
        }
        else $erreur = "Mauvais mail ou mot de passe !";
    }
    else $erreur = "Tous les champs doivent être complétés !";
}
?>

   <body>
      <div align="center">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
         <?php
if (isset($erreur))
{
    echo '<font color="red">' . $erreur . "</font>";
}
?>
      </div>
      </br></br></br>

   </body>
</html>

<?php
require_once ('includes/footer.php');
?>
