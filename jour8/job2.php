<?php
setcookie("nbvisites" , time() +300);


if (!isset($_COOKIE['nbvisites'])) {

    $_COOKIE['nbvisites'] = 0;

}

$_COOKIE['nbvisites'] ++;

if (isset($_POST['reset'])) {

    $_COOKIE['nbvisites'] = 0;

    header("Location: " , $_SERVER['PHP_SELF'] );
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> number of visite is : <?php echo $_COOKIE['nbvisites']  ?></h1>
    <form action="" method= post>
        <button type="submit" name= "reset">reset</button>
    </form>
</body>
</html>
<?php
setcookie("nbvisites", isset($_COOKIE['nbvisites']) ? $_COOKIE['nbvisites'] : 0, time() + 3600, "/");

if (isset($_POST['reset'])) {
    setcookie("nbvisites", 0, time() - 3600, "/");

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_COOKIE['nbvisites'])) {
    $_COOKIE['nbvisites']++;
    setcookie("nbvisites", $_COOKIE['nbvisites'], time() + 3600, "/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Number of visits: <?php echo isset($_COOKIE['nbvisites']) ? $_COOKIE['nbvisites'] : 0; ?></h1>
    <form action="" method="post">
        <button type="submit" name="reset">Reset</button>
    </form>
</body>
</html>
