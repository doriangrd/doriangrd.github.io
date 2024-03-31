<?php
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_panier.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/PHARMACIE/CSS SS45/panier.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
    <title>Pharmacie en ligne - Panier</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
</head>

<body>
    <?php
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\header.php' ?>

    <h2>Votre panier</h2>

    <table id="example" class="display" style="width:90%">
        <thead>
            <th>Produit</th>
            <th>Image</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Modifier</th>
            <th>Supprimer</th>
            <th>Total</th>
        </thead>
        <tbody>
        <?php
            while ($produit = $result->fetch_assoc()) {
                $Cout_TT = $produit['Quantite'] * $produit['Prix'];
                echo '<tr>';
                    echo '<td><a href="/PHARMACIE/VIEWS/details_medicament.php?medicament=' . $produit['Nom'] . '">' . $produit['Nom'] . '</a></td>';
                    echo '<td><div class="product-image"><img src="/PHARMACIE/DATA/Medicament/' . $produit['Nom'] . '.jpg" alt="' . $produit['Nom'] . '"></div></td>';
                    echo '<td>' . $produit['Quantite'] . '</td>';
                    echo '<td>' . $produit['Prix'] . ' €</td>';
                    
                    echo '<td><form action="/PHARMACIE/Backphp/b_panieredit.php" method="post">';
                    echo '<input type="hidden" name="id_medicament" value="' . $produit['ID_Medicament'] . '">';
                    echo '<input type="number" id="quantite' . $produit['ID_Medicament'] . '" name="quantite" value="' . $produit['Quantite'] . '" min="1" max="' . (10 - $produit['Quantite']) . '" style="display: none;">';
                    echo '<input type="button" class="button button-modifier"  value="Modifier" onclick="document.getElementById(\'quantite' . $produit['ID_Medicament'] . '\').style.display = \'block\'; document.getElementById(\'submit' . $produit['ID_Medicament'] . '\').style.display = \'block\';">';
                    echo '<input type="submit" class="submit submit-valider" value="Valider" style="display: none;" id="submit' . $produit['ID_Medicament'] . '">';
                    echo '</form></td>';  
             
                    echo '<td><form action="/PHARMACIE/Backphp/b_panierdelete.php" method="get">';
                    echo '<input type="hidden" name="id" value="' . $produit['ID_Medicament'] . '">';
                    echo '<input type="submit" class="button button-supprimer" value="Supprimer">';
                    echo '<td>' . $Cout_TT . ' €</td>';
                    echo '</form></td>';                    
            echo '</tr>';
            }
        ?>
        </tbody>
    </table>
    <!-- Formulaire pour passer la commande --> 
    <div class="passer_commande">
    <form action="/PHARMACIE/VIEWS/pagepaiement.php" method="post">
        <input type="submit" value="Passer la commande">
    </form>
    </div>

    <?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\footer.php' ?>
 
    <script>
        new DataTable('#example');
    </script>

</body>

</html>