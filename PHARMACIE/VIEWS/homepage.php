<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="/PHARMACIE/CSS SS45/pagehomecss.css">
    <title>Pharmacie en ligne</title>
</head>

<body>
    
    <?php session_start();
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\header.php'?>

    <div class="background-image">
    <section>
    <h2>Bienvenue sur la pharmacie en ligne</h2>
    <p>Vous pouvez consulter notre catalogue de médicaments et les commander en ligne. Vous pouvez également consulter votre profil et vos commandes.</p>
    <form action="/PHARMACIE/VIEWS/boutique.php" method="get">
        <input type="submit" value="Visiter la boutique">
    </form>
    </section>
    </div>
    
       

    <?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\footer.php'?>

</body>

</html>
