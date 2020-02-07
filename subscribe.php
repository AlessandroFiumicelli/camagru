<?php
include 'db/database.php';

// define the variables and set to empty values
$emailErr = $nameErr = $passErr = "";
$email = $name = $username = $pass = $rpass = $date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Name and Surname are required";
	} else {
		$name = test_input($_POST["name"]);
// check if the name only contains letters and whitespace
	if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
		$nameErr = "Only letters and white space allowed! No special character.";
		}
	}
	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	} else {
		$email = test_input($_POST["email");
		// check if the email is well-formated
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
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
			width: 560px;
			height: 864px;
			margin: 86px 680px 0px 680px;
			display: block;
			float: left;
		}
		
		#sub {
			width: 560px;
			float: left;
			display: block;
			margin: 5px auto;
			padding: 5px;
			background-color: #FFFAF0;
			border: 0.1px solid;
			border-color: rgb(38, 38, 38);
			border-radius: 3px;
			opacity: 0.9;
		}
		#sub input[type="email"],
		#sub input[type="text"],
		#sub input[type="password"],
		#sub input[type="date"]
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


		#sub input[type="email"]:focus,
		#sub input[type="text"]:focus,
		#sub input[type="date"]:focus,
		#sub input[type="password"]:focus {
			box-shadow: 0 0 5px #43D1AF;
			padding: 3%;
			border: 1px solid #43D1AF;
			border-radius: 3px;
		}

		#sub input[type="submit"],
		#sub input[type="botton"] 
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

		#sub input[type="submit"]:hover,
		#sub input[type="botton"]:hover {
			background: #6B9FFF;
			color:#fff;
		}
		#login {
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
		#login p {
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
		<div id="sub">
		<center>
			<img class="logo" src="./img/Camagru_logo_b.png" alt="Camagru">
			<p>Subscribe to see your friends photo.</p>
			<form action='./register.php' method='POST'>
				</br><input placeholder="Email*"  required="true" name="email" type="email" value="" />
				</br><input placeholder="Name and Surname*" required="true" name="name" type="text" value=""/>
				</br><input placeholder="Username" required="true" name="username" type="text" value=""/>
				</br><input placeholder="Password*" required="true" name="password" type="password" value=""/>
				</br><input placeholder="Repeat Password*" required="true" name="rpassword" type="password" value=""/>
				
				</br><input placeholder="Birthdate" name="bdate" type="date" value=""/>
				</br><input type="submit" name="singup" value="Subscribe"></input> 
			</form>
		</center>
		</div>
		<div id="login">
			<p>Do you have an account? <a href="./login.php">Log in</a></p>
		</div>
	</div>
	<div class="footer">
		<p>&copy; alfiumic 2020</p>
	</div>

</body>
</html>
