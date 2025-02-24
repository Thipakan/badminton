<?php
// Afficher les erreurs pour débogage (enlever en production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Paramètres de connexion à la base de données
$host = 'localhost'; // ou l'adresse de ton serveur
$dbname = 'badminton_db'; // le nom de ta base de données
$username = 'root'; // ton utilisateur MySQL
$password = ''; // ton mot de passe MySQL

// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'] ?? null;
$prenom = $_POST['prenom'] ?? null;
$email = $_POST['email'] ?? null;
$niveau = $_POST['niveau'] ?? null;
$disponibilites = $_POST['disponibilites'] ?? null;

// Variable pour le message
$message = '';

// Vérification des champs
if ($nom && $prenom && $email && $niveau && $disponibilites) {
    // Préparation de la requête SQL pour insérer les données dans la table utilisateurs
    $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, prenom, email, niveau, disponibilites) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nom, $prenom, $email, $niveau, $disponibilites); // "sssss" : 5 paramètres de type chaîne de caractères
    
    // Exécution de la requête
    if ($stmt->execute()) {
        $message = "Le formulaire a été rempli. Nous allons vous rechercher un partenaire dans les plus brefs délais.";
        // Utiliser la redirection après 5 secondes
        header("refresh:5;url=index.php");
    } else {
        $message = "Erreur lors de l'enregistrement des données : " . $stmt->error;
    }

    // Fermeture de la requête
    $stmt->close();
} else {
    $message = "Veuillez remplir tous les champs.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La maison du badminton</title>
    <link rel="stylesheet" href="styles.css">
    <meta http-equiv="refresh" content="5;url=index.php"> <!-- Redirige après 5 secondes -->
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
    <section id="mise-en-relation">
        <h2>Mise en Relation</h2>
        <p>Trouve un partenaire de jeu selon ton niveau et tes disponibilités.</p>
        <form id="partnerForm" method="POST" action="">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
            
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
            
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            
            <label for="niveau">Niveau de jeu :</label>
            <select id="niveau" name="niveau">
                <option value="débutant">Débutant</option>
                <option value="intermédiaire">Intermédiaire</option>
                <option value="avancé">Avancé</option>
            </select>
            
            <label for="disponibilites">Disponibilités :</label>
            <input type="text" id="disponibilites" name="disponibilites" placeholder="Ex : Lun-Dim, 18h-21h" required>
            
            <button type="submit">Trouver un Partenaire</button>
        </form>
        
        <!-- Affichage du message -->
        <?php if ($message): ?>
            <div class="message">
                <p><?php echo $message; ?></p>
            </div>
        <?php endif; ?>
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
