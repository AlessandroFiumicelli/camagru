<?php
$pdo = new PDO($DB_DSN_SETUP, 'root', '');
$sql_creator = "CREATE USER 'creator'@'localhost' IDENTIFIED WITH mysql_native_password;
				SET old_passwords = 0;
				SET PASSWORD FOR 'creator'@'localhost' = PASSWORD('@Creator1');
				GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, REFERENCES ON `camagru`.* TO 'creator'@'localhost';
				CREATE USER 'creator'@'localhost' IDENTIFIED WITH mysql_native_password BY '***';GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, FILE, REFERENCES ON *.* TO 'creator'@'localhost';ALTER USER 'creator'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
";
$sql_alfiumic = "CREATE USER 'alfiumic'@'localhost' IDENTIFIED WITH mysql_native_password;
				SET old_passwords = 0;
				SET PASSWORD FOR 'alfiumic'@'localhost' = PASSWORD('@Alfiumic1');
				GRANT SELECT, INSERT, UPDATE, DELETE ON `camagru`.* TO 'alfiumic'@'localhost';";
$pdo->query("DROP DATABASE IF EXISTS camagru");
$pdo->query("CREATE DATABASE IF NOT EXISTS camagru");
$pdo->exec($sql_creator);
$pdo->exec($sql_alfiumic);
?>
