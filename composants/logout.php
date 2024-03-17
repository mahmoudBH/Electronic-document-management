<?php
session_start(); // Démarrez la session

// Détruire toutes les variables de session
session_unset();

// Détruisez la session
session_destroy();

// Rediriger vers la page de connexion
header("Location: ../Pages/login/login.html");
exit;
?>