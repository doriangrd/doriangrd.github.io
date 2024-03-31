<?php
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_connexion.php';
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_stock.php';

 
    // Supprimer le medicament de la base de donnees 
    if (isset($_GET['id'])) {
        $id_medicament = $_GET['id'];
        $query = "DELETE FROM medicaments WHERE ID_Medicament = $id_medicament ";
        $conn->query($query);
        header('Location: /PHARMACIE/VIEWS/stock.php');
        exit;
    }
    
?>