<?php
session_start();
include "config/database.php";
?>
<html>
	<head>
		<title>Camagru</title>
		<link rel="stylesheet" type="text/css" href="./style/reset.css">
		<link rel="stylesheet" type="text/css" href="./style/style.css" >
		<meta name="viewport" content-"width=device-width, initial-scale=1">
	</head>

<body id="pageone">
	<div class="wrapper">
<?php
require "include/nav_top.php";
?>

		<div class="mainbody">
			<iframe src="show_images.php" width="100%" height="100%"></iframe>
		</div>
<?php
require "include/nav_bot.php";
?>
	</div>
</body>
</html>
