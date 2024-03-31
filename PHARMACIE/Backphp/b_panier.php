<?php
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_connexion.php';
    
    //démarrer la session si elle n'est pas déjà démarrée
    if (session_status() == PHP_SESSION_NONE)
        session_start();
    //if utilisateur non connecté alors rediriger vers la page de connexion
    if (!isset($_SESSION['ID_Utilisateur'])) {
        header('Location: /PHARMACIE/VIEWS/login.php');
        exit;
    }
    $id = $_SESSION['ID_Utilisateur'];

   

    //requete pour afficher les produits dans le panier de l'utilisateur
    $query = "SELECT DISTINCT * FROM ligne_commande INNER JOIN commandes ON ligne_commande.ID_Commande = commandes.ID_Commande INNER JOIN medicaments ON ligne_commande.ID_Medicament = medicaments.ID_Medicament WHERE ID_Utilisateur = $id AND Statut_Commande = 'En cours'";
    $result = $conn->query($query);
?>

     