<?php
session_start();
include 'config/database.php';
include 'include/ft_testinput.php';
include 'include/mail.php';
include 'include/Class.form.php';
// check if the cookie is valid or not
if (strpos($_POST['email'], '`') != false){
	setcookie('logged_in', 'invalid', 1);
	setcookie('id', 'invalid', 1);
	header('Location: index.php');
}
// check if someone is logged_in
if (isset($_COOKIE['logged_in']) && !empty($_COOKIE['logged_in']))
	header('location: index.php');

// define variables and set to empty values
$loginErr = $emailErr = $passErr = "";
$login = $email = $password = $c_password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
		$_SESSION['error'] = $emailErr;
	} else {
		$email = test_input($_POST["email"]);
		// chechk if email address is well-formatted
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
			$_SESSION['error'] = $emailErr;
		}
	}
	$login = test_input($_POST["login"]);
    	// check if name only contains letters and whitespace
    	if (!preg_match("/^[a-zA-Z0-9 ]*$/",$login)) {
    		$loginErr = "Only letters, numbers and white space allowed";
			$_SESSION['error'] = $loginErr;
	}

	if (empty($_POST["password"]) && empty($_POST["c_password"])) {
		$passErr = "Password and Repeat Password are required";
		$_SESSION['error'] = $passErr;
	} else {
		$password = $_POST["password"];
		$c_password = $_POST["c_password"];
		// chechk if password address is well-formatted
		if ((!preg_match("/^[a-zA-Z0-9 ]*$/",$password)) && (!preg_match("/^[']*$/", $password)) && (!preg_match("/^[@]*$/", $password)) && (strlen($password) < 7)) {
			$passErr = "Password must be 8 characters long and must contain at least one uppercase letter, one lowercae letter, and one digit and one special characters ('@).";
			$_SESSION['error'] = $passErr;
		}
		// check if the password and c_password match
		if ($password != $c_password) {
			$passErr = "The password doesn't match";
			$_SESSION['error'] = $passErr;
		}
	}
	// check if there are any error and then do the selection
	if ($loginErr === "" && $emailErr === "" && $passErr === "") {
		$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$sql = "SELECT login, email FROM users WHERE login = ? OR email = ?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$login, $email]);
		$exst = $stmt->fetch(PDO::FETCH_ASSOC);
		// check if there are any email already in use
		if (isset($exst['email']) && !empty($exst['email'])){
			$_SESSION['error'] = 'Email already in use.';
		}
// check if i had any error from the query and then insert the users and send the verification email
		if (!isset($_SESSION['error']) || empty($_SESSION['error'])){
			$sql = "INSERT INTO users(login, email, password, token) VALUES (?, ?, ?, ?)";
			$stmt = $pdo->prepare($sql);
			$token = uniqid(rand(), true);
			$passwd = hash('whirlpool', $_POST['password']);
			$stmt->execute([$login, $email, $passwd, $token]);
			$url = $_SERVER['HTTP_HOST'].str_replace("/subscribe.php", "", $_SERVER['REQUEST_URI']);
			send_verification_email($email, $login, $token, $url);
			$_SESSION['subscribe'] = '1';
		}
	}
}
$form = new Form();
?>
<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" type="text/css" href="./style/reset.css">
	<link rel="stylesheet" type="text/css" href="./style/style.css" >
	<link rel="stylesheet" type="text/css" href="./style/style_sub.css" >
	<meta name="viewport" content-"width=device-width, initial-scale=1">
</head>
<body>
	<div class="wrapper">
<?php
require "include/nav_top.php";
?>
		<div class="mainbody">
			<div id="sub">
			<center>
				<h1><p>Subscribe to see your friends photo.</p></h1>
				</br>
				</br>
				<h4><p>*Required field</p></h4>
				<?php $form->open(["action" => "./login.php"]);?>
					</br><?php $form->input(["type" => "email", "name" => "email", "placeholder" => "*Email", "required" => "true"]);?>
					</br>
					</br><?php $form->input(["name" => "login", "placeholder" => "Username"]);?>
					</br><span class="error"><p>(The Username must have only letter and number.)</p></span>
					</br><?php $form->input(["type" => "password", "name" => "password", "placeholder" => "*Password", "required" => "true"]);?>
					</br><span class="error"><p>(Password must be at least 8 characters long, 1 uppercase, 1 lowercase, 1 digit and 1 special characters between('@).)</p></span>
					</br><?php $form->input(["type" => "password", "name" => "c_password", "placeholder" => "*Repeat Password", "required" => "true"]);?>
					</br><input placeholder="Repeat Password*" required="true" name="c_password" type="password" />
					</br>
					</br><?php $form->submit(["name" => "singup", "value" => "subscribe"]);?>
					</br>
					</br>
					<span>
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
			</center>
			</div>
			<div id="login">
				<p>Do you have an account? <a href="./login.php">Log in</a></p>
			</div>
		</div>
<?php
require "include/nav_bot.php";
?>
	</div>	

</body>
</html>
