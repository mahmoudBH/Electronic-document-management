<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["id_compte"])) {
    // Rediriger l'utilisateur vers la page de connexion
    header("Location: login.php");
    exit;
}

// Récupérer l'ID du compte de l'utilisateur
$id_compte = $_SESSION["id_compte"];

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

// Récupérer les données de l'utilisateur à partir de la base de données
$sql = "SELECT * FROM uibprojet_signup WHERE id_compte = $id_compte"; 
$result = $conn->query($sql);

// Déclarer les variables pour stocker les données
$full_name = '';
$email = '';
$mobile = '';
$password = '';
$service = '';

if ($result && $result->num_rows > 0) {
    // Récupérer les données de l'utilisateur
    $row = $result->fetch_assoc();
    $full_name = $row['full_name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $password = $row['password'];
    $service = $row['service'];
} else {
    echo "<script>alert('Utilisateur non trouvé.');window.location.href='profile_form.php';</script>";
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données postées depuis le formulaire
    $new_full_name = $_POST['full_name'] ?? '';
    $new_email = $_POST['email'] ?? '';
    $new_mobile = $_POST['mobile'] ?? '';
    $new_password = $_POST['password'] ?? '';
    $new_service = $_POST['service'] ?? '';

    // Vérifier si les nouvelles valeurs sont différentes des valeurs existantes
    if ($new_full_name !== $full_name || $new_email !== $email || $new_mobile !== $mobile || $new_password !== $password || $new_service !== $service) {
        // Préparer et exécuter la requête SQL pour mettre à jour les données dans la base de données
        $update_sql = "UPDATE uibprojet_signup SET full_name='$new_full_name', email='$new_email', mobile='$new_mobile', password='$new_password', service='$new_service' WHERE id_compte = $id_compte";

        if ($conn->query($update_sql) === TRUE) {
            echo "<script>alert('Record updated successfully');setTimeout(function(){window.location.href='./profile.php';});</script>";
        } else {
            echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Aucune modification n'a été apportée.');window.location.href='./profile.php';</script>";
    }
}

// Fermer la connexion
$conn->close();
?>
