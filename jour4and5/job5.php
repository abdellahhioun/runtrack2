<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action=""job5.php" method="POST">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
<?php
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === 'John' && $password === 'Rambo') {
    echo "Cest pas ma guerre";
} else {
    echo "Votre pire cauchemar";
}
?>
