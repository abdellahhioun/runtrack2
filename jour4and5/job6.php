<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Vérification de Nombre Pair ou Impair</h2>
    <form action="job6.php" method="GET">
        <label for="nombre">Entrez un nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <button type="submit">Vérifier</button>
    </form>
</body>
</html>
<body>
    <?php

if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];


        $isNumeric = true;
        for ($i = 0; $i < strlen($nombre); $i++) {
            if ($nombre[$i] < '0' || $nombre[$i] > '9') {
                $isNumeric = false;
                break;
            }
        }

        if ($isNumeric) {

            $nombreInt = 0;
            for ($i = 0; $i < strlen($nombre); $i++) {
                $nombreInt = $nombreInt * 10 + ($nombre[$i] - '0');
            }


            if ($nombreInt % 2 == 0) {
                echo "Nombre pair";
            } else {
                echo "Nombre impair";
            }
        } else {
            echo "Veuillez entrer un nombre valide.";
        }
    } else {
        echo "Aucun nombre n'a été soumis.";
    }
    ?>
</body>
</html>
