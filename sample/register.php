 <!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="style.css" />
    <title>Inscription</title>
</head>
<body>
<?php
require("config.php");
if (isset($_REQUEST['username'], $_REQUEST['password'])){
    // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
    $username = stripslashes($_REQUEST['username']);
    /** @var mysqli $connect */
    $username = mysqli_real_escape_string($connect, $username);
    // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($connect, $password);
    //requéte SQL
    

    $query = "CREATE USER '$username'@'localhost' IDENTIFIED BY '$password';";
    $query_grant = "GRANT SELECT ON *.* TO '$username'@'localhost'";
    // Exécuter la requête sur la base de données
    $res = mysqli_query($connect, $query);
    mysqli_query($connect, $query_grant);
    try{
        if($res){
            echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
        }
    }catch (Exception $e) {
        echo $e;
    }
}else{
    ?>
    <form class="box" action="" method="post">
        <h1 class="box-logo box-title">Base de donnée Sakila</h1>
        <h1 class="box-title">S'inscrire</h1>
        <label>
            <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
        </label>
        <label>
            <input type="password" class="box-input" name="password" placeholder="Mot de passe" required/>
        </label>
        <input type="submit" name="submit" value="S'inscrire" class="box-button" />
        <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
    </form>
<?php } ?>
</body>
</html>