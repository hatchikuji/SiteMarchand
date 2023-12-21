CREATE DATABASE IF NOT EXISTS site_marchand_swann;
CREATE USER IF NOT EXISTS 'site'@'localhost' IDENTIFIED BY 'site_m';
GRANT ALL PRIVILEGES ON *.* TO 'site'@'localhost';

CREATE TABLE IF NOT EXISTS `site_marchand_swann`.`utilisateurs`(
    `pseudo` TEXT NOT NULL,
    `nom` TEXT NOT NULL,
    `prenom` TEXT NOT NULL,
    `mdp` TEXT NOT NULL,
    `date_naissance` DATE NOT NULL,
    `adresse` TEXT NOT NULL,
    `code_postal` INT NOT NULL,
    `email` TEXT NOT NULL,
    `numero_tel` TEXT NOT NULL,
    `id` SERIAL NOT NULL ) ENGINE = MyISAM;

CREATE TABLE IF NOT EXISTS `site_marchand_swann`.`produits`(
    `id` SERIAL NOT NULL,
    `chemin` TEXT NOT NULL,
    `nom` TEXT NOT NULL,
    `prix` TEXT NOT NULL ) ENGINE = MyISAM;

INSERT INTO site_marchand_swann.produits (
    `chemin`,`nom`,`prix`)
    VALUES ('../assets/img/product1.png','Hamilton',430),
           ('../assets/img/product2.png','Hamilton',460),
           ('../assets/img/product3.png','Mido',455),
           ('../assets/img/product4.png','Fossil',600),
           ('../assets/img/product5.png','L\'Duchen',650),
           ('../assets/img/product6.png','Longines',675),
           ('../assets/img/product7.png','Hamilton',680),
           ('../assets/img/product8.png','Dreyfuss',700),
           ('../assets/img/product9.png','IWC',710),
           ('../assets/img/product10.png','Mido',735),
           ('../assets/img/product11.png','Ingersoll',800),
           ('../assets/img/product12.png','Hamilton',900);

