<?php
	if (isset($_COOKIE['logged_in']) && !empty($_COOKIE['logged_in']))
	{
			$log1 = "Hi, ".$_COOKIE['logged_in'];
			$hreflog1 = './profile.php';
			$log2 = 'Log Out';
			$hreflog2 = './logout.php';
	}
	else {
			$log1 = 'Login';
			$hreflog1 = './login.php';
			$log2 = 'Subscribe';
			$hreflog2 = './subscribe.php';
	}
	
	/*
	if(isset($_COOKIE['logged_in']) && !empty($_COOKIE['logged_in']))
	echo "<div class='nav5'><a href='logout.php'><p>LOGOUT</p></a></div>";
	else
	echo "<div class='nav5'><a href='subscribe.php'><p>REGISTER</p></a></div>";
	 */
?>
		<div class="header">
			<div class="header-logo">
				<img id="logo" src="./img/Camagru_logo_w.png" alt="Camagru">
			</div>
			<div class="header-text1">
				<a href="<?php echo $hreflog1; ?>"><p><?php echo $log1; ?></p></a>
			</div>
			<div class="header-text2">
				<a href="<?php echo $hreflog2; ?>"><p><?php echo $log2; ?></p></a>
			</div>
		</div><!-- end heder  -->
		
		<div class="navbar">
			<ul>
				<li id="butt5"><a href="./index.php"><img src="./img/home_b.png" alt="home"></a></li>
				<li id="butt6"><a href="./camera.php"><img src="./img/camera_b.png" alt="camera"></a></li>
				<li id="butt7"><a href="./profile.php"><img src="./img/profile_b.png" alt="profile"></a></li>
				<li id="butt8"><a href="./search.php"><img src="./img/search_b.png" alt="search"></a></li>
			</ul>
		</div><!-- end navbar  -->
