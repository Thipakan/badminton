<?php
    // Démarrer la session si besoin
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La maison du badminton</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="images/logo.png" alt="Logo de la maison du badminton">
        <h1>La maison du badminton</h1>
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="reservation.php">Réserver un Terrain</a></li>
            <li><a href="mise-en-relation.php">Mise en Relation</a></li>
            <li><a href="tournois.php">Tournois</a></li>
        </ul>
    </nav>
</header>
    
    <main>
        <section id="reservation">
            <h2>Réserver un Terrain</h2>
            <form id="reservationForm" method="POST" action="traitement_reservation.php">
                <label for="date">Date :</label>
                <input type="date" id="date" name="date" required>
                
                <label for="time">Heure :</label>
                <select id="time" name="time" required>
                    <option value="">Sélectionnez une heure</option>
                </select>
                
                <label for="duration">Durée (heures) :</label>
                <input type="number" id="duration" name="duration" min="1" max="3" required>
                
                <button type="submit">Réserver</button>
            </form>
        </section>
    </main>
    
    <footer>
        <div class="footer-left">
            <h2>La maison du badminton</h2>
            <img src="logo.png" alt="Logo de la maison du badminton">
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
                <a href="#"><img src="facebook.png" alt="Facebook"></a>
                <a href="#"><img src="youtube.png" alt="YouTube"></a>
                <a href="#"><img src="linkedin.png" alt="LinkedIn"></a>
                <a href="#"><img src="instagram.png" alt="Instagram"></a>
            </div>
        </div>
    </footer>
</body>
</html>
