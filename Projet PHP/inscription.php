<?php

require_once('includes/header.php');


if(isset($_POST['forminscription'])) {
  $nom = $_POST['nom'];	
  $prenom = $_POST['prenom'];
  $mail = htmlspecialchars($_POST['mail']);
  $mail2 = htmlspecialchars($_POST['mail2']);
  $mdp = sha1($_POST['mdp']);
  $mdp2 = sha1($_POST['mdp2']);
  if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
	    $lennom = strlen($nom);
	    $lenprenom = strlen($prenom);
	    if($lennom<= 255 AND $lenprenom<= 255) {
        	if($mail == $mail2) {
            	if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
	            $reqmail = $database->prepare("SELECT * FROM membres WHERE mail= ?");
	            $reqmail->execute(array($mail));
	            $mailexist = $reqmail->rowCount();
	            if($mailexist == 0) {
                  	if($mdp == $mdp2) {
                     	$insertmember = $database->prepare("INSERT INTO membres(mail, nom, prenom, pass_md5) VALUES(?, ?, ?, ?)");
                     	$insertmember->execute((array( $mail, $nom, $prenom, $mdp)));
                     	$erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                  	}
                  	else
                    	$erreur = "Vos mots de passe ne correspondent pas !";
            	}
            	else
              		$erreur = "Adresse mail déjà utilisée !";
        		}
          	else 
          		$erreur = "Votre adresse mail n'est pas valide !";
         	}
      	else
          	$erreur = "Vos adresses mail ne correspondent pas !";
      }
	else
      	$erreur = "Votre nom ou prénom ne doit pas dépasser 255 caractères !";
}
else 
  	$erreur = "Tous les champs doivent être complétés !";
}
?>



<body>
<div align="center">
   <h2>Inscription</h2>
   <br /><br />
   <form method="POST" action="">
      <table>
         <tr>
            <td align="right">
               <label for="nom">Nom :</label>
            </td>
            <td>
               <input type="text" placeholder="Votre nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
            </td>
         </tr>
         <tr>
            <td align="right">
               <label for="">Prénom:</label>
            </td>
            <td>
               <input type="text" placeholder="Votre prenom" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
            </td>
         </tr>
         <tr>
            <td align="right">
               <label for="mail">Mail :</label>
            </td>
                <td>
                   <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                </td>
         </tr>
         <tr>
            <td align="right">
               <label for="mail2">Confirmation du mail :</label>
            </td>
            <td>
               <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
            </td>
         </tr>
         <tr>
            <td align="right">
               <label for="mdp">Mot de passe :</label>
            </td>
            <td>
               <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
            </td>
         </tr>
         <tr>
            <td align="right">
               <label for="mdp2">Confirmation du mot de passe :</label>
            </td>
            <td>
               <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
            </td>
         </tr>
         <tr>
            <td></td>
            <td align="center">
               <br />
               <input type="submit" name="forminscription" value="Je m'inscris" />
            </td>
         </tr>
      </table>
   </form>
   <?php
   if(isset($erreur)) {
      echo '<font color="red">'.$erreur."</font>";
   }
   ?>
</div>
</body>
</br></br></br>

<?php
require_once('includes/footer.php');
?>