<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Réservation Badminton</title>
</head>
<body>
    <header>
        <h1>Réservation de Terrains de Badminton</h1>
        <nav>
            <ul>
                <li><a href="#reservation">Réserver un Terrain</a></li>
                <li><a href="#mise-en-relation">Mise en Relation</a></li>
                <li><a href="#tournois">Tournois</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section id="reservation">
            <h2>Réserver un Terrain</h2>
            <form id="reservationForm">
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

        <section id="mise-en-relation">
            <h2>Mise en Relation</h2>
            <p>Trouve un partenaire de jeu selon ton niveau et tes disponibilités.</p>
            <form id="partnerForm">
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

        <section id="tournois">
            <h2>Tournois</h2>
            <p>Inscris-toi à nos prochains tournois nocturnes !</p>
            <button id="inscriptionTournoi">S'inscrire au Tournoi</button>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Réservation Badminton. Tous droits réservés.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
