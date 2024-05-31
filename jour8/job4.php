<?php
// Démarrer la session
session_start();

if (isset($_POST['connexion']) && !empty(trim($_POST['prenom']))) {
    setcookie("prenom", $_POST['prenom'], time() + (86400 * 30), "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_POST['deco'])) {

    setcookie("prenom", "", time() - 3600, "/");
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$prenom = isset($_COOKIE['prenom']) ? $_COOKIE['prenom'] : null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
</head>
<body>
    <?php if ($prenom): ?>
        <h1>Bonjour <?php echo htmlspecialchars($prenom); ?> !</h1>
        <!-- Formulaire de déconnexion -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <button type="submit" name="deco">Déconnexion</button>
        </form>
    <?php else: ?>
        <h2>Connexion</h2>
        <!-- Formulaire de connexion -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
            <button type="submit" name="connexion">Connexion</button>
        </form>
    <?php endif; ?>
</body>
</html>
