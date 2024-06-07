<?php
session_start(); // Start the session

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

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Fetch user data from the database
$stmt = $bdd->prepare("SELECT * FROM users WHERE id = :user_id");
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);

    // Update user data in the database
    $stmt = $bdd->prepare("UPDATE users SET email = :email, mdb = :password, nom = :nom, prenom = :prenom WHERE id = :user_id");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);

    try {
        $stmt->execute();
        echo "Profile updated successfully.";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h2>Profile</h2>
    <form method="POST" action="">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter new password"><br>

        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="<?php echo $user['nom']; ?>" required><br>

        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $user['prenom']; ?>" required><br>

        <input type="submit" value="Save Changes">
    </form>
    <br>
    <a href="dashboard.php">Back to Dashboard</a>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
