<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_compte'])) {
    header("Location: Pages/login/login.html"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit;
}

$id_compte = $_SESSION['id_compte']; // Récupérer l'ID de compte de l'utilisateur connecté

// Connexion à la base de données
$host = "localhost";
$dbUsername = "root";
$dbPassword = "mahmoud bh";
$dbName = "my-app";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

?>
<?php
include 'composants/bienvenue.php';
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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="home.css">

</head>

<body>
    <!-- Navigation -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 navigation">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="assets/imgs/GED-2.png" alt="ged" class="ged">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <span class="icon">
                                <ion-icon name="apps-outline"></ion-icon>
                            </span>
                            Tableau de bord
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Pages/enregistrer/enregistrer.php">
                            <span class="icon">
                                <ion-icon name="add-circle-outline"></ion-icon>
                            </span>
                            Enregistrer un Document
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Pages/mes_document/mes_documents.php">
                            <span class="icon">
                                <ion-icon name="document-text-outline"></ion-icon>
                            </span>
                            Mes Documents
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Pages/recherche/recherche.php">
                            <span class="icon">
                                <ion-icon name="search-outline"></ion-icon>
                            </span>
                            Recherche de Documents
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Pages/traiter/traiter.php">
                            <span class="icon">
                                <ion-icon name="checkmark-circle-outline"></ion-icon>
                            </span>
                            Documents traités
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Pages/non_traiter/non_traiter.php">
                            <span class="icon">
                                <ion-icon name="close-circle-outline"></ion-icon>
                            </span>
                            Documents non traités
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Pages/archive/archive.php">
                            <span class="icon">
                                <ion-icon name="archive-outline"></ion-icon>
                            </span>
                            Archive
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Pages/contact/contact.php">
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
                         <img src="assets/imgs/profile.png" alt="User" class="user-avatar">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="Pages/profile/profile.php">Mon Profile</a>
                            <a class="dropdown-item" href="composants/logout.php">Se déconnecter</a>
                        </div>
                    </div>

                </div>

                <!-- Form Content -->

                <div class="container">
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">Bienvenue, <?php echo $full_name; ?> !</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center">Vous êtes connecté avec succès.</p>
                                    <div class="text-center">
                                        <a href="composants/logout.php" class="btn btn-primary">Se déconnecter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <?php
                    include 'composants/statistique.php';
                    ?>
                    <div class="col-md-6 mb-4 pr-3">
                        <a href="Pages/mes_document/mes_documents.php">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <h5 class="card-title">Total des fichiers envoyés</h5>
                                    <p class="card-text"><?php echo $totalFiles; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 mb-4 pl-3">
                        <a href="Pages/non_traiter/non_traiter.php">
                        <div class="card bg-info text-white h-100">
                            <div class="card-body d-flex flex-column justify-content-center">
                                <h5 class="card-title">Fichiers non traités</h5>
                                <p class="card-text"><?php echo $nbNonTraites; ?></p>
                                <div class="progress mt-3">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo $nbNonTraitesPercentage; ?>%;" aria-valuenow="<?php echo $nbNonTraitesPercentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 pr-3">
                        <a href="Pages/traiter/traiter.php">
                            <div class="card bg-success text-dark h-100">
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <h5 class="card-title">Fichiers traités</h5>
                                    <p class="card-text"><?php echo $nbTraites; ?></p>
                                    <div class="progress mt-3">
                                        <div class="progress-bar" role="progressbar" style="width: <?php echo $nbTraitesPercentage; ?>%;" aria-valuenow="<?php echo $nbTraitesPercentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-md-6 mb-4 pl-3">
                        <a href="Pages/archive/archive.php">
                            <div class="card bg-warning text-white h-100">
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <h5 class="card-title">Fichiers archivés</h5>
                                    <p class="card-text"><?php echo $nbArchives; ?></p>
                                    <div class="progress mt-3">
                                        <div class="progress-bar" role="progressbar" style="width: <?php echo $nbArchivesPercentage; ?>%;" aria-valuenow="<?php echo $nbArchivesPercentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <footer style="text-align: center;">
                    <div class="copyright">
                        <p>&copy; 2024 Mahmoud Bousbih. Tous droits réservés.</p>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
    <!-- ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
