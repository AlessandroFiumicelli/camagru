<?php
echo '<div class="top">';
echo '<div class="box-logo"><img id="logo" src="./img/Camagru_logo_w.png" alt="Camagru"></div>';
if (isset($_COOKIE['logged_in']) && !empty($_COOKIE['logged_in']))
	echo "<div class='nav2'><a href='profile.php'><p>".$_COOKIE['logged_in']."</p></a><div class='nav3'><a href='profile.php'><p>".$_COOKIE['logged_in']."</p></a></div>";
else
	echo " <div class='nav2'><a href='login.php'><p>LOGIN</p></a></div> <div class='nav3'><a href='subscribe.php'><p>REGISTER</p></a></div>";

if(isset($_COOKIE['logged_in']) && !empty($_COOKIE['logged_in']))
	echo "<div class='nav5'><a href='logout.php'><p>LOGOUT</p></a></div>";
else
	echo "<div class='nav5'><a href='subscribe.php'><p>REGISTER</p></a></div>";
echo '</div>';
echo '<div class="menu-top">';
echo '	<ul>';
echo '		<li id="butt5"><a href="./index.php"><img src="./img/home_b.png" alt="home"></a></li>';
echo '		<li id="butt6"><a href="./camera.php"><img src="./img/camera_b.png" alt="camera"></a></li>';
echo '		<li id="butt7"><a href="./profile.php"><img src="./img/profile_b.png" alt="profile"></a></li>';
echo '		<li id="butt8"><a href="./search.php"><img src="./img/search_b.png" alt="search"></a></li>';
echo '	</ul>';
echo '</div>';

?>
