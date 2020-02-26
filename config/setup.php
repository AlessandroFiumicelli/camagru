<?php
$pdo = new PDO ($DB_DSN, $DB_CREATOR, $DB_CREATOR_PSW);
$sql_usrs= "CREATE TABLE `users` (
				`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`login` VARCHAR(11) DEFAULT 'Jhon Doe',
				`email` VARCHAR(50) NOT NULL,
				`password` VARCHAR(255) NOT NULL,
				`token` VARCHAR(50) NOT NULL,
				`notify` VARCHAR(1) NOT NULL DEFAULT 'Y',
				`verified` VARCHAR(1) NOT NULL DEFAULT 'N',
				`img_profile` VARCHAR(100),
				`creation_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

$sql_imgs = "CREATE TABLE `images` (
				`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`user_id` INT(11) NOT NULL,
				`img` VARCHAR(100) NOT NULL,
				`creation_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
				FOREIGN KEY (user_id) REFERENCES users(id))";

$sql_likes = "CREATE TABLE `likes` (
				`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`user_id` INT(11) NOT NULL,
				`img_id` INT(11) NOT NULL,
				FOREIGN KEY (user_id) REFERENCES users(id),
				FOREIGN KEY (img_id) REFERENCES images(id))";

$sql_cmt = "CREATE TABLE `comments` (
				`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`user_id` INT(11) NOT NULL,
				`img_id` INT(11) NOT NULL,
				`comment` VARCHAR(255) NOT NULL,
				`creation_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
				FOREIGN KEY (user_id) REFERENCES users(id),
				FOREIGN KEY (img_id) REFERENCES images(id))";

$pdo->exec($sql_usrs);
$pdo->exec($sql_imgs);
$pdo->exec($sql_likes);
$pdo->exec($sql_cmt);
file_put_contents("installed", "1");
?>
