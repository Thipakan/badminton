document.addEventListener("DOMContentLoaded", function () {
    const reservationForm = document.getElementById("reservationForm");
    const timeInput = document.getElementById("time");
    const dateInput = document.getElementById("date");

    // Heures disponibles
    const hours = [
        "09:00", "10:00", "11:00", "12:00", "13:00",
        "14:00", "15:00", "16:00", "17:00", "18:00",
        "19:00", "20:00", "21:00"
    ];

    // Fonction pour charger les créneaux horaires avec les créneaux réservés
    function loadTimeSlots(reservedSlots = []) {
        timeInput.innerHTML = '<option value="">Sélectionnez une heure</option>';

        hours.forEach(hour => {
            const isReserved = reservedSlots.includes(hour);
            const option = document.createElement("option");
            option.value = hour;
            option.textContent = isReserved ? `${hour} (Réservé)` : hour;
            option.disabled = isReserved;
            timeInput.appendChild(option);
        });
    }

    // Vérifier les créneaux réservés lorsqu'une date est sélectionnée
    dateInput.addEventListener("change", async function () {
        if (!this.value) return;

        try {
            const response = await fetch(`reservation.php?date=${this.value}`);
            const reservedSlots = await response.json();
            loadTimeSlots(reservedSlots);
        } catch (error) {
            console.error("Erreur lors de la récupération des créneaux réservés :", error);
        }
    });

    // Validation du formulaire avec confirmation de la réservation
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
            event.preventDefault();
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

    // Charger les créneaux horaires dès que la page est prête
    loadTimeSlots();
});
