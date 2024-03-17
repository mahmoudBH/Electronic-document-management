<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "mahmoud bh";
        $dbName = "my-app";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }

        // Vérifier si l'utilisateur est connecté et si son ID est disponible dans la session
        if(isset($_SESSION['id_compte'])) {
            $user_id = $_SESSION['id_compte'];

            // Récupérer les valeurs des nouveaux champs
            $dateEnvoi = $_POST["date_envoi"];
            $typeCourrier = $_POST["type_courrier"];
            $objetCourrier = $_POST["objet_courrier"];
            $serviceTraitement = $_POST["service"];
            $destinataire = $_POST["destinataire"];

            // Récupérer le ID_name de l'utilisateur connecté
            $full_name_query = "SELECT full_name FROM uibprojet_signup WHERE ID_compte = '$user_id'";
            $full_name_result = $conn->query($full_name_query);

            if ($full_name_result->num_rows > 0) {
                $row = $full_name_result->fetch_assoc();
                $expediteur = $row["full_name"];

                // Vérifier si l'expéditeur et le destinataire sont identiques
                
                if ($expediteur === $destinataire) {
                    echo '<script>alert("Lexpéditeur et le destinataire ne peuvent pas être identiques. Veuillez corriger."); window.location.href = "enregistrer.php";</script>';
                } else {
                    // Continuer le traitement du formulaire si les valeurs sont différentes

                    // Vérifier si le destinataire existe dans la base de données
                    $destinataire_query = "SELECT ID_compte FROM uibprojet_signup WHERE full_name = '$destinataire'";
                    $destinataire_result = $conn->query($destinataire_query);

                    if ($destinataire_result->num_rows > 0) {
                        // Destinataire trouvé, continuer avec l'insertion du courrier
                        // Lire le fichier dans une variable
                        $fileContent = file_get_contents($_FILES["file"]["tmp_name"]);
                        $fileContent = $conn->real_escape_string($fileContent);

                        // Insérer le courrier dans la base de données
                        $query = "INSERT INTO courriers (date_envoi, type_courrier, objet_courrier, service, nom_agent, destinataire, contenu, signup_id) 
                                  VALUES ('$dateEnvoi', '$typeCourrier', '$objetCourrier', '$serviceTraitement', '$expediteur', '$destinataire', '$fileContent', '$user_id')";

                        $result = $conn->query($query);

                        if ($result) {
                            echo '<script>alert("Le courrier a été transféré avec succès."); window.location.href = "enregistrer.php";</script>';
                        } else {
                            echo '<div class="error-message centered-text">Erreur lors du transfert du courrier dans la base de données : ' . $conn->error . '</div>';
                        }
                    } else {
                        echo '<div class="error-message centered-text">Erreur : Destinataire non trouvé dans la base de données.</div>';
                    }
                }
            } else {
                echo '<div class="error-message centered-text">Erreur : Impossible de trouver le full_name de l\'utilisateur connecté.</div>';
            }
        } else {
            echo "Erreur : Utilisateur non connecté.";
        }

        $conn->close();
    } else {
        echo '<div class="error-message centered-text">Erreur lors du téléchargement du fichier.</div>';
    }
}
?>
