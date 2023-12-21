<?php
include("config.php");
session_start();

$connect_site = mysqli_connect(DB_SERVER,DB_SITE,DB_SITEP,DB_SITE_NOM);
// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire

if(isset($_POST['pseudo'],$_POST['prenom'], $_POST['nom'], $_POST['password'], $_POST['date_naissance'],$_POST['adresse'],$_POST['code_postal'],$_POST['email'],$_POST['numero_tel'])) {
    $pseudo = mysqli_real_escape_string($connect_site, stripcslashes($_POST['pseudo']));

    if (mysqli_num_rows(mysqli_query($connect_site,"SELECT * FROM utilisateurs WHERE pseudo='".$_POST['pseudo']."'"))==1){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
        echo '<script type="text/javascript">alert("Pseudo déjà utilisé")</script>';
    }else {
        //on utilise la méthode mysqli_real_escape_string pour pouvoir executer les requêtes SQL sur les variables
        $prenom = mysqli_real_escape_string($connect_site,stripslashes($_POST['prenom']));

        $nom = mysqli_real_escape_string($connect_site, stripslashes($_POST['nom']));

        $password = mysqli_real_escape_string($connect_site, stripslashes($_POST['password']));

        $date = mysqli_real_escape_string($connect_site, stripslashes($_POST['date_naissance']));

        $adresse = mysqli_real_escape_string($connect_site, stripslashes($_POST['adresse']));

        $code_postal = mysqli_real_escape_string($connect_site, stripslashes($_POST['code_postal']));

        $mail = mysqli_real_escape_string($connect_site, stripslashes($_POST['email']));

        $telephone = stripslashes($_POST['numero_tel']);
        $telephone = mysqli_real_escape_string($connect_site, $telephone);
        $inscrit = mysqli_query($connect_site, "INSERT INTO site_marchand_swann.utilisateurs (pseudo, nom, prenom, mdp, date_naissance, adresse,code_postal, email, numero_tel) 
        VALUES ('$pseudo','$nom', '$prenom',md5('$password'),'$date','$adresse','$code_postal', '$mail', '$telephone')");
    }
    header("connexion.php");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta nom="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="../assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../assets/css/styles.css">

    <title>Inscription</title>
</head>
<body>
<!--==================== HEADER ====================-->
<header class="header" id="header">
    <nav class="nav container">
        <a href="#" class="nav__logo">
            <i class='bx bxs-watch nav__logo-icon'></i> Montres
        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="../index.php" class="nav__link">Home</a>
                </li>
                <li class="nav__item">
                    <a href="story.php" class="nav__link">Histoire</a>
                </li>
                <li class="nav__item">
                    <a href="product.php" class="nav__link">Produits</a>
                </li>
                <li class="nav__item">
                    <a href="connexion.php" class="nav__link">Connexion</a>
                </li>
                <li class="nav__item">
                    <a href="inscription.php" class="nav__link active-link">Inscription</a>
                </li>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class='bx bx-x' ></i>
            </div>
        </div>

        <div class="nav__btns">
            <!-- Bouton de changement de theme -->
            <i class='bx bx-moon change-theme' id="theme-button"></i>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt' ></i>
            </div>
        </div>
    </nav>
</header>
<!--==================== MAIN ====================-->
<main class="main">
    <section class="inscription section container">
        <h2 class="section__title">
            Champs d'inscription
        </h2>
        <div class="formulaire_container">
            <form class="formulaire_box grid" action="" method="post">
                <div class="__champ">
                    <label>
                        <input type="text" class="box-input" name="pseudo" placeholder="Pseudo" required>
                        <input type="text" class="box-input" name="prenom" placeholder="Prénom" required>
                    </label>
                </div>
                <div class="__champ">
                    <label>
                        <input type="text" class="box-input" name="nom" placeholder="Nom" required>
                        <input type="password" class="box-input" name="password" placeholder="Mot de passe" required>
                    </label>
                </div>
                <div class="__champ">
                    <label>
                        <input type="date" class="box-input" name="date_naissance" required>
                        <input type="text" class="box-input" name="adresse" placeholder="123 Rue Exemple, La Ville" required>
                    </label>
                </div>
                <div class="__champ">
                    <label>
                        <input type="number" class="box-input" name="code_postal" placeholder="76600" required>
                        <input type="email" class="box-input" name="email" placeholder="adresse@mail.com" required>
                    </label>
                </div>
                <div class="__champ">
                    <label>
                        <input type="tel" class="box-input" name="numero_tel" placeholder="0123456789" required>
                    </label>
                </div>
                <div class="__champ__button">

                    <input type="submit" value="S'inscrire" name="sinscrire" class="__form-button">
                    <br class="br">
                    <a href="connexion.php" class="__form-button">Se connecter</a>
                </div>
            </form>
        </div>
    </section>
    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <h3 class="footer__title">Nos informations</h3>

                <ul class="footer__list">
                    <li>76600 - France</li>
                    <li>StjoSup</li>
                    <li>01 23 45 67 89</li>
                </ul>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">A propos</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Centre technique</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Service client</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">A propos</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Copyright</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Home</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Vélo de ville</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Vélos de montagne</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Electronique</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Accessoires</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Sociaux</h3>

                <ul class="footer__social">
                    <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-facebook'></i>
                    </a>

                    <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-twitter' ></i>
                    </a>

                    <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-instagram' ></i>
                    </a>
                </ul>
            </div>
        </div>

        <span class="footer__copy">&#169; Brillant. All rigths reserved</span>
    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
    </a>

    <!--=============== SWIPER JS ===============-->
    <script src="../assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="../assets/js/main.js"></script>
</body>
