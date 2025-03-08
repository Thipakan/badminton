<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La maison du badminton</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>

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




<?php
require "config.php";

// Afficher les tournois disponibles
$stmt = $pdo->query("SELECT * FROM tournois");
$tournois = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Inscription au tournoi
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_utilisateur = $_POST["id_utilisateur"];
    $id_tournoi = $_POST["id_tournoi"];

    // Inscrire l'utilisateur au tournoi
    $stmt = $pdo->prepare("INSERT INTO inscriptions (id_utilisateur, id_tournoi) VALUES (?, ?)");
    if ($stmt->execute([$id_utilisateur, $id_tournoi])) {
        echo json_encode(["status" => "success", "message" => "Inscription au tournoi réussie !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'inscription"]);
    }
}
?>