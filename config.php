<?php
// Informations d'identification
const DB_SERVER = '127.0.0.1';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = '';

// Connexion à la base de données MySQL
$connect_root = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if($connect_root === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
else{
    $creationdb = "DROP DATABASE IF EXISTS site_marchand_swann;";
    $creationdb .= "CREATE DATABASE site_marchand_swann;";
    $creationdb .= "CREATE USER IF NOT EXISTS 'site'@'localhost' IDENTIFIED BY 'sitem';";
    $creationdb .= "GRANT ALL PRIVILEGES ON site_marchand_swann.* TO 'site'@'localhost' WITH GRANT OPTION;";
    $creationdb .= "CREATE USER  IF NOT EXISTS 'site'@'%' IDENTIFIED BY 'sitem';";
    $creationdb .= "GRANT ALL PRIVILEGES ON site_marchand_swann.* TO 'site'@'%' WITH GRANT OPTION;";
    mysqli_close($connect_root);
    $connect_site = mysqli_connect(DB_SERVER, 'site', '', 'site_marchand_swann');
    if(mysqli_query($connect_site,$creationdb)){
        do{
            if($query = mysqli_store_result($connect_site)){
                while($row = mysqli_fetch_row($query)){
                    printf("%\s \n", $row[0]);
                }
            }
        }while(mysqli_next_result($connect_site));
    }

}
mysqli_query($connect_site,"
    CREATE TABLE IF NOT EXISTS `site_marchand`.`utilisateurs`(`nom` TEXT NOT NULL , `prenom` TEXT NOT NULL , `mdp` TEXT NOT NULL , `date_naissance` DATE NOT NULL , `adresse` TEXT NOT NULL , `email` TEXT NOT NULL , `numero_tel` TEXT NOT NULL , `id` SERIAL NOT NULL ) ENGINE = MyISAM;")
?>