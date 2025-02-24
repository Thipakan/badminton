<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $date = $_POST["date"];
    $heure = $_POST["time"];

    // Vérifier si le créneau est déjà pris
    $stmt = $pdo->prepare("SELECT * FROM reservations WHERE date_reservation = ? AND heure = ?");
    $stmt->execute([$date, $heure]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(["status" => "error", "message" => "Créneau déjà réservé"]);
    } else {
        // Insérer la réservation
        $stmt = $pdo->prepare("INSERT INTO reservations (date_reservation, heure) VALUES (?, ?)");
        if ($stmt->execute([$date, $heure])) {
            echo json_encode(["status" => "success", "message" => "Réservation confirmée !"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Erreur lors de la réservation"]);
        }
    }
}
?>
