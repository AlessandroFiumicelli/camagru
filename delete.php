<?php
$DB_DSN = 'mysql:host=localhost:3306;';
$pdo = new PDO($DB_DSN, 'root', '');
$pdo->query("DROP USER IF EXISTS `creator`@'localhost'");
$pdo->query("DROP USER IF EXISTS `alfiumic`@'localhost'");
$pdo->query("DROP DATABASE IF EXISTS camagru");
$pdo->query("DROP DATABASE IF NOT EXISTS camagru");
file_put_contents("installed", "0");
echo "Deleted everything!";
?>
