<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livreor";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: . $conn->connect_error");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO utilisateurs (login, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
       header('Location: index.php');
    } else {
        echo "error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="inscription.css">
</head>
<body>
    <form action="" method="POST">
    <label for="username">nom de l'utilisateur </label>
    <input type="text" id="login" name="login" required>
    <label for="password">mot de passe </label>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit">inscription</button>
    </form>

</body>
</html>