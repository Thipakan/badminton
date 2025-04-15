<?php
require "config.php";

// Récupérer les tournois avec leurs descriptions, images et places max
$stmt = $pdo->query("SELECT * FROM tournois WHERE date_tournoi >= CURDATE() ORDER BY date_tournoi ASC");
$tournois = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Traitement du formulaire d'inscription
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['niveau']) && !empty($_POST['categories']) && !empty($_POST['id_tournoi'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $niveau = htmlspecialchars($_POST['niveau']);
        $categories = $_POST['categories']; 
        $id_tournoi = intval($_POST['id_tournoi']);

        // Récupérer les inscriptions actuelles et les places disponibles
        $stmt = $pdo->prepare("SELECT nom_tournoi, inscrits, places_max FROM tournois WHERE id = ?");
        $stmt->execute([$id_tournoi]);
        $tournoi = $stmt->fetch(PDO::FETCH_ASSOC);
        $nomTournoi = $tournoi['nom_tournoi'];

        $inscriptions = !empty($tournoi['inscrits']) ? json_decode($tournoi['inscrits'], true) : [];
        $placesMax = $tournoi['places_max'];
        $placesPrises = count($inscriptions);

        if ($placesPrises >= $placesMax) {
            $message = "Le tournoi est complet !";
        } else {
            // Vérifier si l'email est déjà inscrit
            $alreadyRegistered = false;
            foreach ($inscriptions as $inscrit) {
                if ($inscrit['email'] === $email) {
                    $alreadyRegistered = true;
                    break;
                }
            }

            if ($alreadyRegistered) {
                $message = "Vous êtes déjà inscrit à ce tournoi !";
            } else {
                // Ajouter la nouvelle inscription
                $inscriptions[] = [
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "email" => $email,
                    "niveau" => $niveau,
                    "categories" => $categories,
                    "tournoi" => $nomTournoi
                ];

                // Encoder en JSON et mettre à jour la BDD
                $stmt = $pdo->prepare("UPDATE tournois SET inscrits = ? WHERE id = ?");
                $stmt->execute([json_encode($inscriptions), $id_tournoi]);

                $message = "Inscription réussie à $nomTournoi !";
            }
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournois - La maison du badminton</title>
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
<main>
    <h1>Prochains Tournois</h1>
    <?php if (!empty($tournois)) : ?>
        <?php foreach ($tournois as $tournoi) : ?>
            <?php 
                $inscriptions = !empty($tournoi['inscrits']) ? json_decode($tournoi['inscrits'], true) : [];
                $placesPrises = count($inscriptions);
                $complet = $placesPrises >= $tournoi['places_max'];
            ?>
            <section class="tournoi-info">
                <h2><?= htmlspecialchars($tournoi['nom_tournoi']) ?></h2>
                <?php if (!empty($tournoi['image'])) : ?>
                    <img src="<?= htmlspecialchars($tournoi['image']) ?>" alt="Image du tournoi" class="tournoi-image">
                <?php endif; ?>
                <p><strong>Date :</strong> <?= htmlspecialchars($tournoi['date_tournoi']) ?></p>
                <p><strong>Places :</strong> <?= $placesPrises ?> / <?= $tournoi['places_max'] ?></p>
                <?php if (!empty($tournoi['description'])) : ?>
                    <p><strong>Description :</strong> <?= nl2br(htmlspecialchars($tournoi['description'])) ?></p>
                <?php endif; ?>
                
                <?php if ($complet) : ?>
                    <p class="complet">Tournoi complet !</p>
                <?php else : ?>
                    <form method="POST">
                        <input type="hidden" name="id_tournoi" value="<?= $tournoi['id'] ?>">
                        <input type="text" name="nom" placeholder="Nom" required>
                        <input type="text" name="prenom" placeholder="Prénom" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <select name="niveau" required>
                            <option value="débutant">Débutant</option>
                            <option value="intermédiaire">Intermédiaire</option>
                            <option value="avancé">Avancé</option>
                        </select>
                        <fieldset>
                            <legend>Catégories</legend>
                            <label><input type="checkbox" name="categories[]" value="Simple"> Simple</label>
                            <label><input type="checkbox" name="categories[]" value="Double Hommes"> Double Hommes</label>
                            <label><input type="checkbox" name="categories[]" value="Double Femmes"> Double Femmes</label>
                            <label><input type="checkbox" name="categories[]" value="Mixte"> Mixte</label>
                        </fieldset>
                        <button type="submit">S'inscrire</button>
                    </form>
                <?php endif; ?>
            </section>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucun tournoi à venir.</p>
    <?php endif; ?>
    <?php if (isset($message)) : ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
</main>
<style>
    .complet {
        color: red;
        font-weight: bold;
    }
</style>
</body>
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
</html>
