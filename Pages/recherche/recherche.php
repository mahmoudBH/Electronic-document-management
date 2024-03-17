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
                        <label class="sr-only">Recherche...</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Recherche...">
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
                <br>
                <!-- Form Content -->
                <div class="container">
                    <h1 class="mt-5 mb-4">Recherche d'un Document</h1>
                    <form method="GET" class="mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="dateEnvoi">Date d'envoi :</label>
                                <input type="date" class="form-control" id="dateEnvoi" name="dateEnvoi">
                            </div>
                            <div class="col-md-3">
                                <label for="typeCourrier">Type de courrier :</label>
                                <select name="type_courrier" class="form-control" >
                                    <option value="" disabled selected>Sélectionnez le type de document</option>
                                    <option value="demande d emploi">Demande d'emploi</option>
                                    <option value="Documents d identification et d authentification">Documents d'identification et d'authentification</option>
                                    <option value="Documents financiers">Documents financiers</option>
                                    <option value="Documents de transaction">Documents de transaction</option>
                                    <option value="Documents légaux et réglementaires">Documents légaux et réglementaires</option>
                                    <option value="Documents de conformité et de sécurité">Documents de conformité et de sécurité</option>
                                    <option value="Documents de communication et de correspondance">Documents de communication et de correspondance</option>
                                    <!-- Ajoutez d'autres options de type de courrier ici -->
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="service">Service :</label>
                                <select name="service" class="form-control" >
                                    <option disabled selected>Sélectionnez le service traitant</option>
                                    <option value="Service des Opérations Bancaires">Service des Opérations Bancaires</option>
                                    <option value="Service des Prêts et du Crédit">Service des Prêts et du Crédit</option>
                                    <option value="Service des Finances et de la Comptabilité">Service des Finances et de la Comptabilité</option>
                                    <option value="Service des Investissements">Service des Investissements</option>
                                    <option value="Service de la Conformité et de la Réglementation">Service de la Conformité et de la Réglementation</option>
                                    <option value="Service de la Gestion des Risques">Service de la Gestion des Risques</option>
                                    <option value="Service de la Relation Client">Service de la Relation Client</option>
                                    <option value="Service des Ressources Humaines">Service des Ressources Humaines</option>
                                    <option value="Service de la Technologie de l Information (TI)">Service de la Technologie de l'Information (TI)</option>
                                    <!-- Ajoutez d'autres options de service de traitement ici -->
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="statut">Statut :</label>
                                <select class="form-select form-control" name="statut" id="nouveau_statut">
                                    <option value="En attente" class="text-secondary">En attente</option>            
                                    <option value="En cours de traitement" class="text-primary">En cours de traitement</option>           
                                    <option value="Terminé" class="text-success">Terminé</option>            
                                    <option value="Refusé" class="text-danger">Refusé</option>            
                                </select>            
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="expediteur">Expéditeur :</label>
                                <input type="text" id="searchInput" class="form-control" name="destinataire" placeholder="Rechercher un nom...">
                                <ul id="suggestions" style="margin-left: 22px;"></ul>
                            </div>
                            <div class="col-md-6 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary ml-auto">Rechercher</button>
                            </div>
                        </div>
                    </form>

                    <div id="resultTable" class="mt-4">
                        <?php
                        // Connexion à la base de données
                        $servername = "localhost";
                        $username = "root";
                        $password = "mahmoud bh";
                        $dbname = "my-app";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Vérification de la connexion
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Récupération des données du formulaire
                        $dateEnvoi = isset($_GET['dateEnvoi']) ? $_GET['dateEnvoi'] : '';
                        $typeCourrier = isset($_GET['typeCourrier']) ? $_GET['typeCourrier'] : '';
                        $service = isset($_GET['service']) ? $_GET['service'] : '';
                        $statut = isset($_GET['statut']) ? $_GET['statut'] : '';
                        $expediteur = isset($_GET['expediteur']) ? $_GET['expediteur'] : '';

                        // Requête de recherche filtrée
                        $sql = "SELECT * FROM courriers WHERE 1";

                        if (!empty($dateEnvoi)) {
                            $sql .= " AND date_envoi = '$dateEnvoi'";
                        }
                        if (!empty($typeCourrier)) {
                            $sql .= " AND type_courrier = '$typeCourrier'";
                        }
                        if (!empty($service)) {
                            $sql .= " AND service = '$service'";
                        }
                        if (!empty($statut)) {
                            $sql .= " AND statut = '$statut'";
                        }
                        if (!empty($expediteur)) {
                            $sql .= " AND nom_agent = '$expediteur'";
                        }

                        $result = $conn->query($sql);

                        // Affichage des résultats sous forme de tableau HTML
                        if ($result->num_rows > 0) {
                            echo "<div class='table-responsive'>";
                            echo "<table class='table table-striped table-bordered'>";
                            echo "<thead class='thead-dark'>";
                            echo "<tr>";
                            echo "<th>Date d'envoi</th>";
                            echo "<th>Type de courrier</th>";
                            echo "<th>Service</th>";
                            echo "<th>Statut</th>";
                            echo "<th>Expéditeur</th>";
                            echo "<th>Fichier</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";

                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row["date_envoi"]."</td>";
                                echo "<td>".$row["type_courrier"]."</td>";
                                echo "<td>".$row["service"]."</td>";
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
                                echo "<td>".$row["nom_agent"]."</td>";
                                echo "<td><a href='telecharger.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Télécharger</a></td>";
                                echo "</tr>";
                                
                            }

                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                        } else {
                            echo "<div class='alert alert-warning' role='alert'>Aucun résultat trouvé</div>";
                        }
                        $conn->close();
                        ?>

                    </div>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('searchInput').addEventListener('input', function() {
                var searchInput = document.getElementById('searchInput').value;
                if (searchInput.length >= 2) { // Minimum 2 characters before search
                    fetch('../../composants/suggestions.php', {
                            method: 'POST',
                            body: new URLSearchParams({
                                search_query: searchInput
                            }),
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            var suggestionsList = document.getElementById('suggestions');
                            suggestionsList.innerHTML = '';
                            data.forEach(function(suggestion) {
                                var suggestionItem = document.createElement('li');
                                suggestionItem.textContent = suggestion;
                                suggestionItem.addEventListener('click', function() {
                                    document.getElementById('searchInput').value = suggestion;
                                    suggestionsList.innerHTML = ''; // Clear suggestions after click
                                });
                                suggestionsList.appendChild(suggestionItem);
                            });
                        })
                        .catch(error => console.error('Error:', error));
                } else {
                    var suggestionsList = document.getElementById('suggestions');
                    suggestionsList.innerHTML = ''; // Reset the list if input is too short
                }
            });
        });
    </script>
</body>

</html>
