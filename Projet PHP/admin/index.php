<?php

    session_start();

    $user='admin';
    $password_user='flayuki';

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username && $password)
        {
            if($username == $user && $password == $password_user)
            {
                $_SESSION['username']=$username;
                header('Location: admin.php');
            }
            else
            {
                echo'Pseudo ou Mot de passe incorrect';
            }
        }
        else
        {
            echo 'Veuillez remplir tous les champs';
        }
    }

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="main.css">
<h1>Administration - Connexion</h1>
<form action="" method="POST">
    <h3>Pseudo :</h3><input type="text" name="username"/><br/><br/>
    <h3>Mot de passe :</h3><input type="password" name="password"/><br/><br/>
    <input type="submit" name="submit"/><br/><br/>
</form>