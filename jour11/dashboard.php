<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "utilisateurs";


if (!isset($_SESSION['user_id'])) {

    header('Location: login.php');
    exit();
}

if (isset($_POST['logout'])) {

    session_destroy();
    header('Location: login.php');
    exit();
}

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment'])) {
    $comment = htmlspecialchars($_POST['comment']);
    $user_id = $_SESSION['user_id'];

    $stmt = $bdd->prepare("INSERT INTO comments (user_id, comment) VALUES (:user_id, :comment)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':comment', $comment);
    $stmt->execute();
}

$stmt = $bdd->query("SELECT comments.comment, users.nom FROM comments INNER JOIN users ON comments.user_id = users.id ORDER BY comments.created_at DESC");
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="welcome-message">
            <h1>Welcome to the Dashboard, <?php echo htmlspecialchars($_SESSION['user_name']); ?></h1>
            <form method="POST" action="">
                <input type="submit" name="logout" value="Logout" class="button">
            </form>
        </div>
        
        <div class="comment-section">
            <form method="POST" action="" class="comment-form">
                <label for="comment">Leave a comment:</label>
                <textarea id="comment" name="comment" rows="4" cols="50" placeholder="Write your comment here..."></textarea>
                <input type="submit" value="Submit" class="button">
            </form>

            <h2>Comments:</h2>
            <ul class="comment-list">
                <?php foreach ($comments as $comment) : ?>
                    <li><?php echo htmlspecialchars($comment['nom']) . ': ' . htmlspecialchars($comment['comment']); ?></li>
                <?php endforeach; ?>
            </ul>

            <a href="profile.php" class="button">Edit Profile</a>
        </div>
    </div>
</body>
</html>
