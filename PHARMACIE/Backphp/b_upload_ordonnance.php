<?php
session_start();
include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_connexion.php';

if (isset($_FILES['ordonnance'])) {
    $ordonnance = $_FILES['ordonnance'];
    $upload_dir = 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Ordonnances\\' . $_SESSION['ID_Utilisateur'] . '\\';
    $upload_file = $upload_dir . basename($ordonnance['name']);

    //creer moi un sous doossier pour l'utilisteur à partir de son id s'il n'existe pas 
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir);
    }

    if (move_uploaded_file($ordonnance['tmp_name'], $upload_file)) {
        header("Location: /PHARMACIE/VIEWS/profil.php");
    } else {
        echo "Erreur lors de l'envoi de l'ordonnance.";
    }
}
?>
