<?php
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_paiement.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/PHARMACIE/CSS SS45/paiement.css">
    <title>Passer commande</title>
</head>

<body>
    <?php
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\header.php' ?>

<h1>paiement</h1>
    <!-- Formulaire pour passer la commande -->
    <div class="passer_commande" >
<form action="/PHARMACIE/Backphp/b_paiement.php" method="post" style="width:90%">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required>
    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" required>
    <label for="adresse">Adresse :</label>
    <input type="text" name="adresse" id="adresse" required>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required>
    <label for="telephone">Téléphone :</label>
    <input type="tel" name="telephone" id="telephone" required>
    <label for="carte">Numéro de carte :</label>
    <input type="password" name="carte" id="carte" required pattern="\d{16}" inputmode="numeric"> <!-- 16 chiffres de cb sinon format invalide -->
    <label for="exp_month">Mois d'expiration :</label>
    <input type="number" name="exp_month" id="exp_month" required min="1" max="12"> 
    <label for="exp_year">Année d'expiration :</label>
    <input type="number" name="exp_year" id="exp_year" required min="2022">
    <label for="cvv">CVV :</label>
    <input type="number" name="cvv" id="cvv" required pattern="\d{3}" inputmode="numeric"> <!-- 3 chiffres sinon format invalide -->
    <input type="submit" value="Passer la commande">
</form>
</div>
   
    <?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\footer.php' ?>

</body>

</html>