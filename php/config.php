<?php
// Informations d'identification
const DB_SERVER = '127.0.0.1';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = '';

const DB_SITE = 'site';
const DB_SITEP = 'site_m';
const DB_SITE_NOM = 'site_marchand_swann';
$connect_root = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

// on crée la base de donnée 'site_marchand_swann' et l'utilisateur 'site'
// qui aura tout les privilèges sur cette base de donnée.
if($connect_root === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
else{
    mysqli_query($connect_root,"CREATE DATABASE IF NOT EXISTS site_marchand_swann;");
    mysqli_query($connect_root,"CREATE USER IF NOT EXISTS 'site'@'localhost' IDENTIFIED BY 'site_m';");
    mysqli_query($connect_root,"GRANT ALL PRIVILEGES ON *.* TO 'site'@'localhost';");
}
// on se déconnecte de 'root' afin de se connecter avec l'utilisateur 'site_m'

mysqli_close($connect_root);

$connect_site = mysqli_connect(DB_SERVER, DB_SITE, DB_SITEP, DB_SITE_NOM);

mysqli_query($connect_site,"CREATE TABLE IF NOT EXISTS `site_marchand_swann`.`utilisateurs`(
    `pseudo` TEXT NOT NULL,
    `nom` TEXT NOT NULL,
    `prenom` TEXT NOT NULL,
    `mdp` TEXT NOT NULL,
    `date_naissance` DATE NOT NULL,
    `adresse` TEXT NOT NULL,    
    `code_postal` INT NOT NULL,
    `email` TEXT NOT NULL,
    `numero_tel` TEXT NOT NULL,
    `id` SERIAL NOT NULL ) ENGINE = MyISAM;");

mysqli_query($connect_site,"CREATE TABLE IF NOT EXISTS `site_marchand_swann`.`produits`(
    `id` SERIAL NOT NULL,
    `chemin` TEXT NOT NULL,
    `prix` INT NOT NULL ) ENGINE = MyISAM;");

if($connect_site === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
mysqli_close($connect_site);