<?php
// Initialiser la session
session_start();
require('config.php');
$sakila = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,'sakila');
$mysql_query = mysqli_query($sakila, "SELECT * FROM actor");
$data = $mysql_query->fetch_all(MYSQLI_ASSOC);

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="style.css" />
    <title>Acceuil</title>
</head>
<body>
<div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['username'];?></h1>
    <h2>Liste des acteurs</h2>
    <!--Création de la table acteur et de son affichage-->
    <div>
        <table class="table">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Last update</th>
            </tr>
            <?php foreach($data as $row): ?>
                <tr>
                    <td><?= $row['first_name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['last_update']?></td>
                </tr>
            <?php endforeach ?>
        </table>
        <a href="logout.php">Déconnexion</a>
    </div>
</div>
</body>
</html>