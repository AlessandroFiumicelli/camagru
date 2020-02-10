<?php
	session_start();
	include 'includes/database.php';
	if (isset($_COOKIE['logged_in']) && !empty($_COOKIE['logged_in']))
		header("Location: index.php");
	if (isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['password']) && !empty($_POST['password'])){
		$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$sql = "SELECT login, password, token, verified FROM users WHERE login = ? AND password = ?";
		$stmt = $pdo->prepare($sql);
		$psswd = hash('whirlpool', $_POST['password']);
		$stmt->execute([$_POST['user'], $psswd]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		if (isset($user['login']) && !empty($user['login']) && $user['verified'] == 'Y'){
			setcookie('logged_in', $user['login'], 0);
			header('Location: index.php');
		}
		else if (isset($user['login']) && !empty($user['login'])){
			$_SESSION['login'] = $user['login'];
			$_SESSION['token'] = $user['token'];
			header('Location: verify.php');
		}
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
			<p>Snap with any device.</p>
			<form action='./register.php' method='POST'>
				</br><input placeholder="Email*"  required="true" name="email" type="email" value="" />
				</br><input placeholder="Password*" required="true" name="password" type="password" value=""/>
				</br><input type="submit" name="login" value="Log in"></input> 
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
