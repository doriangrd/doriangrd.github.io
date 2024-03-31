
<head>
    <link rel="stylesheet" type="text/css" href="/PHARMACIE/CSS SS45/header.css">
</head>

<header>
    <div>
        <form action="/PHARMACIE/VIEWS/boutique.php" method="GET">
            <input type="search" name="search" placeholder="Rechercher un produit, une marque" >
            <input type="submit" value="rechercher"> 
        </form>
    </div>
    <div>
        <img src="/PHARMACIE/DATA/logo.png" alt="Logo" id="logo"/>
    </div>
    <div class="user-nav">
        <?php
            if (isset($_SESSION['Type'])) {
                echo '
                    <a href="/PHARMACIE/VIEWS/profil.php">
                        <img src="/PHARMACIE/DATA/Profil.png" id="img_tt" alt="Login" />
                    </a>';
            } else {
                echo '
                    <a href="/PHARMACIE/VIEWS/login.php">
                        <img src="/PHARMACIE/DATA/Login.png" id="img_tt" alt="Login" />
                    </a>';
            }
        ?>
        <a href="/PHARMACIE/VIEWS/panier.php">
            <img src="/PHARMACIE/DATA/Caddie.png" id="img_tt" alt="Panier" />
        </a> 
    </div>
</header>
<nav>
    <a href="/PHARMACIE/VIEWS/homepage.php">Accueil</a> 
    <a href="/PHARMACIE/VIEWS/boutique.php">Boutique</a> 
    <a href="/PHARMACIE/VIEWS/panier.php">Panier</a> 
    <?php
        if (isset($_SESSION['Type'])) {
            if ($_SESSION['Type'] == 'Responsable') {
                echo '<a href="/PHARMACIE/VIEWS/vendeur.php">Gestion Client</a>';
                echo '<a href="/PHARMACIE/VIEWS/stock.php">Stock</a>';
            }
            elseif ($_SESSION['Type'] == 'Vendeur') {
                echo '<a href="/PHARMACIE/VIEWS/vendeur.php">Gestion Client</a>';
            }
        }
    ?>
</nav> 