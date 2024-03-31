<?php
    session_start();
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_connexion.php';
    

//recuperper tous les donnees de medicamnets 
    $query = "SELECT * FROM pharmabdd.medicaments";
    $result = $conn->query($query);

    if (!$result) { 
        die("Erreur dans la requête : " . $conn->error);
    }


    
    
    //recuperer les donne
?> 