<?php
// Vérifiez si l'identifiant du fichier à supprimer est défini
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Connexion à la base de données
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "mahmoud bh";
    $dbName = "my-app";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Récupérer l'identifiant du fichier à supprimer
    $id = $_GET['id'];

    // Requête SQL pour supprimer le fichier de la base de données
    $query = "DELETE FROM courriers WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        echo "Fichier supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du fichier : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    echo "Identifiant du fichier non valide.";
}
?>