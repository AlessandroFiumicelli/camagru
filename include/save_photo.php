<?php
if (isset($_POST['img']) && !empty($_POST['img'])){
	$img = $_POST['img'];
	$data = substr($img, 21);
	$data = base64_decode($data);
	file_put_contents('prova.png', $data);
	file_put_contents('try.png', $img);
}
?>
