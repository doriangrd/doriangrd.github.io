<?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\Backphp\b_login.php'?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/PHARMACIE/CSS SS45/login.css">
    <title>Pharmacie en ligne - Login</title>
</head>

<body>
    <?php include 'C:\Users\girdo\OneDrive\Documents\projet annuel\WWW\PHARMACIE\VIEWS\header.php'?>

    <h2>Formulaire d'inscription</h2>
    <form action="" method="post">
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br>
      <label for="password">Mot de passe:</label><br>
      <input type="password" id="password" name="password" required>
      <input type="checkbox" id="showPassword" onclick="showHidePassword()"> Afficher le mot de passe en clair<br>
      <input type="submit" value="Se connecter"> 

      <a href="/PHARMACIE/VIEWS/inscription.php">S'inscrire</a>
  </form>

  <div class="error-message" style="display: none;">Erreur mot ou login incorrect looser</div> 
  <?php 
    if (isset($_SESSION['login_error'])) {
        echo '<div class="error-message">' . $_SESSION['login_error'] . '</div>';
        unset($_SESSION['login_error']); // remove the error message after displaying it
    }
?>

  <script>
      function showHidePassword() {
          var x = document.getElementById("password");
          if (x.type === "password") {
              x.type = "text";
          } else {
              x.type = "password";
          }
      }
  </script>

</body>

</html>