<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>i fucking hate php </title>
</head>
<body>
    <form action="" method="GET">
        <label for="style">pick one </label>
    <select name="style" >
    <option value="style1">style1</option>
    <option value="style2">style2</option>
    <option value="style3">style3</option>
</select>
<button type="submit"> set </button>
</form>
<?php
if (isset($_GET['style'])){
$style= $_GET['style'];
echo "<link rel='stylesheet' type='text/css' href='$style.css'>";
}


?>
</body>
</html>