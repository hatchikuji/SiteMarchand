<?php
session_start();
include("config.php");


$connect_site = mysqli_connect(DB_SERVER,DB_SITE,DB_SITEP,DB_SITE_NOM);
// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire

if(isset($_POST['pseudo'],$_POST['password'])){
    $pseudo = mysqli_real_escape_string($connect_site,stripslashes($_REQUEST['pseudo']));
    $password = md5(mysqli_real_escape_string($connect_site, stripslashes($_REQUEST['password'])));

    $user_connect = mysqli_query($connect_site,"SELECT * FROM utilisateurs WHERE utilisateurs.pseudo='".$pseudo."' AND utilisateurs.mdp='".$password."'");

    if(mysqli_num_rows($user_connect) == 0) {
        echo "<script type='text/javascript'>alert('Pseudo ou mot de passe incorrect');</script>";
    }else {
        $_SESSION['pseudo'] = $pseudo;
        header("Location: ../index.php");
        exit();
    }
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

    <title>Page de connexion</title>
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
                    <a href="connexion.php" class="nav__link active-link">Connexion</a>
                </li>
                <li class="nav__item">
                    <a href="inscription.php" class="nav__link">Inscription</a>
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
            Page de connexion
        </h2>
        <div class="formulaire_container">
            <form class="formulaire_box grid" action="" method="post">
                <div class="__champ">
                    <label>
                        <input type="text" class="box-input" name="pseudo" placeholder="Pseudo" required>
                        <input type="password" class="box-input" name="password" placeholder="Mot de passe" required>
                    </label>
                </div>
                <div class="__champ__button">
                    <input type="submit" value="Connexion" name="connecter" class="__form-button">
                    <br class="br">
                    <a href="inscription.php" class="__form-button">S'inscrire</a>
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
