<?php
include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_connexion.php';


if (isset($_POST['email']) && isset($_POST['password'])) {
    //Verifier 
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Encrypter le mot de passe
    $password = md5($password);

    $sql = "SELECT ID_Utilisateur, Type, Nom, Prenom, Adresse, Email FROM utilisateurs WHERE Email='$email' AND Password='$password'";
    $result = $conn->query($sql);

    //Si plus de 1 ligne est retournée, alors l'utilisateur existe
    if ($result->num_rows > 0) {
        //Creer une session avec ses informations pour l'authentification et ainsi lui proposer l'onglet son compte
        var_dump(session_start());
        $user = $result->fetch_assoc();
        $_SESSION['ID_Utilisateur'] = $user['ID_Utilisateur'];
        $_SESSION['Type'] = $user['Type'];
        $_SESSION['Nom'] = $user['Nom'];
        $_SESSION['Prenom'] = $user['Prenom'];
        $_SESSION['Adresse'] = $user['Adresse'];
        $_SESSION['Email'] = $user['Email'];

        //Recupération de l'id commande
        $ID_Utilisateur = $_SESSION['ID_Utilisateur'];
        $sql = "SELECT ID_Commande FROM commandes WHERE commandes.ID_Utilisateur='$ID_Utilisateur'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $commande = $result->fetch_assoc();
            $_SESSION['ID_Commande'] = $commande['ID_Commande'];
        }
        else {
            //Ajout d'un commande
            $sql = "INSERT INTO commandes (ID_Utilisateur, Date_Commande, Statut_Commande) VALUES ('$ID_Utilisateur', NOW(), 'En cours');";
            $conn->query($sql);

            //Recupération de l'id commande
            $sql = "SELECT ID_Commande FROM commandes WHERE commandes.ID_Utilisateur='$ID_Utilisateur'";
            $result = $conn->query($sql);
            $commande = $result->fetch_assoc();
            $_SESSION['ID_Commande'] = $commande['ID_Commande'];
        }

        header('Location: /PHARMACIE/VIEWS/profil.php');
    } else {
        $_SESSION['login_error'] = "Erreur : Login ou mot de passe incorrect";
    }
}
?>

