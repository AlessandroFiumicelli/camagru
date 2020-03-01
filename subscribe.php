<?php
session_start();
include 'config/database.php';
include 'include/ft_testinput.php';
include 'include/mail.php';
include 'include/Class.form.php';
include 'include/sub.php.php';
$form = new Form();
?>
<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" type="text/css" href="./style/reset.css">
	<link rel="stylesheet" type="text/css" href="./style/style_template.css" >
	<link rel="stylesheet" type="text/css" href="./style/style_form-1.css" >
	<meta name="viewport" content-"width=device-width, initial-scale=1">
</head>
<body>
	<div class="wrapper">
<?php
require "include/nav_top.php";
?>
		<div class="mainbody">
			<div class="form-1">
				<h1>Subscribe to see your friends photo.</h1>
				</br>
				</br>
				<h5>*Required field</h5>
				<?php $form->open(["action" => "subscribe.php"]);?>
					</br><?php $form->input(["type" => "email", "name" => "email", "placeholder" => "*Email", "required" => "true"]);?>
					</br>
					</br><?php $form->input(["name" => "login", "placeholder" => "Username"]);?>
					</br><span class="error"><p>(The Username must have only letter and number.)</p></span>
					</br><?php $form->input(["type" => "password", "name" => "password", "placeholder" => "*Password", "required" => "true"]);?>
					</br><span class="error"><p>(Password must be at least 8 characters long, 1 uppercase, 1 lowercase, 1 digit and 1 special characters between('@).)</p></span>
					</br><?php $form->input(["type" => "password", "name" => "c_password", "placeholder" => "*Repeat Password", "required" => "true"]);?>
					</br>
					</br><?php $form->submit(["name" => "singup", "value" => "subscribe"]);?>
					</br>
					</br>
					<span class="error">
					<?php
						if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
							echo '<font style="font-size:3vw;">'.htmlspecialchars($_SESSION['error']).'</font>';
							$_SESSION['error']='';
						}
						if (isset($_SESSION['subscribe']) && !empty($_SESSION['subscribe']) && $_SESSION['subscribe'] === '1') {
							echo '<font style="font-size:3vw;">Check Email</font>';
							$_SESSION['subscribe'] = '';
						}
					?>
					</span>
					</br>
				<?php $form->close();?>
			</div>
			<div class="form-1">
				<p>Do you have an account? <a href="./login.php">Log in</a></p>
			</div>
		</div>
<?php
require "include/nav_bot.php";
?>
	</div>	

</body>
</html>
