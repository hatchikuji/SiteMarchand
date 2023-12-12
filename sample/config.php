<?php
// Informations d'identification
const DB_SERVER = '127.0.0.1';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'mysql';

// Connexion à la base de données MySQL
$connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if($connect === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>