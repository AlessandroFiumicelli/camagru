<?php
function send_verification_email($toAddr, $toUsername, $token, $ip) {
	$subject = "[Camagru] - Email verification";
	
	$headers  = 'MIME-Version: 1.0'."\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8'."\r\n";
	$headers .= 'From: <alfiumic@student.42.fr>'."\r\n";
	
	$message = '
	<html>
		<head>
			<tittle>'.$subject.'</title>
		</head>
		<body>
			Hello '.htmlspecialchars($toUsername).' </br>
			To finalyze your subscription please click the link below </br>
			<a href="http://'.$ip.'/verify.php?token='.$token.'">Verify email</a>
		</body>
	</html>
	';
	mail($toAddr, $subject, $message, $headers);
}

function send_forget_mail($toAddr, $toUsername, $password) {
	$subject = "[Camagru] - Reset your password";
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$headers .= 'From: <alfiumicl@student.42.fr>' . "\r\n";

	$message = '
	<html>
		<head>
			<title>'.$subject.'</title>
		</head>
		<body>
			Hello '.htmlspecialchars($toUsername).' </br>
			There is your new password : '.$password.' </br>
		</body>
	</html>
	';
	
	mail($toAddr, $subject, $message, $headers);
}

function send_comment_mail($toAddr, $toUsername, $comment, $fromUsername) {
	$subject = "[Camagru] - New comment";
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$headers .= 'From: <alfiumic@student.42.fr>' . "\r\n";
	
	$message = '
	<html>
		<head>
			<title>'.$subject.'</title>
		</head>
		<body>
			Hello '.htmlspecialchars($toUsername).' </br>
			A user just commented one of your montage</br>
			<span>'.htmlspecialchars($fromUsername).':'.htmlspecialchars($comment).'</span>
		</body>
	</html>
	';

  mail($toAddr, $subject, $message, $headers);
}
?>
