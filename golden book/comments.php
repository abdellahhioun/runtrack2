<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['login'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['commentaire'])) {
        $commentaire = $_POST['commentaire'];
        $date = date('Y-m-d H:i:s'); // تصحيح تنسيق الوقت

        $sql = "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sis", $commentaire, $user_id, $date);

        if ($stmt->execute()) {
            $message = "commentaire a été bien ajouter";
        } else {
            $message = "error dans le commentaire";
        }
        $stmt->close();
    }
}

$sql = "SELECT c.commentaire, c.date, u.login FROM commentaires c JOIN utilisateurs u ON c.id_utilisateur = u.id ORDER BY c.date DESC";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="comments.css">
    <title>commentaires</title>
</head>
<body>
    <h1>Bonjour <?php echo htmlspecialchars($username); ?>!</h1>

    <h2>Ajouter un commentaire</h2>
    <form action="comments.php" method="post">
        <label for="commentaire">votre commentaire:</label>
        <textarea id="commentaire" name="commentaire" required></textarea>
        <br>
        <button type="submit">Ajouter un commentaire</button>
    </form>

    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>

    <h2>Les derniers commentaires</h2>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<p><strong>" . htmlspecialchars($row['login']) . "</strong> (" . htmlspecialchars($row['date']) . ")</p>";
            echo "<p>" . htmlspecialchars($row['commentaire']) . "</p>";
            echo "</div><hr>";
        }
    } else {
        echo "<p>pas de commentair</p>";
    }
    ?>

    <a href="profile.php">returnez a la page de profile</a>
</body>
</html>
