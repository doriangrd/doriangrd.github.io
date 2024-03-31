<?php
session_start();
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_connexion.php';

    

    
    
    if (isset($_POST['quantite'])) {
        if (!isset($_SESSION['ID_Utilisateur'])) {
            // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
            header('Location: /PHARMACIE/VIEWS/login.php');
            exit;
        }   
        if (isset($_SESSION['ID_Commande'])) {            
            $id_commande = $_SESSION['ID_Commande'];
            $id_medicament = $_POST['id_medicament'];
            $quantite = $_POST['quantite'];

            //Verifier la quantité en stock
            $query = "SELECT Quantite_en_stock FROM pharmabdd.medicaments WHERE ID_Medicament = '$id_medicament';";
            $result = $conn->query($query);

            $Quantite_en_stock = $result->fetch_assoc()['Quantite_en_stock'];  
            
            echo "Quantite en stock" . $Quantite_en_stock;
            echo "Quantite commandée" . $quantite;
            echo "ID medicament" . $id_medicament;
            echo "ID commande" . $id_commande;

            // S'il y a assez de stock
            if ($Quantite_en_stock > $quantite) {
                $query = "INSERT INTO pharmabdd.ligne_commande (ID_Commande ,ID_Medicament, Quantite) VALUES ('$id_commande', '$id_medicament', '$quantite');";
                $result = $conn->query($query);
                if (!$result) {
                    die("Erreur dans la requête : " . $conn->error);
                }

                // Deduire la quantité commandée du stock
                $query = "UPDATE pharmabdd.medicaments SET Quantite_en_stock = '$Quantite_en_stock' - '$quantite' WHERE ID_Medicament = '$id_medicament';";
                $result = $conn->query($query);
    
                header("Location: /PHARMACIE/VIEWS/panier.php");
                // si l'utilisateur n'est pas connecte alors renvoyer au login 
            
            }
            else {
                $_SESSION['stock_error'] = "Pas assez de stock pour ce médicament.";

                //recupere le nom du medicament à partir de l'id
                $query = "SELECT Nom FROM pharmabdd.medicaments WHERE ID_Medicament = '$id_medicament';";
                $result = $conn->query($query);
                $medicament = $result->fetch_assoc()['Nom'];

                header("Location: /PHARMACIE/VIEWS/details_medicament.php?medicament=$medicament");
            }
        }
    }   

    // Récupérer la valeur du paramètre "medicament" depuis l'URL
    if (isset($_GET['medicament']))  {
        $medicament = $_GET['medicament'];

        // Utiliser la valeur dans la requête SQL
        $query = "SELECT ID_Medicament, Nom_détaillé, Description, Prix, Description_long, Public_cible, Forme, Femme_enceinte, Contenance, Nom FROM pharmabdd.medicaments WHERE Nom = '$medicament';";
        $result = $conn->query($query);

        // Vérifier si la requête a réussi
        if (!$result) {
            die("Erreur dans la requête : " . $conn->error);
        }   
    }
?>
