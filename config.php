<?php
$host = "localhost";
$dbname = "badminton_db";
$user = "root"; // Remplace par ton user MySQL si nécessaire
$pass = ""; // Mets ton mot de passe MySQL si besoin

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
