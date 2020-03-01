<?php

	$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$sql = "SELECT `name`, `id` FROM category";
	$stmt = $pdo->prepare($sql);
 	$stmt->execute();
	$category = $stmt->fetchAll(PDO::FETCH_ASSOC);

	function supers(){
		
		$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$sql = "SELECT `img`, `id` FROM super";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$supers = $stmt;
		
		$tmp = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$row = count($tmp);

		if ($row > 0){
			while ($super = $supers->fetch(PDO::FETCH_ASSOC)){
				echo '<div id="'.$super["id"].'><img src="'.$super["img"].' class="super"></div>';
			}
		} else {
			echo "0 result";
		}
	}

if (isset($_POST['img']) && !empty($_POST['img'])){
	$img = $_POST['img'];
	$data = substr($img, 21);
	$data = base64_decode($data);
	file_put_contents('prova.png', $data);
	file_put_contents('try.png', $img);
}
?>
