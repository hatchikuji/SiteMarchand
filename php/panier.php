<?php
// Assurez-vous que la session est démarrée
include('config.php');
session_start();
$connect_site = mysqli_connect(DB_SERVER, DB_SITE,DB_SITEP,DB_SITE_NOM);

// Vérifiez si une action spécifique a été demandée
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Ajouter'])) {
        // Récupérez les données du formulaire
        $idProduit = $_POST['idProduit'];
        $prixProduit = $_POST['prixProduit'];

        // Vérifiez si le produit est déjà dans le panier
        $produitExiste = false;
        foreach ($_SESSION['utilisateur']['panier'] as &$produit) {
            if ($produit['idProduit'] == $idProduit) {
                $produit['quantite'] += 1; // Augmentez la quantité si le produit existe déjà
                $produitExiste = true;
                break;
            }
        }

        // Si le produit n'existe pas, ajoutez-le au panier
        if (!$produitExiste) {
            $_SESSION['utilisateur']['panier'][] = array('idProduit' => $idProduit, 'prixProduit' => $prixProduit, 'quantite' => 1);
        }

    } elseif (isset($_POST['Supprimer'])) {
        // Supprimez le produit du panier
        $idProduit = $_POST['idProduit'];
        foreach ($_SESSION['utilisateur']['panier'] as $index => $produit) {
            if ($produit['idProduit'] == $idProduit) {
                unset($_SESSION['utilisateur']['panier'][$index]);
                break;
            }
        }
    } elseif (isset($_POST['MettreAJourQuantite'])) {
        // Mettez à jour la quantité du produit dans le panier
        $idProduit = $_POST['idProduit'];
        $nouvelleQuantite = $_POST['nouvelleQuantite'];
        foreach ($_SESSION['utilisateur']['panier'] as &$produit) {
            if ($produit['idProduit'] == $idProduit) {
                $produit['quantite'] = $nouvelleQuantite;
                break;
            }
        }
    }
}

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
                    <a href="../index.php" class="nav__link ">Home</a>
                </li>
                <li class="nav__item">
                    <a href="story.php" class="nav__link">Histoire</a>
                </li>
                <li class="nav__item">
                    <a href="product.php" class="nav__link">Produits</a>
                </li>
                <?php
                if (isset($_SESSION['utilisateur'])) {
                    $utilisateur = $_SESSION['utilisateur']['nom'];
                    $utilisateur = ucfirst(strtolower($utilisateur));
                    echo "
                <li class='nav__item'>
                    <a href='deconnexion.php' class='nav__link'>Deconnexion</a>
                </li>
                <li class='nav__item'>
                    <a href='compte.php' class='nav__link'>$utilisateur</a>
                </li>";
                } else {
                    echo "
                <li class='nav__item'>
                    <a href='connexion.php' class='nav__link'>Connexion</a>
                </li>
                <li class='nav__item'>
                    <a href='inscription.php' class='nav__link'>Inscription</a>
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

            <div class="nav__shop" id="cart-shop">
                <a class="a_panier" href="panier.php"><i class='bx bx-shopping-bag' id="panier_button_index"></i></a>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt' ></i>
            </div>
        </div>
    </nav>
</header>
<section class="product section container" id="product">
    <h2 class="section__title">Panier</h2>

    <div class="products__container grid">
        <?php
        if (isset($_SESSION['utilisateur']['panier']) && !empty($_SESSION['utilisateur']['panier'])) {
            $prixTotal = 0;

            foreach ($_SESSION['utilisateur']['panier'] as $produit) {
                $idProduit = $produit['idProduit'];
                $prixProduit = $produit['prixProduit'];
                $quantite = $produit['quantite'];

                // Calculez le sous-total pour chaque produit
                $sousTotal = $prixProduit * $quantite;

                // Ajoutez le sous-total au prix total
                $prixTotal += $sousTotal;

                // Affichez les détails du produit dans le panier
                $chemin = "chemin";
                $nom = "nom";
                $nb_produit = mysqli_fetch_assoc(mysqli_query($connect_site,"SELECT COUNT(*) AS NB FROM site_marchand_swann.produits"));

                $query_produits = mysqli_query($connect_site,"SELECT * FROM site_marchand_swann.produits WHERE produits.id=$idProduit");
                while($row = mysqli_fetch_assoc($query_produits)) {
                    echo "
                    <article class='products__card'>
                        <form method='post' action='panier.php'>
                        <img src='{$row[$chemin]}' class='products__img' alt='/img'>
                        <h3 class='products__title'>{$row[$nom]}</h3>
                        <p>Prix: $prixProduit, Quantité: <input type='number' name='nouvelleQuantite' value='$quantite' placeholder='1' min='1'>
                        <button type='submit' name='MettreAJourQuantite'>Mettre à jour</button>
                        <button type='submit' name='Supprimer'>Supprimer</button></p>
                        <input type='hidden' name='idProduit' value='$idProduit'>
                        </form>
                    </article>";
                }
            }
            echo "<p>Prix total: $prixTotal</p>";
        }
        else {
            echo "<p>Le panier est vide.</p>";
        }

        ?>
    </div>
</section>
