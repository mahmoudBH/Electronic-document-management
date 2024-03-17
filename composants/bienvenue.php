<?php

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_compte'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: Pages/login/login.html");
    exit();
}

// Récupérer le nom complet de l'utilisateur à partir de la base de données en utilisant l'identifiant de compte stocké en session
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "mahmoud bh";
$base_de_donnees = "my-app";

$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse, $base_de_donnees);
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

$id_compte = $_SESSION['id_compte'];
$sql = "SELECT full_name FROM uibprojet_signup WHERE id_compte='$id_compte'";
$result = mysqli_query($connexion, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $full_name = $row['full_name'];
} else {
    $full_name = "Utilisateur";
}

mysqli_close($connexion);
?>
