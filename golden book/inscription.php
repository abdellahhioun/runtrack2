<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password === $password_confirm){
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $conn = new mysqli('localhost', 'root', '','livreor');
    $stmt = $conn->prepare("INSERT INTO utilisateurs (login,password) VALUES (?,?)");
    $stmt-> bind_param("ss",$login, $hash);
    $stmt-> execute();
    $stmt->close();
    $conn->close();

    header('location: connexion.php');
    exit();


}else{
    echo "Les mots de pass ne correspondent pas";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1> Inscription</h1>
<form action="" method="post">
<label for="login">Login :</label>
<input type="text" name="login" id="login" required><br>
<label for="password"> Password :</label>
<input type="password" name="password" id="password" required><br>
<label for="password_confirm">confirmez le mot de passe : </label>
<input type="password" name="password_confirme" required><br>
<input type="submit" value="S'inscrire">
</form>
<a href="connexion.php">Déja inscrit ? Connecter-vous ici</a>
</body>
</html>


















