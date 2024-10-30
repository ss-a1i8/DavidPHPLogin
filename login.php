<?php

include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];


$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->execute(['username' => $username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if ($user && password_verify($password, $user['password'])) {
    header("Location: home.html");
} else {
    header("Location: login.html");
}
exit();
?>