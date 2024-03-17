<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "mahmoud bh";
$dbname = "my-app";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Traitement de la requête de recherche
if (isset($_POST['search_query'])) {
    $search_query = $_POST['search_query'];
    $sql = "SELECT full_name FROM uibprojet_signup WHERE full_name LIKE '%$search_query%'";
    $result = $conn->query($sql);

    $suggestions = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $suggestions[] = $row['full_name'];
        }
    }
    
    // Retourner les suggestions sous forme de JSON
    echo json_encode($suggestions);
}

$conn->close();
?>