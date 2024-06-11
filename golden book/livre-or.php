<?php
require 'config.php';

// جلب جميع التعليقات من قاعدة البيانات
$sql = "SELECT c.commentaire, c.date, u.login FROM commentaires c JOIN utilisateurs u ON c.id_utilisateur = u.id ORDER BY c.date DESC";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>livreor</title>
    <link rel="stylesheet" href="livre-or.css">
</head>
<body>
    <h1>tous les commentaire</h1>

    <h2>les commentaire</h2>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<p><strong>" . htmlspecialchars($row['login']) . "</strong> (" . htmlspecialchars($row['date']) . ")</p>";
            echo "<p>" . htmlspecialchars($row['commentaire']) . "</p>";
            echo "</div><hr>";
        }
    } else {
        echo "<p>pas des commentaires</p>";
    }
    ?>

    <a href="profile.php">returnez a votre profile</a>
</body>
</html>
