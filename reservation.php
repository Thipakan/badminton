
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
    
    <main>
        <section id="reservation">
            <h2>Réserver un Terrain</h2>
            <form id="reservationForm" method="POST" action="traitement_reservation.php">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required>

    <label for="surname">Prénom :</label>
    <input type="text" id="surname" name="surname" required>

    <label for="email">E-mail :</label>
    <input type="email" id="email" name="email" required>

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
// Connexion à la base de données
$host = 'localhost';
$dbname = 'badminton_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Échec de la connexion : " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $date_reservation = $_POST['date'];
    $heure = $_POST['time'];
    $duration = $_POST['duration'];

    // Validation des données
    if (empty($name) || empty($surname) || empty($email) || empty($date_reservation) || empty($heure) || empty($duration)) {
        echo "Tous les champs doivent être remplis.";
        exit;
    }

    // Préparation de la requête SQL pour insérer les données
    $sql = "INSERT INTO reservations (name, surname, email, date_reservation, heure, duration) 
            VALUES (:name, :surname, :email, :date_reservation, :heure, :duration)";
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':date_reservation', $date_reservation);
    $stmt->bindParam(':heure', $heure);
    $stmt->bindParam(':duration', $duration);

    // Exécution de la requête
    if ($stmt->execute()) {
        echo "Votre réservation a été effectuée avec succès !<br>";
        echo "Détails de la réservation :<br>";
        echo "Nom : $name<br>";
        echo "Prénom : $surname<br>";
        echo "E-mail : $email<br>";
        echo "Date : $date_reservation<br>";
        echo "Heure : $heure<br>";
        echo "Durée : $duration heure(s)<br>";
    } else {
        echo "Une erreur est survenue lors de la réservation.";
    }
} else {
    echo "Veuillez soumettre le formulaire.";
}
?>






<script>document.addEventListener("DOMContentLoaded", function () {
    const reservationForm = document.getElementById("reservationForm");

    reservationForm.addEventListener("submit", function (event) {
        // Récupération des valeurs du formulaire
        const name = document.getElementById("name").value;
        const surname = document.getElementById("surname").value;
        const email = document.getElementById("email").value;
        const date = document.getElementById("date").value;
        const time = document.getElementById("time").value;
        const duration = document.getElementById("duration").value;

        // Vérification que tous les champs sont remplis
        if (!name || !surname || !email || !date || !time || !duration) {
            alert("Veuillez remplir tous les champs avant de réserver.");
            event.preventDefault(); // Bloque l'envoi du formulaire
            return;
        }

        // Création du message de confirmation
        const confirmationMessage = `Confirmez-vous votre réservation ?\n\n` +
            `👤 Nom : ${name} ${surname}\n📧 Email : ${email}\n📅 Date : ${date}\n🕒 Heure : ${time}\n⏳ Durée : ${duration} heure(s)`;

        // Affichage de la boîte de confirmation
        const isConfirmed = confirm(confirmationMessage);

        // Si l'utilisateur annule, empêcher la soumission
        if (!isConfirmed) {
            event.preventDefault();
        }
    });
});
</script>
