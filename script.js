document.getElementById("reservationForm").addEventListener("submit", function (event) {
    event.preventDefault();
    
    const formData = new FormData(this);
    
    fetch("reserver.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.status === "success") {
            document.getElementById("reservationForm").reset();
        }
    })
    .catch(error => console.error("Erreur :", error));
});

document.getElementById('partnerForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const niveau = document.getElementById('niveau').value;
    const disponibilites = document.getElementById('disponibilites').value;
    alert(`Recherche de partenaire de niveau ${niveau} avec les disponibilités: ${disponibilites}.`);
});

document.getElementById('inscriptionTournoi').addEventListener('click', function() {
    alert('Inscription au tournoi réussie !');
});



document.addEventListener("DOMContentLoaded", function () {
    const timeInput = document.getElementById("time");
    const dateInput = document.getElementById("date");

    // Heures disponibles
    const hours = [
        "09:00", "10:00", "11:00", "12:00", "13:00",
        "14:00", "15:00", "16:00", "17:00", "18:00",
        "19:00", "20:00", "21:00"
    ];

    // Fonction pour charger les heures dans le select
    function loadTimeSlots(reservedSlots = []) {
        timeInput.innerHTML = '<option value="">Sélectionnez une heure</option>';

        hours.forEach(hour => {
            let option = document.createElement("option");
            option.value = hour;
            option.textContent = hour;

            if (reservedSlots.includes(hour)) {
                option.disabled = true;
                option.textContent += " (Réservé)";
            }

            timeInput.appendChild(option);
        });
    }

    // Charger les heures au démarrage
    loadTimeSlots();

    // Vérifier les créneaux réservés quand une date est sélectionnée
    dateInput.addEventListener("change", function () {
        const date = this.value;
        if (!date) return;

        fetch(`getReservations.php?date=${date}`)
            .then(response => response.json())
            .then(reservedSlots => {
                loadTimeSlots(reservedSlots); // Recharger les heures en désactivant celles déjà prises
            })
            .catch(error => console.error("Erreur:", error));
    });
});

