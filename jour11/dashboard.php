<?php
session_start(); // Start session
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "utilisateurs";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

// Handle logout
if (isset($_POST['logout'])) {
    // Destroy session
    session_destroy();
    // Redirect to login page
    header('Location: login.php');
    exit();
}

// Connect to database
try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    die();
}

// Handle comment submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment'])) {
    $comment = htmlspecialchars($_POST['comment']);
    $user_id = $_SESSION['user_id'];

    // Insert comment into database
    $stmt = $bdd->prepare("INSERT INTO comments (user_id, comment) VALUES (:user_id, :comment)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':comment', $comment);
    $stmt->execute();
}

// Retrieve comments from database
$stmt = $bdd->query("SELECT comments.comment, users.nom FROM comments INNER JOIN users ON comments.user_id = users.id ORDER BY comments.created_at DESC");
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome to the Dashboard, <?php echo $_SESSION['user_name']; ?></h1>

<!-- Logout Button -->
<form method="POST" action="">
    <input type="submit" name="logout" value="Logout">
</form>

<!-- Comment Form -->
<form method="POST" action="">
    <label for="comment">Leave a comment:</label><br>
    <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Submit">
</form>

<!-- Display Comments -->
<h2>Comments:</h2>
<ul>
    <?php foreach ($comments as $comment) : ?>
        <li><?php echo $comment['nom'] . ': ' . $comment['comment']; ?></li>
    <?php endforeach; ?>
</ul>

<a href="profile.php">
    <button>Edit Profile</button>
</a>
</body>
</html>
