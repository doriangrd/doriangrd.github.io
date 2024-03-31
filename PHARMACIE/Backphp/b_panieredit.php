<?php
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_connexion.php';
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_panier.php';

 
    // mdifier la quantité du produit dans le panier
    if (isset($_POST['id_medicament']) && isset($_POST['quantite'])) {
        $id_medicament = $_POST['id_medicament'];
        $quantite = $_POST['quantite'];
        $query ="UPDATE ligne_commande 
        INNER JOIN commandes ON ligne_commande.ID_Commande = commandes.ID_Commande SET Quantite = $quantite WHERE ligne_commande.ID_Medicament = $id_medicament AND commandes.ID_Utilisateur = $id";
        $conn->query($query);
        header('Location: /PHARMACIE/VIEWS/panier.php');
        exit;
    }

    //afficher un compteur pour modifier la valeur de la quantité
    if (isset($_GET['id'])) {
        $id_medicament = $_GET['id'];
        $query = "SELECT DISTINCT * FROM ligne_commande INNER JOIN commandes ON ligne_commande.ID_Commande = commandes.ID_Commande INNER JOIN medicaments ON ligne_commande.ID_Medicament = medicaments.ID_Medicament WHERE ID_Utilisateur = $id AND Statut_Commande = 'En cours'";
        $result = $conn->query($query);
        $quantite = $result->fetch_assoc();
    }

?> 