<?php
session_start();
	include 'includes/database.php';
	if (isset($_COOKIE['logged_in']) && !empty($_COOKIE['logged_in']))
		header('Location: index.php');
	$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$sql = "UPDATE `users` SET `verified` = 'Y' WHERE `login` = ?";
	$stmt = $pdo->prepare($sql);
	if (isset($_POST['token']) && !empty($_POST['token'])){
		if ($_POST['token'] === $_SESSION['token'])
			$_SESSION['verified'] = '1';
	}
	if (isset($_SESSION['verified']) && !empty($_SESSION['verified'])){
		$stmt->execute([$_SESSION['login']]);
		setcookie('logged_in', $_SESSION['login'], 0);
		$_SESSION['verified'] = '';
		$_SESSION['login'] = '';
		$_SESSION['token'] = '';
		header("Location: index.php");
	}
?>
<html>
<head>
	<title>Camagru</title>
	<style>
		body {
			background-color: rgb(38, 38, 38);
			font: 95% Arial, Helvetica, sans-serif;
			}
		#content {
			width: 1152px;
			height: 864px;
			margin: 86px 384px 0px 384px;
		}
		#bg_sing {
			float: left;
			height: 864px;
			width: 560px;
		}
		#bg_sing img {
			margin:5% 5% 5% 5%;
			width: 100%;
		}
		#login {
			width: 560px;
			float: left;
			margin: 5px auto;
			padding: 5px;
			background-color: #FFFAF0;
			border: 0.1px solid;
			border-color: rgb(38, 38, 38);
			border-radius: 3px;
			opacity: 0.9;
		}
		#login input[type="email"],
		#login input[type="text"],
		#login input[type="password"]
		{
			-webkit-transition: all 0.30s ease-in-out;
			-moz-transition: all 0.30s ease-in-out;
			-ms-transition: all 0.30s ease-in-out;
			-o-transition: all 0.30s ease-in-out;
			outline: none;
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			width: 50%;
			background: #fff;
			margin-bottom: 4%;
			border: 1px solid #ccc;
			padding: 3%;
			border-radius: 3px;
			color: #555;
			font: 95% Arial, Helvetica, sans-serif;
		}
		#login input[type="email"]:focus,
		#login input[type="text"]:focus,
		#login input[type="password"]:focus {
			box-shadow: 0 0 5px #43D1AF;
			padding: 3%;
			border: 1px solid #43D1AF;
			border-radius: 3px;
		}
		#login input[type="submit"],
		#login input[type="botton"] 
		{
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			width: 50%;
			padding: 3%;
			background: #2471FF;
			border-radius: 3px;
			border-bottom: 3px solid #5994FF;
			border-top-style: none;
			border-right-style: none;
			border-left-style: none;
			color: #D2E2FF;
		}
		#login input[type="submit"]:hover,
		#login input[type="botton"]:hover {
			background: #6B9FFF;
			color:#fff;
		}
		#subscribe {
			width: 560px;
			height: 50px;
			border-radius: 3px;
			margin: 5px auto;
                        padding: 5px;
                        background-color: #FFFAF0;
                        border: 0.1px solid;
                        border-color: rgb(38, 38, 38);
                        opacity: 0.9;
			float: left;
		}
		#subscribe p {
			text-align: center;
			}
		.footer {
			width: 1152px;
			height: 50px;
			float: left;
			margin: 0px 384px 0px 384px;
			}
		.footer p {
			color: #DCDCDC;
			padding-bottom: 5px;
		}
		.logo {
			margin: 5% auto;
			width: 30%;
		}	
	</style>
</head>
<body>
	<div id="content">
		<div id="bg_sing">
			<img src="./img/bg_login.png" alt="bg_login.png">
		</div>
		<div id="login">
		<center>
			<img class="logo" src="./img/Camagru_logo_b.png" alt="Camagru">
			<p>Insert your token for activate your account.</p>
<form action='./verify.php' method='POST'>
					<font size="3vw">Token</font></br><input type='text' name='token'></input></br>
					<input type='submit' name='verify' value='verify'></input>
				</form>
		</center>
		</div>
		<div id="subscribe">
			<p>Do not have an account? <a href="./subscribe.php">Subscribe</a></p>
		</div>
	</div>
	<div class="footer">
		<p>&copy; alfiumic 2020</p>
	</div>
</body>
</html>

