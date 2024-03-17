<?php
// Vérifie si l'ID du courrier est passé en paramètre GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $courrierId = $_GET['id'];

    // Connexion à la base de données
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "mahmoud bh";
    $dbName = "my-app";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Requête SQL pour récupérer le contenu du fichier en fonction de l'ID du courrier
    $query = "SELECT contenu FROM courriers WHERE id = $courrierId";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Récupérer le contenu du fichier
        $row = $result->fetch_assoc();
        $contenu = $row['contenu'];

        // Définir les en-têtes pour le téléchargement
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="courrier_'.$courrierId.'."');

        // Sortie le contenu du fichier
        echo $contenu;
    } else {
        echo "Courrier non trouvé.";
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    echo "ID du courrier non spécifié.";
}
?>
