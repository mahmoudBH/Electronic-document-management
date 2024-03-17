<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_compte'])) {
    header("Location: ../login/login.html"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit;
}

$id_compte = $_SESSION['id_compte']; // Récupérer l'ID de compte de l'utilisateur connecté

// Connexion à la base de données
$host = "localhost";
$dbUsername = "root";
$dbPassword = "mahmoud bh";
$dbName = "my-app";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

?>