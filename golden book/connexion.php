<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livreor";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: . $conn->connect_error");
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$username = $_POST['login'];
$password = $_POST['password'];

$sql = "SELECT id, password FROM utilisateurs WHERE login = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $hashed_password);
$stmt->fetch();


if($stmt->num_rows > 0 && password_verify($password,$hashed_password)){
session_start();
$_SESSION['user_id'] = $id;
$_SESSION['login'] = $username;
header('Location: index.php');

}else{
    echo "error dans le nom ou le mot de pass";
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
    <link rel="stylesheet" href="connexion.css">
    <title>connexion</title>
</head>
<body>
   <form action="" method="POST">
    <label for="login">nom de l'utilisateur </label>
    <input type="text" id="login" name="login" required>
   <br>
   <label for="password">mot de passe</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">connexion</button>
</form>
</body>
</html>

