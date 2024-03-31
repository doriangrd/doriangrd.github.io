<?php
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_connexion.php';
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_panier.php';

 
    // Supprimer le produit du panier
    if (isset($_GET['id'])) {
        $id_medicament = $_GET['id'];
        $query = "DELETE ligne_commande FROM ligne_commande INNER JOIN commandes ON ligne_commande.ID_Commande = commandes.ID_Commande WHERE ligne_commande.ID_Medicament = $id_medicament AND commandes.ID_Utilisateur = $id";
        $conn->query($query);
        header('Location: /PHARMACIE/VIEWS/panier.php');
        exit;
    }
    
?>