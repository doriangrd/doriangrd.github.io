<?php

if (isset($_GET["status"])) {
    $paymentStatus = $_GET["status"];
    if ($paymentStatus > 0) {
        // Payment was successful
        
    } else {
        // Payment was declined

    }
}
?>