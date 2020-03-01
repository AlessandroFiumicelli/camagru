<?php

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
			print_r($supers);
		}
		foreach ($tmp as $key => $val){
			echo '<div id="'.$val["id"].'"><img src="'.$val["img"].'" class="super"></div>';
		}
	} else {
		echo "0 result";		}
?>
