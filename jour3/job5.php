<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compter les voyelles et les consonnes</title>
</head>
<body>
    <?php
    $str = "On n’est pas le meilleur quand on le croit mais quand on le sait";

    $dic = [
        "voyelles" => 0,
        "consonnes" => 0
    ];

    $voyelles_list = "aeiouyAEIOUYéèàùâêîôûäëïöü";

    for ($i = 0; $i < strlen($str); $i++) {

        if (ctype_alpha($str[$i])) {

            if (strpos($voyelles_list, $str[$i]) !== false) {
                $dic["voyelles"]++;
            } else {
                $dic["consonnes"]++;
            }
        }
    }


?>
    <table border="7" >
        <thead>
            <tr>
            <th>Voyelles</th>
            <th>Consonnes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><?php echo $dic["voyelles"]; ?></td>
            <td><?php echo $dic["consonnes"]; ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
