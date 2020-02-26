<?php
session_start();
include 'config/database.php';
if (isset($_COOKIE['logged_in']) && !empty($_COOKIE['logged_in'])){
	header('Location: index.php');
}
$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
$sql = "UPDATE `users` SET `verified` = 'Y' WHERE `token` = ?";
$stmt = $pdo->prepare($sql);
if (isset($_GET['token']) && !empty($_GET['token'])){
$stmt->execute([$_GET['token']]);
	$sql = "UPDATE `users` SET `token` = '' WHERE token = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$_GET['token']]);
}
header('Location: login.php');
?>
