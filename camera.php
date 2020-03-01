<?php
	session_start();
	include 'config/database.php';
	include 'include/Class.form.php';
	include 'include/save_photo.php';

$form = new Form();
?>
<html>
	<head>
		<title>Camagru</title>
		<link rel="stylesheet" type="text/css" href="./style/reset.css">
		<link rel="stylesheet" type="text/css" href="./style/style_template.css" >
		<meta name="viewport" content-"width=device-width, initial-scale=1">
	</head>
<body id="pagetwo">
	<div class="wrapper">
<?php
require "include/nav_top.php";
?>
		<div class="mainbody">
			<div id="super">
				<?php $form->open(["action" => "./camera.php", "name" => "form1"]);?>
				<?php $form->select(["name" => "category"], $category);?>
				<?php $form->submit(["style" => "display:none;"])?>
				<?php $form->close();?>
			</div>
			<div id="output_super">
				<?php include 'include/supers.php';?>
			</div>
			<!-- Stream video via webcam -->
			<div class="camera-wrap">
				<video id="video" autoplay="true">Video stream not avaible</video>
				<a href="#" id="capture" style="display:block;">Take photo</a>
			</div><!-- end video-wrap -->

			<!-- Trigger canvvas to reach the image -->
			<canvas id="canvas" width="400px" height="300px" style="display: none;">
			</canvas>

			<!-- Image output -->
			<div class="output">
				<img id="photo" src="" alt="The screen capure will appear in this box.">
			</div>
			<!-- Save the immage -->
			<?php $form->open(["action" => "./camera.php", "name" => "form1"]);?>
			<?php $form->submit(["name" => "save", "value" => "save"]);?>
			<?php $form->close();?>
			<script type="text/javascript" src="include/photo.js"></script>
		</div><!-- end mainbody -->
<?php
require "include/nav_bot.php";
?>
	</div><!-- end wrapper -->		
</body>
</html>
