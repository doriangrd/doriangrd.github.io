<?php
include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_stock.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/PHARMACIE/CSS SS45/stock.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script> 
    <title>Gestion des stocks</title>
</head>

<body style="margin: 0px;"> <!-- pck sinon bord blanc autour de la page auto incrémenté à 8px les margin--> 
    <?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\header.php' ?>

    <h1>Gestion des stocks</h1>

    <!-- Here you can add the form for adding a new medicament -->

    <table id="example" class="display" style="width:90%">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Image</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
        </thead>

        <tbody>
            <?php
                while ($medicament = $result->fetch_assoc()) {
                    //mettre en rouge les lignes qui ont une quantite inferieur a 100 
                    if ($medicament['Quantite_en_stock'] < 100) {
                        echo '<tr style="background-color: #DF3030;">';
                    } else {
                        echo '<tr>';
                    }
                        echo '<td>' . $medicament['Nom'] . '</td>';
                        echo '<td><div class="product-image"><img src="/PHARMACIE/DATA/Medicament/' . $medicament['Nom'] . '.jpg" alt="' . $medicament['Nom'] . '"></div></td>';
                        echo '<td>' . $medicament['Description'] . '</td>';
                        echo '<td>' . $medicament['Prix'] . '</td>';
                        echo '<td>' . $medicament['Quantite_en_stock'] . '</td>';
                       
                        echo '<td><form action="/PHARMACIE/Backphp/b_edit_medicament.php" method="post">';
                        echo '<input type="hidden" name="id_medicament" value="' . $medicament['ID_Medicament'] . '">';
                        echo '<input type="number" id="quantite' . $medicament['ID_Medicament'] . '" name="quantite" value="' . $medicament['Quantite_en_stock'].'" style="display: none;">';
                        echo '<input type="button" class="button button-modifier"  value="Modifier" onclick="document.getElementById(\'quantite' . $medicament['ID_Medicament'] . '\').style.display = \'block\'; document.getElementById(\'submit' . $medicament['ID_Medicament'] . '\').style.display = \'block\';">';
                        echo '<input type="submit" class="submit submit-valider" value="Valider" style="display: none;" id="submit' . $medicament['ID_Medicament'] . '">';
                        echo '</form></td>';                        
                        echo '<td><form action="/PHARMACIE/Backphp/b_delete_medicament.php" method="get">';
                        echo '<input type="hidden" name="id" value="' . $medicament['ID_Medicament'] . '">';
                        echo '<input type="submit" class="button button-supprimer" value="Supprimer">';
                        echo '</form></td>';                    
                        echo '</tr>';
                }
            ?>
        </tbody>
    </table>

    <?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\footer.php' ?>

    <script>
        new DataTable('#example');
    </script>
</body>

</html>  