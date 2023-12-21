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
    `prix` TEXT NOT NULL ) ENGINE = MyISAM;