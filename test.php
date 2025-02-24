<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'badminton_db';
$username = 'root'; // Modifie si nécessaire
$password = ''; // Modifie si nécessaire



try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Heures disponibles
$hours = [
    "09:00", "10:00", "11:00", "12:00", "13:00",
    "14:00", "15:00", "16:00", "17:00", "18:00",
    "19:00", "20:00", "21:00"
];

// Vérification des créneaux déjà réservés
$reservedSlots = [];
if (isset($_POST['date'])) {
    $date = $_POST['date'];

    $sql = "SELECT heure FROM reservations WHERE date_reservation = :date";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':date', $date);
    $stmt->execute();
    $reservedSlots = $stmt->fetchAll(PDO::FETCH_COLUMN);
}

// Traitement du formulaire
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['time'])) {
    $date = $_POST['date'];
    $heure = $_POST['time'];

    // Vérifier si l'heure est déjà réservée
    if (in_array($heure, $reservedSlots)) {
        $message = "<p style='color:red;'>Erreur : L'heure sélectionnée est déjà réservée.</p>";
    } else {
        try {
            $sql = "INSERT INTO reservations (date_reservation, heure) VALUES (:date, :heure)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':heure', $heure);
            $stmt->execute();

            $message = "<p style='color:green;'>Réservation réussie !</p>";
            $reservedSlots[] = $heure; // Met à jour la liste des créneaux réservés
        } catch (PDOException $e) {
            $message = "<p style='color:red;'>Erreur lors de la réservation : " . $e->getMessage() . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - La maison du badminton</title>
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
            <li><a href="index.php">Accueil</a></li>
            <li><a href="reservation.php">Réserver un Terrain</a></li>
            <li><a href="mise-en-relation.php">Mise en Relation</a></li>
            <li><a href="tournois.php">Tournois</a></li>
        </ul>
    </nav>
</header>

<main>
    <section id="reservation">
        <h2>Réserver un Terrain</h2>
        
        <?= $message; ?>
        
        <form method="POST" action="reservation.php">
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required value="<?= isset($_POST['date']) ? $_POST['date'] : ''; ?>">

            <label for="time">Heure :</label>
            <select id="time" name="time" required>
                <option value="">Sélectionnez une heure</option>
                <?php foreach ($hours as $hour): ?>
                    <option value="<?= $hour; ?>" <?= in_array($hour, $reservedSlots) ? 'disabled' : ''; ?>>
                        <?= $hour . (in_array($hour, $reservedSlots) ? ' (Réservé)' : ''); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <button type="submit">Réserver</button>
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

// Ajouter cette ligne pour définir le type de contenu en JSON
header("Content-Type: application/json");

// Exemple de retour d'une erreur 404 si la page n'existe pas
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Méthode non autorisée."]);
    exit();
}
?>

















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
