<?php

$query_id_compte = "SELECT full_name FROM uibprojet_signup WHERE ID_compte = ?";
$stmt = $conn->prepare($query_id_compte);
$stmt->bind_param("s", $id_compte);
$stmt->execute();
$result_id_compte = $stmt->get_result();

if ($result_id_compte->num_rows === 1) {
    $row_id_compte = $result_id_compte->fetch_assoc();
    $destinataire = $row_id_compte['full_name'];

    // Requête SQL pour récupérer les courriers du destinataire (utilisateur connecté)
    $query_courriers = "SELECT * FROM courriers WHERE destinataire = ? AND traite = 0";
    $stmt = $conn->prepare($query_courriers);
    $stmt->bind_param("s", $destinataire);
    $stmt->execute();
    $result_courriers = $stmt->get_result();

    // Affichage du nombre de lignes dans le tableau
    $nbNonTraites = $result_courriers->num_rows;
}

// Requête SQL pour compter le nombre de fichiers traités
$query_id_compte = "SELECT full_name FROM uibprojet_signup WHERE ID_compte = ?";
$stmt = $conn->prepare($query_id_compte);
$stmt->bind_param("s", $id_compte);
$stmt->execute();
$result_id_compte = $stmt->get_result();

if ($result_id_compte->num_rows === 1) {
    $row_id_compte = $result_id_compte->fetch_assoc();
    $destinataire = $row_id_compte['full_name'];

    // Requête SQL pour récupérer les courriers traités du destinataire (utilisateur connecté)
    $query_courriers = "SELECT * FROM courriers WHERE destinataire = ? AND traite = 1";
    $stmt = $conn->prepare($query_courriers);
    $stmt->bind_param("s", $destinataire);
    $stmt->execute();
    $result_courriers = $stmt->get_result();

    // Affichage du nombre de lignes dans le tableau
    $nbTraites = $result_courriers->num_rows;
}
// Requête SQL pour compter le nombre de fichiers archivés
$queryArchives = "SELECT COUNT(*) AS nb_archives FROM courriers WHERE signup_id = '$id_compte' AND archived = 1";
$resultArchives = $conn->query($queryArchives);
$rowArchives = $resultArchives->fetch_assoc();
$nbArchives = $rowArchives['nb_archives'];

$queryTotal = "SELECT COUNT(*) AS total FROM courriers WHERE signup_id = '$id_compte' AND (archived = 0 OR archived = 1)";
$resultTotal = $conn->query($queryTotal);
$rowTotal = $resultTotal->fetch_assoc();
$totalFiles = $rowTotal['total'];

// Calculer les pourcentages
$nbNonTraitesPercentage = ($totalFiles > 0) ? ($nbNonTraites / $totalFiles) * 100 : 0;
$nbTraitesPercentage = ($totalFiles > 0) ? ($nbTraites / $totalFiles) * 100 : 0;
$nbArchivesPercentage = ($totalFiles > 0) ? ($nbArchives / $totalFiles) * 100 : 0;
?>
