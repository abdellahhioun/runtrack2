<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){


    $login = $_POST['login'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost','root','','livreor');
    $stmt = $conn->prepare("SELECT id , password FROM utilisateurs WHERE login = ?");
    $stmt->bind_param("s",$login);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $hash);
        $stmt->fetch();


}




















?>