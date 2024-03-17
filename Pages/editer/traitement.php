<?php
include '../../composants/connection.php';

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'ID du courrier à partir de l'URL
    $courrier_id = $_GET['id'];

    // Récupérer le nouveau statut du formulaire
    $nouveau_statut = $_POST['nouveau_statut'];

    // Mettre à jour le statut du courrier dans la base de données
    $query_update_statut = "UPDATE courriers SET statut = ?, non_traite = ?, traite = ? WHERE id = ?";
    $non_traite = ($nouveau_statut == "En attente") ? 1 : 0; // Si le statut est "En attente", non_traite = 1, sinon non_traite = 0
    $traite = ($nouveau_statut == "Terminé" || $nouveau_statut == "Refusé") ? 1 : 0; // Si le statut est "Terminé" ou "Refusé", traite = 1, sinon traite = 0
    $stmt = $conn->prepare($query_update_statut);
    $stmt->bind_param("siii", $nouveau_statut, $non_traite, $traite, $courrier_id);
    $stmt->execute();

    // Rediriger l'utilisateur vers la page précédente après la modification
    header("Location: ../non_traiter/non_traiter.php");
    exit();
}

// Si aucun formulaire n'a été soumis, afficher le formulaire d'édition
?>
