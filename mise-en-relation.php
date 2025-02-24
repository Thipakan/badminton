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
    <section id="mise-en-relation">
        <h2>Mise en Relation</h2>
        <p>Trouve un partenaire de jeu selon ton niveau et tes disponibilités.</p>
        <form id="partnerForm" method="POST" action="traitement_partenaire.php">
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

<?php
// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement des données POST ici
    $nom = $_POST['nom'] ?? null;
    $prenom = $_POST['prenom'] ?? null;
    $email = $_POST['email'] ?? null;
    $niveau = $_POST['niveau'] ?? null;
    $disponibilites = $_POST['disponibilites'] ?? null;
    
    if ($nom && $prenom && $email && $niveau && $disponibilites) {
        // Traiter les données (ex : les enregistrer dans une base de données)
        echo "Partenaire trouvé avec nom : $nom, prénom : $prenom, email : $email, niveau : $niveau et disponibilité : $disponibilites";
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>
</body>
</html>
