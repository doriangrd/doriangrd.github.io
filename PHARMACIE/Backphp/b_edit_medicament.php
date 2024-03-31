<?php
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_connexion.php';
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_stock.php';

 
   
    // mdifier la quantité du produit dans le panier
    if (isset($_POST['id_medicament']) && isset($_POST['quantite'])) {
        $id_medicament = $_POST['id_medicament'];
        $quantite_en_stock = $_POST['quantite'];
        $query = "UPDATE medicaments SET Quantite_en_stock = $quantite_en_stock WHERE ID_Medicament = $id_medicament";
        if ($conn->query($query) === TRUE) {
            echo "Record updated successfully";
            // Redirect to stock.php
            header('Location: /PHARMACIE/VIEWS/stock.php');
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    //afficher un compteur pour modifier la valeur de la quantité
    if (isset($_GET['id'])) {
        $id_medicament = $_GET['id'];
        $query = "UPDATE medicaments SET Quantite_en_stock = $quantite WHERE ID_Medicament = $id_medicament";
        $result = $conn->query($query);
        $quantite = $result->fetch_assoc();
    }

?> 