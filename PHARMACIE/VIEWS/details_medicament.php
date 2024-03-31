<?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_details_medicament.php' ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/PHARMACIE/CSS SS45/dmed.css">
    <title>Pharmacie en ligne - Détail Médicaments</title>
</head>

<body>
    <?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\header.php' ?>

    <section>
        <h2>Détail Médicament</h2>
        <?php
        // Vérifier si la requête a réussi
        if ($result) {
            // Récupérer la première ligne du résultat
            $row = $result->fetch_assoc();

            // Afficher les détails du médicament
            echo '<div>';
            echo '<h3>' . $row['Nom_détaillé'] . '</h3>';
            echo '<p>' . $row['Description'] . '</p>';
            echo '<img src="/PHARMACIE/DATA/Medicament/' . $row['Nom'] . '.jpg" alt="' . $row['Nom'] . '">';
            echo '<p>Prix: ' . $row['Prix'] . '€</p>';
            echo '<p>Description longue: ' . $row['Description_long'] . '</p>';
            echo '<p>Public cible: ' . $row['Public_cible'] . '</p>';
            echo '<p>Forme: ' . $row['Forme'] . '</p>';
            echo '<p>Femme enceinte: ' . $row['Femme_enceinte'] . '</p>';
            echo '<p>Contenance: ' . $row['Contenance'] . '</p>';
            echo '</div>';
        } else {
            // Si la requête a échoué
            echo "Erreur dans la requête : " . $conn->error;
        }
        ?>

        <div>
            <!-- Formulaire pour ajouter le médicament au panier -->
            <form action="/PHARMACIE/Backphp/b_details_medicament.php" method="post" id="ajoutpanier">
                <input type="hidden" name="id_medicament" value="<?php echo $row['ID_Medicament']; ?>">
                <input type="number" name="quantite" value="1" min="1" max="10">
                <input type="submit" value="Ajouter au panier">
            </form>

            <!-- Afficher un message s'il n'y a pas assez de stock -->

            <div class="error-stock" style="display: none;">Pas assez de stock pour ce médicament.</div>
            <?php
                if (isset($_SESSION['stock_error'])) {
                    echo '<div class="error-message">' . $_SESSION['stock_error'] . '</div>';
                    unset($_SESSION['stock_error']); // Retirer le message d'erreur
                }
            ?>
        </div>
    </section>

    <?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\footer.php' ?>

</body>

</html>