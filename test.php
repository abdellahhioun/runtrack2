<?php
session_start();

if(isset($_SESSION['numberOfVisites'])){

    $_SESSION['numberOfVisites'] = 0;
}

$_SESSION['numberOfVisites'] += 1;

if(isset($_POST['reset'])){

    $_SESSION['numberOfVisites'] = 0;

header("Location: " . $_SERVER['PHP_SELF']);  // Redirect to avoid form resubmission

exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tests</title>
</head>
<body>
    <h1> number of visites is : <?php echo $_SESSION['numberOfVisites']  ?></h1>
<form action="" method= post>
<button type="submit" name="reset"></button>
</form>
</body>
</html>