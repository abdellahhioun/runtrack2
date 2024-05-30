<?php
session_start();

if(!isset($_SESSION['nov'])){

$_SESSION['nov'] = 0;
}

$_SESSION['nov'] += 1;

if(isset($_POST['reset'])){

    $_SESSION['nov'] = 0;

    header("Location: " . $_SERVER['PHP_SELF']);  // Redirect to avoid form resubmission
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
    <h1> number of visite is : <?php echo $_SESSION['nov']  ?></h1>
    <form action="" method= post>
        <button type="submit" name= "reset">resett</button>
    </form>
</body>
</html>