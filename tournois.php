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
<body>
    <main>
        <section id="tournoi">
            <h2>Participer au tournoi</h2>
            <form id="tournoiForm">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>

                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" required>

                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" required>

                <label for="niveau">Niveau en badminton</label>
                <select id="niveau" name="niveau" required>
                    <option value="débutant">Débutant</option>
                    <option value="intermédiaire">Intermédiaire</option>
                    <option value="avancé">Avancé</option>
                </select>

                <button type="submit">Confirmer</button>
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
