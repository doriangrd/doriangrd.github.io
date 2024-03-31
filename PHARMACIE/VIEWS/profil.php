<?php 
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_profil.php';
    header("Cache-Control: no-cache, must-revalidate"); // pour actualiser la page apres update d'info et afficher les nouvelles infos
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // probleme de cache
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Profil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/PHARMACIE/CSS SS45/profil.css">

</head>

<body>
    <?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\header.php'?>

    <h1>Welcome, <?php echo $_SESSION['Prenom'] . ' ' . $_SESSION['Nom']; ?></h1>
    <p>Type: <?php echo $_SESSION['Type']; ?></p>
    <p>Address: <?php echo $_SESSION['Adresse']; ?></p>
    <p>Email: <?php echo $_SESSION['Email']; ?></p>

    <!-- Bouton pour afficher le formulaire de modification -->
<button id="editButton">Modifier</button>

<!-- Formulaire de modification (caché par défaut) -->
<form id="editForm" action="/PHARMACIE/Backphp/b_profil.php" method="POST" style="display: none;" class="form-update">
    <tr>
        <td><input type="text" name="Nom" value="<?php echo $nom; ?>"class="my-input"></td> <!--echo $nom; pour afficher le nom de l'utilisateur actullement connecté--> 
        <td><input type="text" name="Prenom" value="<?php echo $prenom; ?>"class="my-input"></td>
        <td><input type="text" name="Email" value="<?php echo $email; ?>"class="my-input"></td>
        <td><input type="submit" value="Enregistrer"></td>
    </tr>
</form>

<script>
    document.getElementById('editButton').addEventListener('click', function() {
        // Afficher le formulaire de modification lorsque le bouton est cliqué
        document.getElementById('editForm').style.display = 'block';
    });
</script>

    <h2>Vos commandes</h2>
    <table>
        <tr>
            <th>Numéro de commande</th>
            <th>Date</th>
            <th>Statut</th>
        </tr>
    
        <?php
        if(isset($commandes) && count($commandes) > 0) {
            foreach($commandes as $commande) {
                echo "<tr>
                        <td>{$commande['ID_Commande']}</td>
                        <td>{$commande['Date_Commande']}</td>
                        <td>{$commande['Statut_Commande']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Vous n'avez pas encore passé de commande.</td></tr>";
        }
        ?>
    </table>



    <a href="/PHARMACIE/VIEWS/panier.php">Voir le panier</a><br><br>
    
<form action="/PHARMACIE/Backphp/b_upload_ordonnance.php" method="post" enctype="multipart/form-data">
    <input type="file" name="ordonnance" accept="image/*" required>
    <input type="submit" value="Envoyer mon ordonnance à la pharmacie">
</form>

<?php
//lister les ordonnances de l'utilisateur connecté 
echo "<h2 class='ordonnance-title'>Vos ordonnances</h2>";
    $file_ordonnance = 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Ordonnances\\' . $_SESSION['ID_Utilisateur'] . '\\';
    echo "<div class='ordonnance-list'>";
    if (is_dir($file_ordonnance)) {
        $ordonnances = scandir($file_ordonnance);
        foreach ($ordonnances as $ordonnance) {
            if ($ordonnance != '.' && $ordonnance != '..') {
                echo "<a class='ordonnance-link' href='/PHARMACIE/Ordonnances/" . $_SESSION['ID_Utilisateur'] . "/" . $ordonnance . "'>$ordonnance</a><br>";
            }
        }
    } else {
        echo "<p class='ordonnance-message'>Vous n'avez pas encore envoyé d'ordonnance.</p>";
    }
    echo "</div>";
?> 
    <div id="Giroud">
        <form action="/PHARMACIE/VIEWS/profil.php" method="post" >
        <button type="submit" name="logout" id="crampte">Déconnexion</button>
        </form>
    </div>

    <?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\footer.php'?>
</body>
</html>