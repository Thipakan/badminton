<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La maison du badminton</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
    <style>
        .services {
            display: flex;
            flex-direction: column;
        }
        .service {
            position: relative;
            color: white;
            text-align: center;
            padding: 150px 20px;
            background-size: cover;
            background-position: center;
        }
        .service h3, .service p {
            position: relative;
            z-index: 2;
        }
        .service::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        .service + .service {
            border-top: 5px solid white;
        }
        .terrain {
            background-image: url('images/terrain.jpg');
        }
        .partenaire {
            background-image: url('images/partenaire.jpg');
        }
        .tournoi {
            background-image: url('images/tournoi.jpg');
        }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="images/logo.png" alt="Logo de la maison du badminton">
        <h1>La maison du badminton</h1>
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="reservation.php">Réserver un Terrain</a></li>
            <li><a href="mise-en-relation.php">Mise en Relation</a></li>
            <li><a href="tournois.php">Tournois</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="services">
        <div class="service terrain">
            <h3>Réserver un terrain</h3>
            <p>Choisissez un créneau et profitez d'une salle adaptée à votre niveau.</p>
            <a href="reservation.php" class="btn">Voir les disponibilités</a>
        </div>
        <div class="service partenaire">
            <h3>Trouvez un partenaire</h3>
            <p>Nous vous aidons à trouver le partenaire idéal selon votre niveau.</p>
            <a href="mise-en-relation.php" class="btn">Trouver un partenaire</a>
        </div>
        <div class="service tournoi">
            <h3>Participez aux tournois</h3>
            <p>Affrontez d'autres joueurs et tentez de remporter nos tournois.</p>
            <a href="tournois.php" class="btn">Voir les prochains tournois</a>
        </div>
    </section>
</main>

<footer>
    <div class="footer-left">
        <h2>La maison du badminton</h2>
        <img src="images/logo.png" alt="Logo de la maison du badminton">
    </div>
    <div class="footer-center">
        <ul>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Mentions légales</a></li>
            <li><a href="#">CGU</a></li>
            <li><a href="#">Politique de confidentialité</a></li>
        </ul>
    </div>
    <div class="footer-right">
        <h3>Suivez-nous</h3>
        <div class="social-icons">
            <a href="#"><img src="images/facebook.png" alt="Facebook"></a>
            <a href="#"><img src="images/youtube.png" alt="YouTube"></a>
            <a href="#"><img src="images/linkedin.png" alt="LinkedIn"></a>
            <a href="#"><img src="images/instagram.jfif" alt="Instagram"></a>
        </div>
    </div>
</footer>
</body>
</html>
