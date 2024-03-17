<?php
session_start();
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "mahmoud bh";
$base_de_donnees = "my-app";

$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse, $base_de_donnees);
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

if (isset($_POST['sign-up'])) {
    // Traitement du formulaire d'inscription
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password']; // Utilisez le hachage de mot de passe pour la sécurité
    $service = $_POST['service']; // Ajout du champ type

    // Insertion des données dans la base de données
    $sql = "INSERT INTO uibprojet_signup (full_name, email, mobile, password, service) VALUES ('$full_name', '$email', '$mobile', '$password', '$service')";

    if (mysqli_query($connexion, $sql)) {
        echo '<script>alert("Inscription réussie !"); window.location.href = "login.html";</script>';
    } else {
        echo "Erreur lors de l'inscription : " . mysqli_error($connexion);
    }
}

if (isset($_POST['login'])) {
    // Traitement du formulaire de connexion
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifiez les informations de connexion dans la base de données
    $sql = "SELECT id_compte FROM uibprojet_signup WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connexion, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Si la connexion est réussie, récupérer l'id_compte de l'utilisateur
        $row = mysqli_fetch_assoc($result);
        $id_compte = $row['id_compte'];

        $_SESSION['id_compte'] = $id_compte;

        // Rediriger l'utilisateur vers la page index.html avec l'id_compte en tant que paramètre
        header("Location: ../../index.php?id_compte=$id_compte");
        exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
    } else {
        echo "Identifiants incorrects.";
    }
}

mysqli_close($connexion);
?>
