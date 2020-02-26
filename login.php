<?php
	session_start();
	include 'config/database.php';
	include 'include/Class.form.php';
/*
	if ((isset($_COOKIE['logged_in']) && !empty($_COOKIE['logged_in'])) || (isset($_COOKIE['id']) && !empty($_COOKIE['id']))){
		$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$sql = "SELECT email FROM users WHERE email = ? AND id = ?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$_COOKIE['email'], $_COOKIE['id']]);
		$usr = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($usr['email'])
			header ('Location: index.php');
		else{
			setcookie('logged_in', '', 1);
			setcookie('id', '', 1);
			header('Location: login.php');
		}
	}
	*/
	
	if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
		
		$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$sql = "SELECT id, email, password, token, verified, login FROM users WHERE email = ? AND password = ?";
		$stmt = $pdo->prepare($sql);
		$psswd = hash('whirlpool', $_POST['password']);
		$stmt->execute([$_POST['email'], $psswd]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		if (isset($user['email']) && !empty($user['email']) && $user['verified'] == 'Y'){
			setcookie('logged_in', $user['login'], 0);
			setcookie('email', $_POST['email'], 0);
			setcookie('id', $user['id'], 0);
			header('Location: index.php');
		} else if (!(isset($user['email'])) && empty($user['email']) && !(isset($user['password'])) && empty($user['password'])){
			$_SESSION['error'] = "Password or email doesn't exists.";
		}
	}
$form = new Form();
?>
<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" type="text/css" href="./style/reset.css">
	<link rel="stylesheet" type="text/css" href="./style/style.css" >
	<link rel="stylesheet" type="text/css" href="./style/style_login.css" >
	<meta name="viewport" content-"width=device-width, initial-scale=1">
</head>
<body>
	<div class="wrapper">
<?php
require "include/nav_top.php";
?>
	<div class="mainbody">
		<div id="bg_sing">
			<img src="./img/bg_login.png" alt="bg_login.png">
		</div>
		<div id="login">
		<center>
			<h1><p>Snap with any device.</p></h1>
			</br>
			</br>
			<h4><p>*Required field</p></h4>
			<?php $form->open(["action" => "./login.php"]);?>
			</br><?php $form->input(["type" => "email", "name" => "email", "placeholder" => "*Email", "required" => "true"]);?>
			</br><?php $form->input(["type" => "password", "name" => "password", "placeholder" => "*Password", "required" => "true"]);?>
			</br><?php $form->submit(["name" => "login", "value" => "Log in"]);?>
			</br><span>
				<?php
					if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
						echo '<font style="font-size:3vw;">*'.htmlspecialchars($_SESSION['error']).'</font>';
						$_SESSION['error']='';
					}
					if (isset($_SESSION['subscribe']) && !empty($_SESSION['subscribe']) && $_SESSION['subscribe'] === '1') {
						echo '<font style="font-size:3vw;">Check Email</font>';
						$_SESSION['subscribe'] = '';
					}
				?>
			</span>
			<?php $form->close();?>
		</center>
		</div>
		<div id="subscribe">
			<p>Do not have an account? <a href="./subscribe.php">Subscribe</a></p>
		</div>
		<div id="forgot">
		<center>
			<p>Do you have forgot the password?</br>
			</br><?php $form->open(["action" => "./login.php"]);?>
			</br><?php $form->input(["type" => "email", "name" => "email", "placeholder" => "*Email", "required" => "true"]);?>
			</br><?php $form->submit(["id" => "frt", "value" => "Recover"]);?>
			<?php $form->close();?>
		</center>
		</div>
	</div>
<?php
require "include/nav_bot.php";
?>
	</div>
</body>
</html>

