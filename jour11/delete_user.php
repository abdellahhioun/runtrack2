<?php
session_start(); // Start the session

// Check if the logged-in user is the admin
if (!isset($_SESSION['user_name']) || $_SESSION['user_name'] != 'admin') {
    header("Location: login.php"); // Redirect to login page if not admin
    exit();
}

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
    
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

    $request = $bdd->prepare("DELETE FROM users WHERE id = :id");
    $request->bindParam(':id', $user_id);

    if ($request->execute()) {
        header("Location: admin.php"); // Redirect to admin page after deletion
        exit();
    } else {
        echo "Erreur lors de la suppression de l'utilisateur.";
    }
} else {
    header("Location: admin.php"); // Redirect to admin page if no user ID is provided
    exit();
}
?>
