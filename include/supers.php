<?php

	$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$sql = "SELECT `img`, `id`, `cat_id` FROM super";
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
			if ($val["cat_id"] == 1)
				$cat = "Animal";
			else if ($val["cat_id"] == 2)
				$cat = "Clothes";
			else if ($val["cat_id"] == 3)
				$cat = "Emoji";
			else if ($val["cat_id"] == 4)
				$cat = "Stickers";
			echo '<div class="'.$cat.'"><img src="'.$val["img"].'" id="s'.$val["id"].'"></div>';
		}
	} else {
		echo "0 result";		}
?>
