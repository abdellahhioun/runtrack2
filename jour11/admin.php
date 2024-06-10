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

$request = 'SELECT * FROM users ORDER BY id DESC'; 
$users = []; 


try {
    $stmt = $bdd->query($request);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Panel - User Management</title>
</head>
<body>
    <div class="container">
        <h2>Admin Panel - User Management</h2>

        <table class="user-table">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['nom']; ?></td>
                    <td><?php echo $user['prenom']; ?></td>
                    <td><?php echo $user['pseudo']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="edit-link">Edit</a> |
                        <a href="delete_user.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');" class="delete-link">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
