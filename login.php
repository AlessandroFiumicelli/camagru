<?php
	session_start();
	include 'config/database.php';
	include 'include/Class.form.php';
	include 'include/login.php.php';
	$form = new Form();
?>
<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" type="text/css" href="./style/reset.css">
	<link rel="stylesheet" type="text/css" href="./style/style_template.css" >
	<link rel="stylesheet" type="text/css" href="./style/style_form-2.css" >
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
		<div class="form-2">
			<h1>Snap with any device.</h1>
			</br>
			</br>
			<h5>*Required field</h5>
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
		</div> 
		<div class="form-2">
			<p>Do not have an account? <a href="./subscribe.php">Subscribe</a></p>
		</div>
		<div class="form-2">
			<p>Do you have forgot the password?</br>
			</br><?php $form->open(["action" => "./login.php"]);?>
			</br><?php $form->input(["type" => "email", "name" => "email", "placeholder" => "*Email", "required" => "true"]);?>
			</br><?php $form->submit(["id" => "frt", "value" => "Recover"]);?>
			<?php $form->close();?>
		</div>
	</div>
<?php
require "include/nav_bot.php";
?>
	</div>
</body>
</html>

