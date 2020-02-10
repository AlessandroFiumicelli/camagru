<?php
if (isset($_COOKIE['logged_in']) && !empty($_COOKIE['logged_in']))
	setcookie('logged_in', '', 1);
header('Location: index.php');
?>
