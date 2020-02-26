<?php
	session_start();
	include 'config/database.php';
	$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$sql = "SELECT id, img, user_id, creation_date FROM images ORDER BY creation_date ASC";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	while ($img = $stmt->fetch(PDO::FETCH_ASSOC)){
		$sql = "SELECT login FROM users WHERE id = ?";
		$stmt2 = $pdo->prepare($sql);
		$stmt2->execute([$img['user_id']]);
		$usr = $stmt2->fetch(PDO::FETCH_ASSOC);
		$sql = "SELECT id FROM likes WHERE img_id = ?";
		$stmt2 = $pdo->prepare($sql);
		$stmt2->execute([$img['id']]);
		$lks = 0;
		while ($tmp = $stmt2->fetch(PDO::FETCH_ASSOC))
			$lks++;
		echo '<p style="font-size:2vw;position:relative;left:150px;">'.htmlspecialchars($usr['login']).'</p>';
		echo '<img src="'.htmlspecialchars($img['img']).'" style="display:block;" width="400px" height="300px"></img>';
		echo '<p style="font-size:2vw;">'.htmlspecialchars($lks).'</p>';
		echo '<form method="post" action="show_image.php"><input type="hidden" name="id" value="'.htmlspecialchars($img['id']).'"></input><input type="submit" name="comment/like" value="comment/like"></input></form>';
	}	
?>
