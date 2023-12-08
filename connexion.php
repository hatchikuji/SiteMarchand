<?php
require 'config.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
<!--==================== NEWSLETTER ====================-->
<section class="newsletter section container">
    <div class="newsletter__bg grid">
        <div>
            <h2 class="newsletter__title">Subscribe Our <br> Newsletter</h2>
            <p class="newsletter__description">
                Don't miss out on your discounts. Subscribe to our email
                newsletter to get the best offers, discounts, coupons,
                gifts and much more.
            </p>
        </div>

        <form action="" class="newsletter__subscribe">
            <input type="email" placeholder="Enter your email" class="newsletter__input">
            <button class="button">
                SUBSCRIBE
            </button>
        </form>
    </div>
</section>
</main>


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
