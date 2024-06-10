<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <title>Inscription</title>
</head>
<body>
    <div class="container">
        <div class="welcome-message">
            <img src="Real madrid logo.png" alt="Real Madrid Logo" class="logo">
            <h1>Welcome / Hola</h1>
        </div>
        
        <form method="POST" action="traitement.php" class="inscription-form">
            <label for="nom">Votre nom</label>
            <input type="text" id="nom" name="nom" placeholder="Entrez votre nom.." required>
            <label for="prenom">Votre prénom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom.." required>
            <label for="pseudo">Votre pseudo</label>
            <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo.." required>
            <label for="email">Votre email</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre email.." required>
            <label for="pass">Mot de passe</label>
            <input type="password" id="pass" name="pass" placeholder="Entrez votre mot de passe.." required>
            <label for="confirm_pass">Confirmez le mot de passe</label>
            <input type="password" id="confirm_pass" name="confirm_pass" placeholder="Confirmez votre mot de passe.." required>
            <div class="button-group">
                <input type="submit" value="Register" name="ok">
                <a href="login.php" class="login-button">Login</a>
            </div>
        </form>

        <?php
        if (isset($_GET['error'])) {
            echo "<p>" . htmlspecialchars($_GET['error']) . "</p>";
        }
        ?>
    </div>
</body>
</html>
