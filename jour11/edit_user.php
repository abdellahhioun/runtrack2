<?php
session_start(); 

if (!isset($_SESSION['user_name']) || $_SESSION['user_name'] != 'admin') {
    header("Location: login.php"); 
    exit();
}

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

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);

    $request = $bdd->prepare("SELECT * FROM users WHERE id = :id");
    $request->bindParam(':id', $user_id);
    $request->execute();
    $user = $request->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "Utilisateur non trouvé.";
        exit();
    }
} else {
    header("Location: admin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);

    $update_request = $bdd->prepare("UPDATE users SET nom = :nom, prenom = :prenom, pseudo = :pseudo, email = :email WHERE id = :id");
    $update_request->bindParam(':nom', $nom);
    $update_request->bindParam(':prenom', $prenom);
    $update_request->bindParam(':pseudo', $pseudo);
    $update_request->bindParam(':email', $email);
    $update_request->bindParam(':id', $user_id);

    if ($update_request->execute()) {
        header("Location: admin.php"); 
        exit();
    } else {
        echo "Erreur lors de la mise à jour de l'utilisateur.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit_user.css"> <!-- Link to your edit_user.css file -->
    <title>Edit User</title>
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>

        <form method="POST" action="">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>" required><br>

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>" required><br>

            <label for="pseudo">Pseudo:</label>
            <input type="text" id="pseudo" name="pseudo" value="<?php echo htmlspecialchars($user['pseudo']); ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>

            <input type="submit" value="Update User">
        </form>
    </div>
</body>
</html>
