<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Arguments POST</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Arguments POST et leurs valeurs associées</h2>
    
    <table>
        <tr>
            <th>Argument</th>
            <th>Valeur</th>
        </tr>
        <?php
        // Vérifier si des arguments POST sont présents
        if (!empty($_POST)) {
            // Parcourir tous les arguments POST et leurs valeurs associées
            foreach ($_POST as $argument => $valeur) {
                // Afficher chaque argument et sa valeur dans une ligne du tableau
                echo "<tr><td>$argument</td><td>$valeur</td></tr>";
            }
        } else {
            // Si aucun argument POST n'est présent, afficher un message
            echo "<tr><td colspan='2'>Aucun argument POST n'a été envoyé.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
