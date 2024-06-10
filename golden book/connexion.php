<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $login = $_POST['login'];
    $password = $_POST['password']; 
    

    $conn = new mysqli('localhost', 'root', '','livreor');
    $stmt = $conn->prepare("SELECT id, password FROM utilistaeurs WHERE login = ?");
    $stmt->bind_param("s",$login);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hash);
    $stmt->fetch();

if($stmt->num_rows > 0 && password_verify($password,$hash)){
$_SESSION['user_id'] = $id;
$_SESSION['login'] = $login;
header('Location: index.php');
exit();



}else{
echo 'login ou mot de pass incorrect';
}
$stmt->close();
$conn->close();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
</head>
<body>
    
</body>
</html>



