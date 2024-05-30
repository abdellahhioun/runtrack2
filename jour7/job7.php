<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="fname">Input text:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <select name="select">
            <option value="0">---Sélectionnez une option---</option>
            <option value="1">Gras</option>
            <option value="2">Cesar Text</option>
            <option value="3">Plateforme</option>
        </select>
        <input type="submit" value="Submit">
    </form>
    <?php 
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $fname = isset($_POST["fname"]) ? $_POST["fname"] : "";
        $select = isset($_POST["select"]) ? $_POST["select"] : "";

        // Vérifier si une option a été sélectionnée
        if ($select != "0") {
            // Appeler la fonction correspondante en fonction de l'option sélectionnée
            if ($select == "1") {
                gras($fname);
            } elseif ($select == "2") {
                cesar($fname, 2);
            } elseif ($select == "3") {
                plateforme($fname);
            }
        } else {
            echo "Veuillez sélectionner une option.";
        }
    }

    // Définition des fonctions
    function gras($str) {
        // Votre code pour mettre en gras
    }

    function cesar($str, $int) {
        // Votre code pour le chiffrement César
    }

    function plateforme($str) {
        // Votre code pour la fonction plateforme
    }
    ?>
</body>
</html>
