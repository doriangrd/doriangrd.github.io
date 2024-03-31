<?php
    $servername = "localhost"; // ou l'adresse IP du serveur MySQL
    $username = "root";
    $password = "root";
    $database = "pharmabdd";

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $database);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }
?>      