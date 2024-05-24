<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job1</title>
</head>
<body>
    <form action="job1.php" method= "GET">

    <label for="champs 1">champs1</label>
    <input type="text" name=champs1>

    <label for=champs2">champs2</label>
    <input type="text" name=champs2>

    <input type="submit" value="send">

</form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"]== "GET"){   

$numberOfGitsSents= count($_GET);   

echo "the number of gits that has been sents is " . $numberOfGitsSents;

}






?>
