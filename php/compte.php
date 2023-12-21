<?php
include('config.php');
// Initialiser la session
session_start();
$connect_site = mysqli_connect(DB_SERVER,DB_SITE,DB_SITEP,DB_SITE_NOM);
$nom = mysqli_query($connect_site,"SELECT nom FROM site_marchand_swann.utilisateurs WHERE pseudo='".$_SESSION['pseudo']."';");
$nom = mysqli_fetch_row($nom);

$prenom = mysqli_query($connect_site,"SELECT prenom FROM site_marchand_swann.utilisateurs WHERE pseudo='".$_SESSION['pseudo']."';");
$prenom = mysqli_fetch_row($prenom);

$email = mysqli_query($connect_site,"SELECT email FROM site_marchand_swann.utilisateurs WHERE pseudo='".$_SESSION['pseudo']."';");
$email = mysqli_fetch_row($email);

$numero_tel = mysqli_query($connect_site,"SELECT numero_tel FROM site_marchand_swann.utilisateurs WHERE pseudo='".$_SESSION['pseudo']."';");
$numero_tel = mysqli_fetch_row($numero_tel);

$adresse = mysqli_query($connect_site,"SELECT adresse FROM site_marchand_swann.utilisateurs WHERE pseudo='".$_SESSION['pseudo']."';");
$adresse = mysqli_fetch_row($adresse);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="../assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../assets/css/styles.css">

    <title>Compte</title>
</head>
<body>
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
                    <?php
                    if(isset($_SESSION['pseudo'])){
                        $pseudo = $_SESSION['pseudo'];
                        $pseudo = ucfirst(strtolower($pseudo));
                        echo "
                <li class='nav__item'>
                    <a href='deconnexion.php' class='nav__link'>Deconnexion</a>
                </li>
                <li class='nav__item'>
                    <a href='compte.php' class='nav__link  active-link'>$pseudo</a>
                </li>";
                    }else {echo "
                <li class='nav__item'>
                    <a href='connexion.php' class='nav__link'>Connexion</a>
                </li>
                <li class='nav__item'>
                    <a href='inscription.php' class='nav__link'>Inscription</a>
                </li>";}
                    ?>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class='bx bx-x' ></i>
            </div>
        </div>

        <div class="nav__btns">
            <!-- Theme change button -->
            <i class='bx bx-moon change-theme' id="theme-button"></i>

            <div class="nav__shop" id="cart-shop">
                <i class='bx bx-shopping-bag' id="panier_button"></i>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt' ></i>
            </div>
        </div>
    </nav>
</header>
<section class="section container" id="">
    <div class="container">
        <div class="story__images">
            <img src="../assets/img/product12.png" width="400" height="613" alt="pic">
        </div>
        <div class="story__description">
            <?php echo "
            <h3>Nom: $nom[0]</h3>
            <h3>Prénom: $prenom[0]</h3>
            <h3>Nom d'utilisateur: "?><?php echo $_SESSION['pseudo']?><?php echo"</h3>
            <h3>Adresse mail: $email[0]</h3>
            <h3>Numero de téléphone: $numero_tel[0]</h3>
            <h3>Adresse: $adresse[0]</h3>
            "?>
        </div>
    </div>
</section>
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
            <h3 class="footer__title">Histoire</h3>

            <ul class="footer__links">
                <li>
                    <a href="#" class="footer__link">Vélos de ville</a>
                </li>
                <li>
                    <a href="#" class="footer__link">Vélos de montagnes</a>
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
</html>

