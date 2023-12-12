<?php
require("config.php");
session_start();

 // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
/** @var mysqli $connect_site */
$prenom = stripslashes($_REQUEST['prenom']);
$prenom = mysqli_real_escape_string($connect_site, $prenom);

$nom = stripslashes($_REQUEST['nom']);
$nom = mysqli_real_escape_string($connect_site, $nom);

$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($connect_site, $password);
$confirm_p = stripcslashes($_REQUEST['confirm_password']);
if($password != $confirm_p){
    $message = "Le mot de passe ne correspond pas";
}
$date = stripslashes($_REQUEST['date']);
$date = mysqli_real_escape_string($connect_site, $date);

$adresse = stripslashes($_REQUEST['adresse']);
$adresse = mysqli_real_escape_string($connect_site, $adresse);

$mail = stripslashes($_REQUEST['email']);
$mail = mysqli_real_escape_string($connect_site, $mail);

$telephone = stripslashes($_REQUEST['telephone']);
$telephone = mysqli_real_escape_string($connect_site, $telephone);
mysqli_query($connect_site,"CREATE USER '$prenom'@'localhost' IDENTIFIED BY '$password';");
mysqli_query($connect_site, "INSERT INTO site_marchand_swann.utilisateur (nom, prenom, mdp, adresse, email, numero_tel) 
    VALUES ('$nom', '$prenom','$password','$adresse', '$mail', '$telephone')");
    echo "
<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='index.php'>connecter</a></p>
       </div>";

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta nom="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Montres Marchandes</title>
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
                    <a href="index.php" class="nav__link active-link">Home</a>
                </li>
                <li class="nav__item">
                    <a href="featured.html" class="nav__link">Populaire</a>
                </li>
                <li class="nav__item">
                    <a href="story.html" class="nav__link">Histoire</a>
                </li>
                <li class="nav__item">
                    <a href="product.html" class="nav__link">Produits</a>
                </li>
                <li class="nav__item">
                    <a href="new.html" class="nav__link">Nouvelles montres</a>
                </li>
                <li class="nav__item">
                    <a href="connexion.php" class="nav__link">Connexion</a>
                </li>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class='bx bx-x' ></i>
            </div>
        </div>

        <div class="nav__btns">
            <!-- Bouton de changement de theme -->
            <i class='bx bx-moon change-theme' id="theme-button"></i>

            <div class="nav__shop" id="cart-shop">
                <i class='bx bx-shopping-bag' ></i>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt' ></i>
            </div>
        </div>
    </nav>
</header>
<!--==================== CART ====================-->
<div class="cart" id="cart">
    <i class='bx bx-x cart__close' id="cart-close"></i>

    <h2 class="cart__title-center">Mon panier</h2>

    <div class="cart__container">
        <article class="cart__card">
            <div class="cart__box">
                <img src="assets/img/featured1.png" alt="" class="cart__img">
            </div>

            <div class="cart__details">
                <h3 class="cart__title">Jazzmaster</h3>
                <span class="cart__price">$1050</span>

                <div class="cart__amount">
                    <div class="cart__amount-content">
                                <span class="cart__amount-box">
                                    <i class='bx bx-minus' ></i>
                                </span>

                        <span class="cart__amount-number">1</span>

                        <span class="cart__amount-box">
                                    <i class='bx bx-plus' ></i>
                                </span>
                    </div>

                    <i class='bx bx-trash-alt cart__amount-trash' ></i>
                </div>
            </div>
        </article>

        <article class="cart__card">
            <div class="cart__box">
                <img src="assets/img/featured3.png" alt="" class="cart__img">
            </div>

            <div class="cart__details">
                <h3 class="cart__title">Rose Gold</h3>
                <span class="cart__price">$850</span>

                <div class="cart__amount">
                    <div class="cart__amount-content">
                                <span class="cart__amount-box">
                                    <i class='bx bx-minus' ></i>
                                </span>

                        <span class="cart__amount-number">1</span>

                        <span class="cart__amount-box">
                                    <i class='bx bx-plus' ></i>
                                </span>
                    </div>

                    <i class='bx bx-trash-alt cart__amount-trash' ></i>
                </div>
            </div>
        </article>

        <article class="cart__card">
            <div class="cart__box">
                <img src="assets/img/new1.png" alt="" class="cart__img">
            </div>

            <div class="cart__details">
                <h3 class="cart__title">Longines Rose</h3>
                <span class="cart__price">$980</span>

                <div class="cart__amount">
                    <div class="cart__amount-content">
                                <span class="cart__amount-box">
                                    <i class='bx bx-minus' ></i>
                                </span>

                        <span class="cart__amount-number">1</span>

                        <span class="cart__amount-box">
                                    <i class='bx bx-plus' ></i>
                                </span>
                    </div>

                    <i class='bx bx-trash-alt cart__amount-trash' ></i>
                </div>
            </div>
        </article>
    </div>

    <div class="cart__prices">
        <span class="cart__prices-item">3 items</span>
        <span class="cart__prices-total">$2880</span>
    </div>
</div>

<!--==================== MAIN ====================-->
<main class="main">
    <section>
        <div class="home__container container grid">
            <div class="home__data">
                <form class="box" action="" method="post">
                    <h2></h2>
                    <label>
                        <input type="text" class="box-input" name="prenom" placeholder="Prénom" required>
                    </label>
                    <label>
                        <input type="text" class="box-input" name="nom" placeholder="Nom" required>
                    </label>
                    <label>
                        <input type="password" class="box-input" name="password" placeholder="Mot de passe" required>
                    </label>
                    <label>
                        <input type="password" class="box-input" name="confirm_password" placeholder="Confirmez le mot de passe" required>
                    </label>
                    <label>
                        <input type="date" class="box-input" name="date_naissance" placeholder="JJ/MM/YYYY" required>
                    </label>
                    <label>
                        <input type="text" class="box-input" name="adresse" placeholder="123 Rue Exemple, La Ville" required>
                    </label>
                    <label>
                        <input type="email" class="box-input" name="email" placeholder="adresse@mail.com" required>
                    </label>
                    <label>
                        <input type="tel" class="box-input" name="numero_tel" placeholder="0123456789" required>
                    </label>
                    <input type="submit" value="S'inscrire" name="sinscrire" class="box-button">
                </form>
            </div>
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
<script src="assets/js/swiper-bundle.min.js"></script>

<!--=============== MAIN JS ===============-->
<script src="assets/js/main.js"></script>
</body>
