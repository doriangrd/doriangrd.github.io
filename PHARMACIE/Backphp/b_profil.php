<?php
session_start();
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_connexion.php';
    
    // Récupérer les données de l'utilisateur
    $type = $_SESSION['Type'];
    $nom = $_SESSION['Nom'];
    $prenom = $_SESSION['Prenom'];
    $adresse = $_SESSION['Adresse'];
    $email = $_SESSION['Email'];
    



// Déconnexion
if (isset($_POST['logout'])) {
    // Détruit toutes les variables de session
    $_SESSION = array();

    // Si vous voulez détruire complètement la session, effacez également
    // le cookie de session.
    // Note : cela détruira la session et pas seulement les données de session !
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finalement, détruit la session.
    session_destroy();

    // Redirige vers la page d'accueil
    header('Location: /PHARMACIE/VIEWS/homepage.php');
    exit;
}

//modifier nom prenom email 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the new values
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $email = $_POST['Email'];

    // Prepare the SQL query
    //$sql = "UPDATE utilisateurs SET Nom = $Nom, Prenom = $Prenom, Email = $Email WHERE ID_Utilisateur = $_SESSION['ID_Utilisateur']";
    $sql = "UPDATE utilisateurs SET Nom = ?, Prenom = ?, Email = ? WHERE ID_Utilisateur = ?";
    

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the variables to the statement
        $stmt->bind_param("sssi", $nom, $prenom, $email, $_SESSION['ID_Utilisateur']); //"sssi" indique que les trois premiers paramètres sont des chaînes de caractères et que le dernier paramètre est un entier.

        // Execute the statement
        if ($stmt->execute()) {
            // The user's information has been updated
            $_SESSION['Nom'] = $nom;
            $_SESSION['Prenom'] = $prenom;
            $_SESSION['Email'] = $email;
            // You can redirect the user to the profile page
            header('Location: /PHARMACIE/VIEWS/profil.php');
            exit;
        } else {
            // An error occurred
            echo "Erreur : " . $conn->error;
        }
    }
    $stmt->close(); 
}



// Récupérer les commandes de l'utilisateur
$sql = "SELECT * FROM commandes WHERE ID_Utilisateur = " . $_SESSION['ID_Utilisateur'];
$result = $conn->query($sql);
$commandes = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $commandes[] = $row;
    }
}



?>

    