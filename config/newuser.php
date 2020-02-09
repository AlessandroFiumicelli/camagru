<?php
$pdo = new PDO($DB_DNS_SETUP, 'root', '01234567');
$sql_alfiumic = "CREATE USER 'alfiumic'@'%' IDENTIFIED BY 'alfiumic'";
$sql_creator = "CREATE USER 'creator'@'%' IDENTIFIED BY '12345678'";
$sql_alfiumic_grant = "GRANT insert, select, update, delete, file ON *.* TO 'alfiumic'@'%'";
$sql_creator_grant = "GRANT insert, select, update, delete, file, create, drop ON *.* TO 'creator'@'%'";
pdo->exec($sql_alfiumic);
pdo->exec($sql_alfiumic_grant);
pdo->exec($sql_creator);
pdo->exec($sql_creator_grant);
?>
