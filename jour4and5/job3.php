<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="job3.php" method="POST">
    <label for="champ1">champ 1</label>
    <input type="text" name="champ 1">

    <label for="champ2">champ 2</label>
    <input type="text" name="champ 2">

<input type="submit" value="send">
</form>
</body>
</html>


<?php
if($_SERVER["REQUEST_METHOD"] =="POST"){

$numberOfPosts= count($_POST);

echo "Le nombre dargument POST envoyé est:" . $numberOfPosts;

}

?>
