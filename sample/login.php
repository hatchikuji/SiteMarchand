<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet"/>
    <title>Connexion</title>
</head>
<body>
<?php
require('config.php');
session_start();

if (isset($_POST['username'])){

    $username = stripslashes($_REQUEST['username']);
    /* @var mysqli $connect_site */
    $username = mysqli_real_escape_string($connect_site, $username);

    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($connect_site, $password);

    $user_connect = new mysqli("localhost", $username, $password, "mysql");
    if ($user_connect->connect_error) {
        $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
    }else{
        $_SESSION['username'] = $username;
        header("Location: index.php");
    }
}
?>
<form class="box" action="" method="post" name="login">
    <h1 class="box-logo box-title">Base de donnée Sakila</h1>
    <h1 class="box-title">Connexion</h1>
    <label>
        <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required>
    </label>
    <label>
        <input type="password" class="box-input" name="password" placeholder="Mot de passe">
    </label>
    <input type="submit" value="Connexion" name="submit" class="box-button">
    <p class="box-register">Créer un nouveau compte <a href="register.php">S'inscrire</a></p>
    <?php if (! empty($message)) { ?>
        <p class="errorMessage"><?php echo $message; ?></p>
    <?php } ?>
</form>
</body>
</html>