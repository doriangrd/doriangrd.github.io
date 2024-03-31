<?php 
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_boutique.php';
    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/PHARMACIE/CSS SS45/header.css">
    <link rel="stylesheet" type="text/css" href="/PHARMACIE/CSS SS45/boutique.css">
    <title>Pharmacie en ligne - Boutique</title>
</head>

<body>

    <?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\header.php'?>


    <section>
        <h2>Boutique</h2>

        <form method="get" action="">
            <select name="order">
                <option value="alphabetical">Alphabetique ↑</option>
                <option value="alphabetical_desc">Alphabetique ↓</option>
                <option value="price_asc">Prix Croissant</option>
                <option value="price_desc">Prix Decroissant</option>
            </select>
            <select name="category">
                <option value="all">Toutes les catégories</option>
                <?php
                $categories = $conn->query("SELECT DISTINCT categorie FROM pharmabdd.medicaments;");
                while ($row = $categories->fetch_assoc()) {
                    echo '<option value="' . $row['categorie'] . '">' . $row['categorie'] . '</option>';
                }
                ?>
            </select>
            <input type="checkbox" id="generic" name="generic" value="generic">
            <label for="generic">Générique</label>
            <input type="checkbox" id="ordonnance" name="ordonnance" value="ordonnance">
            <label for="ordonnance">Ordonnance</label>
            <input type="submit" value="Order">
        </form>

        <!-- Affichage dynamique des médicaments -->
        <div class="product-listing">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                echo '<a href="details_medicament.php?medicament=' . urlencode($row['Nom']) . '">';
                echo '<div class="product-image"><img src="/PHARMACIE/DATA/Medicament/' . $row['Nom'] . '.jpg" alt="' . $row['Nom'] . '"></div>';
                echo '<div class="product-info">';
                echo '<div class="product-name">' . $row['Nom'] . '</div>';
                echo '<div class="product-description">' . $row['Description'] . '</div>';
                echo '<div class="product-price">' . $row['Prix'] . '€</div>';
                echo '</div></a></div>';
            }
            ?>
        </div>
    </section>

    <?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\footer.php'?>

    
</body>
</html>
