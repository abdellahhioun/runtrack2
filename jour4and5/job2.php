<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Arguments GET</title>
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
    <h2>Arguments GET et leurs valeurs associées</h2>
    
    <table>
        <tr>
            <th>Argument</th>
            <th>Valeur</th>
        </tr>
        
        <?php



if (!empty($_GET)) {

    foreach ($_GET as $argument => $valeur) {

        echo "<tr><td>$argument</td><td>$valeur</td></tr>";
            }
        } else {

            echo "<tr><td colspan='2'>Aucun argument GET n'a été envoyé.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
