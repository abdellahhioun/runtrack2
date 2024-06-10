<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Connexion</title>
</head>
<body>

<?php
session_start(); // Démarrage de la session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "utilisateurs";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    die();
}

$error_msg = ""; // Initialisation de la variable $error_msg

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if (!empty($email) && !empty($password)) {
        $req = $bdd->prepare("SELECT * FROM users WHERE email = :email");
        $req->bindParam(':email', $email);
        $req->execute();
        $rep = $req->fetch(PDO::FETCH_ASSOC);

        if ($rep && password_verify($password, $rep['mdb'])) {
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION['user_id'] = $rep['id'];
            $_SESSION['user_email'] = $rep['email'];
            $_SESSION['user_name'] = $rep['nom'];
            $_SESSION['user_role'] = $rep['role'];

            if( $_SESSION['user_role'] == 'admin' ){
                echo $rep['role'];
                header('location: admin.php');
            }
            elseif($_SESSION['user_role'] == 'user'){
                echo $rep['role'];
                header ('location: dashboard.php');
            }
            else{
                echo $rep['role'];
                header ('location: error_header_page.php');
            }
        } else {
            $error_msg = "Email ou mot de passe incorrect";
        }
    } else {
        $error_msg = "Veuillez remplir tous les champs";
    }
}
?>

<div class="welcome-message">
    <img src="Real madrid logo.png" alt="Real Madrid Logo" class="logo">
    <h1>Welcome / Hola</h1>
</div>

<form method="POST" action="">
    <label for="email">Email</label>
    <input type="email" placeholder="Entrez votre email" id="email" name="email" required>
    <label for="password">Mot de passe</label>
    <input type="password" placeholder="Entrez votre mot de passe" id="password" name="password" required>
    <input type="submit" value="Se connecter" name="ok">
</form>

<?php
if (!empty($error_msg)) {
    echo "<p>$error_msg</p>";
}
?>

</body>
</html>
