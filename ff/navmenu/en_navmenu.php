<?php
    session_start();
    require_once "../ff/php/conn.php";
?>
<div class="header">
    <div class="menubox">
        <a href="en_contact.php">Contacts</a>
        <a href="en_record.php">Record</a>
    </div>
    <div class="logo">	
        <a href="en_main.php">Friendship <img src="img/logo.png" alt="logo" title="go to main page"/>Fiduciary</a>
    </div>
    <div class="menubox" id="rightmenu">
        <a href="en_user.php"> @<?php echo $_SESSION["username"] ?></a>
        <a href="en_logout.php">Log Out</a>
        <a href="main.php">中/EN</a>
        
    </div>
</div>