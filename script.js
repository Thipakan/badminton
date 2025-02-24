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

    // Charger les créneaux horaires
    function loadTimeSlots(reservedSlots = []) {
        timeInput.innerHTML = '<option value="">Sélectionnez une heure</option>';

        hours.forEach(hour => {
            const option = document.createElement("option");
            option.value = hour;
            option.textContent = reservedSlots.includes(hour) ? `${hour} (Réservé)` : hour;
            option.disabled = reservedSlots.includes(hour);
            timeInput.appendChild(option);
        });
    }

    // Charger les créneaux au chargement de la page
    loadTimeSlots();

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

    // Gestion du formulaire de réservation
    reservationForm.addEventListener("submit", async function (event) {
        event.preventDefault();

        const formData = new FormData(reservationForm);

        try {
            const response = await fetch("reservation.php", {
                method: "POST",
                body: formData
            });

            const data = await response.json();

            if (data.status === "success") {
                alert("Réservation réussie !");
                reservationForm.reset();
                loadTimeSlots();
            } else {
                alert("Erreur : " + data.message);
            }
        } catch (error) {
            console.error("Erreur lors de la réservation :", error);
        }
    });
});
