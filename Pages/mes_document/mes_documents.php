<?php
include '../../composants/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion électronique du document</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/user.css">
</head>

<body>
    <!-- Navigation -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 navigation">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="../../assets/imgs/GED-2.png" alt="ged" class="ged">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">
                            <span class="icon">
                                <ion-icon name="apps-outline"></ion-icon>
                            </span>
                            Tableau de bord
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../enregistrer/enregistrer.php">
                            <span class="icon">
                                <ion-icon name="add-circle-outline"></ion-icon>
                            </span>
                            Enregistrer un Document
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../mes_document/mes_documents.php">
                            <span class="icon">
                                <ion-icon name="document-text-outline"></ion-icon>
                            </span>
                            Mes Documents
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../recherche/recherche.php">
                            <span class="icon">
                                <ion-icon name="search-outline"></ion-icon>
                            </span>
                            Recherche de Documents
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../traiter/traiter.php">
                            <span class="icon">
                                <ion-icon name="checkmark-circle-outline"></ion-icon>
                            </span>
                            Documents traités
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../non_traiter/non_traiter.php">
                            <span class="icon">
                                <ion-icon name="close-circle-outline"></ion-icon>
                            </span>
                            Documents non traités
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../archive/archive.php">
                            <span class="icon">
                                <ion-icon name="archive-outline"></ion-icon>
                            </span>
                            Archive
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact/contact.php">
                            <span class="icon">
                                <ion-icon name="person-outline"></ion-icon>
                            </span>
                            Contact
                        </a>
                    </li>
                    <!-- Ajoutez d'autres éléments de navigation ici -->
                </ul>
            </div>
            <!-- Main Content -->
            <div class="col-md-9 main">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>

                    <div class="search">
                        <label class="sr-only" for="searchInput">Recherche...</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchInput" placeholder="Recherche...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <ion-icon name="search-outline"></ion-icon>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <img src="../../assets/imgs/profile.png" alt="User" class="user-avatar">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="../profile/profile.php">Mon Profile</a>
                                <a class="dropdown-item" href="../../composants/logout.php">Se déconnecter</a>
                            </div>
                    </div>
                    

                </div>

                <!-- Form Content -->
                <div class="container mt-4">
                    <h1>Mes Documents</h1>
                    <br>
                    <table class='table table-striped table-bordered'>
                        <thead class="thead-dark">
                            <tr>
                                <th>Date d'envoi</th>
                                <th>Type de courrier</th>
                                <th>Objet du courrier</th>
                                <th>Service de traitement</th>
                                <th>Expéditeur</th>
                                <th>Statut</th>
                                <th>Supprimer le document</th>
                                <th>Bascule vers l archive</th> <!-- Ajoutez plus de colonnes au besoin -->
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            // Requête SQL pour récupérer les courriers non archivés associés à l'utilisateur connecté
                            $query = "SELECT * FROM courriers WHERE signup_id = '$id_compte' AND archived = 0";
                            $result = $conn->query($query);

                            // Affichage des données dans le tableau
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['date_envoi'] . "</td>";
                                    echo "<td>" . $row['type_courrier'] . "</td>";
                                    echo "<td>" . $row['objet_courrier'] . "</td>";
                                    echo "<td>" . $row['service'] . "</td>";
                                    echo "<td>" . $row['nom_agent'] . "</td>";
                                    echo "<td>";
                                            switch ($row['statut']) {
                                                case 'En attente':
                                                    echo "<span class='badge badge-secondary'>" . $row['statut'] . "</span>";
                                                    break;
                                                case 'En cours de traitement':
                                                    echo "<span class='badge badge-primary'>" . $row['statut'] . "</span>";
                                                    break;
                                                case 'Terminé':
                                                    echo "<span class='badge badge-success'>" . $row['statut'] . "</span>";
                                                    break;
                                                case 'Refusé':
                                                    echo "<span class='badge badge-danger'>" . $row['statut'] . "</span>";
                                                    break;
                                                default:
                                                    echo $row['statut'];
                                                    break;
                                            }
                                            echo "</td>";
                                    // Lien de téléchargement du fichier
                                    echo "<td><a href='../../composants/supprimer.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Supprimer</a></td>";
                                    echo "<td><a href='../../composants/archiver.php?id=" . $row['id'] . "' class='btn btn-secondary btn-sm' style='background-color: orange;'>Archiver</a></td>";

                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>Aucun courrier trouvé pour cet utilisateur.</td></tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="../../assets/js/main.js"></script>
    <!-- ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
