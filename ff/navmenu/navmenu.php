<?php
    session_start();
    require_once "../ff/php/conn.php";
?>
<div class="header">
	<div class="menubox">
		<a href="contact.php">聯絡人</a>
		<a href="record.php">紀錄</a>
	</div>
	<div class="logo">	
		<a href="main.php">Friendship <img src="img/logo.png" alt="logo" title="go to main page"/>Fiduciary</a>
	</div>
	<div class="menubox" id="rightmenu">
		<a href="user.php"> @<?php echo $_SESSION["username"] ?></a>
		<a href="logout.php">登出</a>
		<a href="en_main.php">中/EN</a>
	</div>
</div>
	