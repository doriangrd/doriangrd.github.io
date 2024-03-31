<?php
    include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_connexion.php';
    

    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['address']) && isset($_POST['lastname'])) {
        // Récupérer les données du formulaire
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $address = $_POST['address'];
        $lastname = $_POST['lastname'];

        //Encrypter le mot de passe
        $password = md5($password);

        // check si utilosateur existe déjà
        $sql = "SELECT * FROM utilisateurs WHERE Email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Erreur : Un utilisateur avec cet email existe déjà";
        } else {
            // Insérer l'utilisateur dans la base de données
            $sql = "INSERT INTO utilisateurs (Email, Password, Prenom, Nom, Adresse) VALUES ('$email', '$password', '$firstname', '$lastname', '$address')";
            if ($conn->query($sql) === TRUE) {
                echo "Inscription réussie";
                header('Location: /PHARMACIE/VIEWS/login.php');
            } else {
                echo "Erreur : " . $sql . "<br>" . $conn->error;
            }
        }
    }
?>