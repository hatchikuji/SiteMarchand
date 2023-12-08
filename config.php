<?php
// Informations d'identification
const DB_SERVER = '127.0.0.1';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = '';

// Connexion à phpmydmin
$connect_root = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if($connect_root === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
// on crée la base de donnée 'site_marchand_swann' et l'utilisateur 'site'
// qui aura tout les privilèges sur cette base de donnée.
else {

    mysqli_query($connect_root,"DROP DATABASE IF EXISTS site_marchand_swann;");
    mysqli_query($connect_root,"CREATE DATABASE site_marchand_swann;");
    mysqli_query($connect_root,"CREATE USER IF NOT EXISTS 'site'@'localhost' IDENTIFIED BY 'site_m';");
    mysqli_query($connect_root,"GRANT ALL PRIVILEGES ON *.* TO 'site'@'localhost';");
    // on se déconnecte de 'root' afin de se connecter avec l'utilisateur 'site_m'
}
mysqli_close($connect_root);
$connect_site = mysqli_connect(DB_SERVER, 'site', 'site_m', 'site_marchand_swann');

mysqli_query($connect_site,"CREATE DATABASE IF NOT EXISTS site_marchand_swann;");

mysqli_query($connect_site,"CREATE TABLE IF NOT EXISTS `site_marchand_swann`.`utilisateurs`
        (`nom` TEXT NOT NULL ,
        `prenom` TEXT NOT NULL ,
        `mdp` TEXT NOT NULL ,
        `date_naissance` DATE NOT NULL ,
        `adresse` TEXT NOT NULL ,
        `email` TEXT NOT NULL ,
        `numero_tel` TEXT NOT NULL ,
        `id` SERIAL NOT NULL ) ENGINE = MyISAM;");
mysqli_close($connect_site);
