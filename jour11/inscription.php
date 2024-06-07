<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form method="POST" action="traitement.php">
        <label for="nom">Votre nom</label>
        <input type="text" id="nom" name="nom" placeholder="Entrez votre nom.." required>
        <br />
        <label for="prenom">Votre prénom</label>
        <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom.." required>
        <br />
        <label for="pseudo">Votre pseudo</label>
        <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo.." required>
        <br />
        <label for="email">Votre email</label>
        <input type="email" id="email" name="email" placeholder="Entrez votre email.." required>
        <br />
        <label for="pass">Mot de passe</label>
        <input type="password" id="pass" name="pass" placeholder="Entrez votre mot de passe.." required>
        <br />
        <label for="confirm_pass">Confirmez le mot de passe</label>
        <input type="password" id="confirm_pass" name="confirm_pass" placeholder="Confirmez votre mot de passe.." required>
        <br />
        <input type="submit" value="Register" name="ok">
    </form>
    <?php
    if (isset($_GET['error'])) {
        echo "<p>" . htmlspecialchars($_GET['error']) . "</p>";
    }
    ?>
</body>
