<?php

    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_connexion.php';


    //$cardNumber = $_POST['carte']; // numéro de carte bancaire de l'utilisateur obtenu du form
    //$returnUrl = '/PHARMACIE/VIEWS/pagepaiement.php';  

    // redirection vers la page de paiement
    //include ('Location: http://projet-011.l3.geniephy.net/Paiement.php?Retour=' . urlencode($returnUrl) . '&Identifiant=' . urlencode($cardNumber));
    //exit;

    // Point de terminaison de rappel pour le traitement du paiement
    /*
    if (isset($_GET['payment_callback'])) {
        $paymentStatus = $_GET['payment_status'];
        if ($paymentStatus == 'success') {
            // Rediriger vers paiementresultat.php avec le statut de succès
            header('Location: /PHARMACIE/VIEWS/paiementresultat.php?status=1');
        } else {
            // Rediriger vers paiementresultat.php avec le statut d'échec
            header('Location: /PHARMACIE/VIEWS/paiementresultat.php?status=0');
        }
        exit;
    }
    */

?>
