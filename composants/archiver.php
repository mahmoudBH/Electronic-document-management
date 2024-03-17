<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_compte'])) {
    header("Location: ../Pages/login/login.html"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit;
}

$id_compte = $_SESSION['id_compte']; // Récupérer l'ID de compte de l'utilisateur connecté

// Vérifier si l'identifiant du courrier à archiver est présent dans la requête GET
if (!isset($_GET['id'])) {
    header("Location: ../index.php"); // Rediriger vers la page principale si l'identifiant du courrier n'est pas fourni
    exit;
}

$courrier_id = $_GET['id']; // Récupérer l'identifiant du courrier à archiver à partir de la requête GET

// Connexion à la base de données
$host = "localhost";
$dbUsername = "root";
$dbPassword = "mahmoud bh";
$dbName = "my-app";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Mettre à jour la colonne archived du courrier à archiver
$update_query = "UPDATE courriers SET archived = 1 WHERE id = ? AND signup_id = ?";
$stmt = $conn->prepare($update_query);
$stmt->bind_param("ss", $courrier_id, $id_compte);

if ($stmt->execute()) {
    // Redirection vers la page précédente après l'archivage du courrier
    header("Location: " . $_SERVER["HTTP_REFERER"]);
} else {
    echo "Erreur lors de l'archivage du courrier : " . $conn->error;
}

$stmt->close();
$conn->close();
?>
