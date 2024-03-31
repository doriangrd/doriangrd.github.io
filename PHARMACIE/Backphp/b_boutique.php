<?php
    session_start();
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_connexion.php';
    
    $generic = isset($_GET['generic']) ? $_GET['generic'] : '';
    $ordonnance = isset($_GET['ordonnance']) ? $_GET['ordonnance'] : '';    
    $category = $_GET['category'] ?? 'all';    $order = $_GET['order'] ?? 'alphabetical';

    $query = "SELECT Nom, Description, Prix, categorie FROM pharmabdd.medicaments";
    if ($category != 'all') {
        $query .= " WHERE categorie = '$category'";
    }
    
    if ($generic == 'generic') {
        $query .= ($category != 'all') ? " AND Generique = 1" : " WHERE Generique = 1";
    }
    
    if ($ordonnance == 'ordonnance') {
        $query .= (strpos($query, 'WHERE') !== false) ? " AND Ordonnance = 1" : " WHERE ordonnance = 1";
    }
    
    switch ($order) {
        case 'price_asc':
            $query .= " ORDER BY Prix ASC;";
            break;
        case 'price_desc':
            $query .= " ORDER BY Prix DESC;";
            break;
        case 'alphabetical_desc':
            $query .= " ORDER BY Nom DESC;";
            break;
        case 'alphabetical':
        default:
            $query .= " ORDER BY Nom;";
            break;
    }
    
    $searchTerm = $_GET['search'] ?? '';
    
    if (!empty($searchTerm)) {
        $query = "SELECT * FROM medicaments WHERE Nom LIKE '%$searchTerm%'";
    }
    
    $result = $conn->query($query);
    
    if (!$result) { 
        die("Erreur dans la requête : " . $conn->error);
    }
    


    
    ##var_dump($result); 
?>

