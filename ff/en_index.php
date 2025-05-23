<?php
    session_start();
    require_once "../ff/php/conn.php";
?>
<!DOCTYPE html>
<html lang="ch, en">
	<head>
		<meta charset = "utf-8">
		<link rel = "icon" href = "img/shorticon.ico">
		<title> 友誼信託 Friend Fiduciary </title>
		<meta name="description" content="....">  <!--搜尋結果中描述網頁的敘述內容-->
		<meta name="keywords" content="....">  <!--網站內容有哪些關鍵字詞-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, user-scalable=1">  <!--描述行動版的viewport資訊-->
		<link rel="stylesheet" href="css/mainstyle.css">
		<link rel="stylesheet" href="css/loginstyle.css">
	</head>
	<body>
		<?php require_once "../ff/navmenu/en_lg_navmenu.php" ?>
		<?php require_once "../ff/navmenu/en_lg_phone_menu.php" ?>
		<?php if(isset($_SESSION["loggedin"]) && $_SESSION["islogin"] == TRUE):
			header('Location: en_main.php'); ?>
    	<?php else:?>
		<div class="main">
			<form action="en_check_login.php" method="post">  <!--連結php-->
				<div class="signupFrm">
                    <div class="form">
                        <div style="position: relative;">
                            <h1 class="title">Log In</br></br></h1>
                        </div>
						<?php 
							if(isset($_SESSION['msg'])){
								//就印出
								echo "<p class='danger'> {$_SESSION['msg']} </p>";
							}
							session_unset(); ?>
                        <div class="inputContainer">
                            <label for="" class="label">
								<svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
									<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
								</svg>
							</label>
							<input name="un" type="text" class="input" placeholder="" required>
                        </div>
                
                        <div class="inputContainer">
							<label for="" class="label">
								<svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
								<path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
								</svg>
							</label>
                            <input name="pw" type="password" class="input" placeholder="" required><br/>
                        </div>
						<div class="logintext">
							<p><a href="en_register.php"></br>&nbsp &nbspRegistered?</a></p>
							<a href="wait.php">&nbsp&nbsp Forget Password?</br></a>
						</div>
                        <div class="Btn" style="position: relative;">
                            <input type="submit" class="submitBtn" value="Log In">
                        </div>
                    </div>
                </div>
            </form>
			<?php endif;?>
			<div class="angle">
				<img src="img/angle.png" alt="angle logo" title=":("/>
			</div>
			<div class="devil">
				<img src="img/devil.png" alt="devil logo" title=":D"/>
			</div>
			
		</div>
	</body>
</html>