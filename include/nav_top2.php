<?php
echo '<div class="top">';
echo '	<img id="logo" src="./img/Camagru_logo_w.png" alt="Camagru">';
if (isset($_COOKIE['logged_in']) && !empty($_COOKIE['logged_in']))
	echo "<div class='nav2'><a href='profile.php'><p>".$_COOKIE['logged_in']."</p></a><div class='nav3'><a href='profile.php'><p>".$_COOKIE['logged_in']."</p></a></div>";
else
	echo " <div class='nav2'><a href='login.php'><p>LOGIN</p></a></div> <div class='nav3'><a href='subscribe.php'><p>REGISTER</p></a></div>";

echo '</div>';
echo '<div class="menu-top">';
echo '	<ul>';
echo '		<li><a href="./index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>';
echo '		<li id="butt2"><a href="./camera.php"><i class="fa fa-camera-retro" aria-hidden="true"></i></a></li>';
echo '		<li><a href="./profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>';
echo '		<li><a href="./search.php"><i class="fa fa-search" aria-hidden="true"></i></a></li>';
echo '	</ul>';
echo '</div>';

?>
