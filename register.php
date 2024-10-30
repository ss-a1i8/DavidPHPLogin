<?php
include 'db.php';
 
 
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
 
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->execute(['username' => $username]);
 
 
if ($stmt->rowCount() > 0) {
    echo "Username already taken. Please choose another one.";
} else {
    $insert = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $insert->execute(['username' => $username, 'password' => $password]);
 
    header("Location: login.html");
    exit();
}
?>