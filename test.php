<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test my guy</title>
</head>
<body>
    <form action="test.php" method="GET">
    <label for="place1">place1</label>
    <input type="text" name="place1">

    <label for="place2">place2</label>
    <input type="text" name="place2" >


    <input type="submit" value="send">
    </form>
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        
    $numberOfGits= count($_GET);
    echo "number of gits is " .$numberOfGits;
}

?>
