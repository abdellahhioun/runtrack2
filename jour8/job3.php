<?php
// Démarrer la session
session_start();

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le champ "prenom" est défini dans le formulaire
    if (isset($_POST['prenom']) && !empty(trim($_POST['prenom']))) {
        // Ajouter le prénom à la liste dans la variable de session
        $_SESSION['prenoms'][] = $_POST['prenom'];
    }
}

// Vérifier si le bouton "reset" est cliqué
if (isset($_POST['reset'])) {
    // Réinitialiser la liste des prénoms dans la variable de session
    $_SESSION['prenoms'] = array();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Prénoms</title>
</head>
<body>
    <h2>Ajouter un prénom :</h2>
    <!-- Formulaire pour saisir un prénom -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom">
        <button type="submit">Ajouter</button>
    </form>

    <h2>Liste des prénoms :</h2>
    <!-- Affichage de la liste des prénoms stockés en session -->
    <ul>
        <?php
        // Vérifier si la variable de session "prenoms" est définie
        if (isset($_SESSION['prenoms']) && !empty($_SESSION['prenoms'])) {
            // Parcourir la liste des prénoms et les afficher
            foreach ($_SESSION['prenoms'] as $prenom) {
                echo "<li>$prenom</li>";
            }
        } else {
            echo "<li>Aucun prénom ajouté.</li>";
        }
        ?>
    </ul>

    <!-- Bouton "reset" pour réinitialiser la liste des prénoms -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <button type="submit" name="reset">Reset</button>
    </form>
</body>
</html>
