<?php
include 'config/database.php';
include 'config/mail.php';
if (isset($_POST['email']) && !empty($_POST['email'])){
	$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$sql = "UPDATE `users` SET `password` = ? WHERE `email` = ?";
	$pwd = uniqid(rand(), true);
	$dpw = hash('whirlpool', $pwd);
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$dpw, $_POST['email']]);
	$sql = "SELECT email FROM users WHERE login = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$_POST['email']]);
	$email = $stmt->fetch(PDO::FETCH_ASSOC);
	send_forget_mail($email['email'], $_POST['email'], $pwd);
}
header('Location: login.php');
?>