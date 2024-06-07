<?php
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

if (isset($_POST['ok'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT); // Hashage du mot de passe

    // Check if email or username already exists
    $check_query = $bdd->prepare("SELECT * FROM users WHERE email = :email OR pseudo = :pseudo");
    $check_query->execute(array(
        "email" => $email,
        "pseudo" => $pseudo
    ));
    $existing_user = $check_query->fetch(PDO::FETCH_ASSOC);

    if ($existing_user) {
        echo "Email or username already exists!";
    } else {
        $requete = $bdd->prepare("INSERT INTO users (nom, prenom, pseudo, email, mdb) VALUES (:nom, :prenom, :pseudo, :email, :password)");
        $requete->execute(array(
            "nom" => $nom,
            "prenom" => $prenom,
            "pseudo" => $pseudo,
            "email" => $email,
            "password" => $password
        ));

        // Rediriger vers la page de connexion après l'inscription
        header('Location: login.php');
        exit();
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
    <form method="POST" action="traitement.php">
        <label for="nom">Votre nom</label>
        <input type="text" id="nom" name="nom" placeholder="Entrez votre nom.." required><br>
        
        <label for="prenom">Votre prénom</label>
        <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom.."><br>
        
        <label for="pseudo">Votre pseudo</label>
        <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo.."><br>
        
        <label for="email">Votre email</label>
        <input type="email" id="email" name="email" placeholder="Entrez votre email.."><br>
        
        <label for="pass">Password</label>
        <input type="password" id="pass" name="pass" placeholder="Entrez votre password.."><br>
        
        <input type="submit" value="Register" name="ok">
    </form>
</body>
</html>
