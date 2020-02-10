<?php
$pdo = new PDO($DB_DNS_SETUP, $DB_CREATOR, $DB_CREATOR_PSW);
$pdo->query("DROP DATABASE IF EXISTS camagru");
$pdo->query("CREATE DATABASE IF NOT EXISTS camagru");
$pdo = new PDO ($DB_DSN, $DB_CREATOR, $DB_CREATOR_PSW;
$sql_us = "CREATE TABLE `users` (
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`username` VARCHAR(11) DEFAULT "Jhon Doe",
			`email` VARCHAR(50) NOT NULL,
			`password` VARCHAR(255) NOT NULL,
			`token` VARCHAR(50) NOT NULL,
			`reset_password` VARCHAR(1) NOT NULL, DEFAULT 'N',
			`verified` VARCHAR(1) NOT NULL, DEFAULT 'N',
			`img_profile` VARCHAR(100) NOT NULL,
			`creation_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)";

$sql_img= "CREATE TABLE `images` (
			`id` INT NOT NUL AUTO_INCREMENT PRIMARY KEY,
			`user_id` INT(11) NOT NULL,
			`img` VARCHAR(100) NOT NULL,
			`creation_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			FOREING KEY (user_id) REFERENCES users(id)
			)";

$sql_likes = "CREATE TABLE `likes` (
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`user_id` INT(11) NOT NULL,
			`img_id` INT(11) NOT NULL,
			FOREING KEY (user_id) REFERENCES users(id),
			FOREING KEY (img_id) REFERENCES images(id)
			)";

$sql_follow = "CREATE TABLE `follow` (
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`id_followed` INT(11) NOT NULL,
			`id_follower` INT(11) NOT NULL,
			FOREING KEY (id_followed) REFERENCES users(id),
			FOREING KEY (id_follower) REFERENCES users(id)
			)";

$sql_cmts = "CREATE TABLE `comments` (
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`user_id` INT(11) NOT NULL,
			`img_id` INT(11) NOT NULL,
			`text` VARCHAR(255) NOT NULL,
			`creation_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			FOREIGN KEY (user_id) REFERENCES user(id),
			FOREING KEY (img_id) REFERENCES images(id)
			)";

$pdo->exec($sql_us);
$pdo->exec($sql_img);
$pdo->exec($sql_likes);
$pdo->exec($sql_follow);
$pdo->exec($sql_cmts);
file_put_contents("installed", "1");
?>
