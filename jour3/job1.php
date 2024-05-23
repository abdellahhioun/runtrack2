<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job1</title>
</head>
<body>
    <table border="8">
       
        <?php
        $nombres = [200, 204, 173, 98, 171, 404, 459];

        foreach ($nombres as $nombre) {
            echo "<tr>";
            echo "<td>$nombre</td>";
            if ($nombre % 2 == 0) {
                echo "<td>paire</td>";
            } else {
                echo "<td>impaire</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
