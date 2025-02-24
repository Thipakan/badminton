<?php
require "config.php";

if (isset($_GET["date"])) {
    $date = $_GET["date"];
    $stmt = $pdo->prepare("SELECT heure FROM reservations WHERE date_reservation = ?");
    $stmt->execute([$date]);
    
    $reservedSlots = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo json_encode($reservedSlots);
}
?>
