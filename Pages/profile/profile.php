<?php
include './update_profile.php'
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
                <div class="container mt-5">
                    <h2>Modifier mon profil</h2>
                    <form method="post" action="update_profile.php">
                        <div class="form-group">
                            <label for="full_name">Nom complet :</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo htmlspecialchars($full_name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Téléphone :</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo htmlspecialchars($mobile); ?>">
                        </div>
                        <div class="form-group">
                            <label for="service">Service :</label>
                            <select name="service" class="form-control" required>
                                <option value="<?php echo htmlspecialchars($service); ?>"><?php echo htmlspecialchars($service); ?></option>
                                <option value="Service des Opérations Bancaires">Service des Opérations Bancaires</option>
                                <option value="Service des Prêts et du Crédit">Service des Prêts et du Crédit</option>
                                <option value="Service des Finances et de la Comptabilité">Service des Finances et de la Comptabilité</option>
                                <option value="Service des Investissements">Service des Investissements</option>
                                <option value="Service de la Conformité et de la Réglementation">Service de la Conformité et de la Réglementation</option>
                                <option value="Service de la Gestion des Risques">Service de la Gestion des Risques</option>
                                <option value="Service de la Relation Client">Service de la Relation Client</option>
                                <option value="Service des Ressources Humaines">Service des Ressources Humaines</option>
                                <option value="Service de la Technologie de l Information (TI)">Service de la Technologie de l Information (TI)</option>
                                <!-- Ajoutez d'autres options de service de traitement ici -->
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </form>
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
