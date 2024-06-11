<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT login  FROM utilisateurs WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();

$update_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_login'])) {
        $new_username = $_POST['new_login'];

        $sql = "UPDATE utilisateurs SET login = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $new_username, $user_id);

        if ($stmt->execute()) {
            $update_message = "le nom d'utilisateur a été mis à jour avec succès";
            $_SESSION['login'] = $new_username;
            $username = $new_username;
        } else {
            $update_message = "une erreur s'est produite lors de la mise à jour du nom d'utilisateur";
        }

        $stmt->close();
    }

    if (isset($_POST['update_password'])) {
        $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

        $sql = "UPDATE utilisateurs SET password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $new_password, $user_id);

        if ($stmt->execute()) {
            $update_message = "le mot de pass a été mis à jour avec succès";
        } else {
            $update_message = "une erreur s'est produite lors de la mise à jour du mot de passe";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <h1>Bonjour <?php echo htmlspecialchars($username); ?>!</h1>
    <?php if ($update_message != "") { echo "<p>$update_message</p>"; } ?>

    <h2>Nouveau nom</h2>
    <form action="profile.php" method="post">
        <label for="new_login">Nouveau nom </label>
        <input type="text" id="new_login" name="new_login" required>
        <br>
        <button type="submit" name="update_login">mettre à jour le nom d'utilisateurs</button>
    </form>

    <h2>Mettre a jour le mot de passe</h2>
    <form action="profile.php" method="post">
        <label for="new_password">nouveau mot de passe</label>
        <input type="password" id="new_password" name="new_password" required>
        <br>
        <button type="submit" name="update_password">Nouveau mot de passe</button>
    </form>

    <a href="logout.php">Se déconnecter</a>
</body>
</html>
