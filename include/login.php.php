<?php 
/*
	if ((isset($_COOKIE['logged_in']) && !empty($_COOKIE['logged_in'])) || (isset($_C    OOKIE['id']) && !empty($_COOKIE['id']))){
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

	if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']    ) && !empty($_POST['password'])){
		$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$sql = "SELECT id, email, password, token, verified, login FROM users WHERE e    mail = ? AND password = ?";
		$stmt = $pdo->prepare($sql);
		$psswd = hash('whirlpool', $_POST['password']);
 		$stmt->execute([$_POST['email'], $psswd]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
 			if (isset($user['email']) && !empty($user['email']) && $user['verified'] == '    Y'){
 				setcookie('logged_in', $user['login'], 0);
 				setcookie('email', $_POST['email'], 0);
 				setcookie('id', $user['id'], 0);
 				header('Location: index.php');
			} else if (!(isset($user['email'])) && empty($user['email']) && !(isset($user    ['password'])) && empty($user['password'])){
 				$_SESSION['error'] = "Password or email doesn't exists.";
			}
	}
?>
