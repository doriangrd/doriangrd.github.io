<?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_inscription.php'?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/PHARMACIE/CSS SS45/inscription.css">
    <title>Pharmacie en ligne - Login</title>
</head>

<body>
    <?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\header.php'?>

    <h2>Formulaire d'inscription</h2>
    <form action="" method="post" class="inscription-form">
        <label for="firstname">Quel est votre prénom ?</label><br>
        <input type="text" id="firstname" name="firstname" required><br>
        <label for= "lastname">Quel est votre nom ?</label><br>
        <input type="text" id="lastname" name="lastname" required><br>
        <label for="address">Quelle est votre adresse ?</label><br>
        <input type="text" id="address" name="address" required><br>
        <label for="email">Quelle est votre adresse e-mail ?</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Choisissez un Mot de passe:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="confirm_password">Confirmez votre Mot de passe:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required oninput="checkPasswordMatch();">
        <span id="password_match_message"></span><br>
        <input type="checkbox" id="showPassword" onclick="showHidePassword()"> Afficher le mot de passe en clair<br>
        <input type="submit" class="button1" value="S'inscrire">

        <a href="/PHARMACIE/VIEWS/login.php">Vous avez déjà un compte? Se connecter</a>
        <br>
        <br>    
    </form>

    <script>
        function showHidePassword() {
            var x = document.getElementById("password");
            var y = document.getElementById("confirm_password");
            if (x.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }

        function checkPasswordMatch() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            if (password != confirmPassword)
                document.getElementById("password_match_message").innerHTML = "Les mots de passe ne correspondent pas.";
            else
                document.getElementById("password_match_message").innerHTML = "Les mots de passe correspondent.";
        }
    </script>
</body>

</html>