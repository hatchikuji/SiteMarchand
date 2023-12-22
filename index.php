<?php
include('php/config.php');
// Initialiser la session
session_start();
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
                    <a href="php/story.php" class="nav__link">Histoire</a>
                </li>
                <li class="nav__item">
                    <a href="php/product.php" class="nav__link">Produits</a>
                </li>
                <?php
                if (isset($_SESSION['utilisateur'])) {
                    $utilisateur = $_SESSION['utilisateur']['nom'];
                    $utilisateur = ucfirst(strtolower($utilisateur));
                    echo "
                <li class='nav__item'>
                    <a href='php/deconnexion.php' class='nav__link'>Deconnexion</a>
                </li>
                <li class='nav__item'>
                    <a href='php/compte.php' class='nav__link'>$utilisateur</a>
                </li>";
                } else {
                    echo "
                <li class='nav__item'>
                    <a href='php/connexion.php' class='nav__link'>Connexion</a>
                </li>
                <li class='nav__item'>
                    <a href='php/inscription.php' class='nav__link'>Inscription</a>
                </li>";
                }
                ?>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class='bx bx-x'></i>
            </div>
        </div>

        <div class="nav__btns">
            <!-- Bouton de changement de theme -->
            <i class='bx bx-moon change-theme' id="theme-button"></i>
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>
            <?php
            if (isset($_SESSION['utilisateur'])) {
                echo "
            <div class='nav__shop' id='cart-shop'>
                <a class='a_panier' href='php/panier.php'><i class='bx bx-shopping-bag' id='panier_button_index'></i></a>
            </div>";
            }
            ?>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt' ></i>
            </div>

        </div>
    </nav>
</header>
<!--==================== MAIN ====================-->
<main class="main">
    <!--==================== HOME ====================-->
    <section class="home" id="home">
        <div class="home__container container grid">
            <div class="home__img-bg">
                <img src="assets/img/home.png" alt="" class="home__img">
            </div>

            <div class="home__social">
                <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                    Facebook
                </a>
                <a href="https://twitter.com/" target="_blank" class="home__social-link">
                    Twitter
                </a>
                <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                    Instagram
                </a>
            </div>

            <div class="home__data">
                <h1 class="home__title">NOUVELLE MONTRE <br>COLLECTION B720</h1>
                <p class="home__description">
                    Dernier arrivage de la nouvelle commande de montres série B720,
                    avec un nouveau modèle.
                </p>
                <span class="home__price">$1245</span>
            </div>
        </div>
    </section>
    <!--==================== TESTIMONIAL ====================-->
    <section class="testimonial section container">
        <div class="testimonial__container grid">
            <div class="swiper testimonial-swiper">
                <div class="swiper-wrapper">
                    <div class="testimonial__card swiper-slide">
                        <div class="testimonial__quote">
                            <i class='bx bxs-quote-alt-left'></i>
                        </div>
                        <p class="testimonial__description">
                            Elles sont les meilleures montres que l'on puisse avoir, la dernière collections est
                            toujours à jour par rapport à la mode actuelle, avec des prix tout à fait abordables
                            avec toute l'attention que l'on vous porte, elles répondront toutes à vos attentes.
                        </p>
                        <h3 class="testimonial__date">15 Novembre 2023</h3>

                        <div class="testimonial__perfil">
                            <img src="assets/img/testimonial1.jpg" alt="" class="testimonial__perfil-img">

                            <div class="testimonial__perfil-data">
                                <span class="testimonial__perfil-name">Swann Brillant</span>
                                <span class="testimonial__perfil-detail">Directeur général</span>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial__card swiper-slide">
                        <div class="testimonial__quote">
                            <i class='bx bxs-quote-alt-left'></i>
                        </div>
                        <p class="testimonial__description">
                            Montres exceptionnelles qui peuvent vous accompagner autant dans la vie de tout les
                            jours qu'aussi bien pour déjeuner avec de la famille que pour vous démarquer lors d'un
                            repas d'entreprise.
                        </p>
                        <h3 class="testimonial__date">9 Décembre 2023</h3>

                        <div class="testimonial__perfil">
                            <img src="assets/img/testimonial2.jpg" alt="" class="testimonial__perfil-img">

                            <div class="testimonial__perfil-data">
                                <span class="testimonial__perfil-name">Lucas Claire</span>
                                <span class="testimonial__perfil-detail">Directeur Marketing</span>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial__card swiper-slide">
                        <div class="testimonial__quote">
                            <i class='bx bxs-quote-alt-left'></i>
                        </div>
                        <p class="testimonial__description">
                            Elles sont tout aussi solides qu'élégantes, que vous pratiquez des sport extrêmes ou
                            bien que vous souhaitez simplement un usage quotidient, elles ne riquent pas de vous
                            décevoir avec une durée de vie aussi longue que notre expérience.
                        </p>
                        <h3 class="testimonial__date">2 Octobre 2023</h3>

                        <div class="testimonial__perfil">
                            <img src="assets/img/testimonial3.jpg" alt="" class="testimonial__perfil-img">

                            <div class="testimonial__perfil-data">
                                <span class="testimonial__perfil-name">Tony Duchemin</span>
                                <span class="testimonial__perfil-detail">Chef du service qualité</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-button-next">
                    <i class='bx bx-right-arrow-alt'></i>
                </div>
                <div class="swiper-button-prev">
                    <i class='bx bx-left-arrow-alt'></i>
                </div>
            </div>

            <div class="testimonial__images">
                <div class="testimonial__square"></div>
                <img src="assets/img/testimonial.png" alt="" class="testimonial__img">
            </div>
        </div>
    </section>


    <!--==================== NEWSLETTER ====================-->
    <section class="newsletter section container">
        <div class="newsletter__bg grid">
            <div>
                <h2 class="newsletter__title">Abonnez-vous<br> Newsletter</h2>
                <p class="newsletter__description">
                    Ne manquez surtout pas nos promotions. Abonnez-vous à notre
                    newsletter pour avoir les meilleures offres, réductions, coupons,
                    cadeaux et plus encore.
                </p>
            </div>

            <form action="" class="newsletter__subscribe">
                <input type="email" placeholder="Entrez votre mail" class="newsletter__input">
                <button class="button">
                    S'ABONNER
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
                    <i class='bx bxl-twitter'></i>
                </a>

                <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                    <i class='bx bxl-instagram'></i>
                </a>
            </ul>
        </div>
    </div>

    <span class="footer__copy">&#169; Brillant. All rigths reserved</span>
</footer>

<!--=============== SCROLL UP ===============-->
<a href="#" class="scrollup" id="scroll-up">
    <i class='bx bx-up-arrow-alt scrollup__icon'></i>
</a>

<!--=============== SWIPER JS ===============-->
<script src="assets/js/swiper-bundle.min.js"></script>

<!--=============== MAIN JS ===============-->
<script src="assets/js/main.js"></script>
</body>
</html>