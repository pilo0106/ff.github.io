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
		<link rel="stylesheet" href="css/registerstyle.css">
		<script>
        
			function validateForm() {
				var x = document.forms["registerForm"]["pw"].value;
				var y = document.forms["registerForm"]["checkpw"].value;
				var re = /[^a-zA-Z0-9.-_]/;
                var okname = re.exec ( document.forms["registerForm"]["account"].value);
                if ( okname ) {
                        window.alert ( "The account is only allowed to fill in English letters, numbers, underscores, decimal points and minus signs." );
                        return false;
                }
				if(x.length<5){
					alert("Insufficient password length");
					return false;
				}
				if (x != y) {
					alert("Please confirm whether the password is entered correctly");
					return false;
				}
			}
		</script>
		
	</head>
	<body>
		<?php require_once "../ff/navmenu/en_lg_navmenu.php" ?>
		<?php require_once "../ff/navmenu/en_lg_phone_menu.php" ?>
		<div class="main">
			<form name="registerForm" action="en_user_register.php" method="post" onsubmit="return validateForm()">  <!--連結php-->
                <div class="signupFrm">
                    <div class="form">
                        <div style="position: relative;">
                            <h1 class="title">Sign Up</h1>
                        </div>
						<?php 
							if(isset($_SESSION['msg'])){
								//就印出
								echo "<p class='danger'> {$_SESSION['msg']} </p>";
							}
							session_unset(); ?>
                        <div class="inputContainer">
                            <label for="" class="label">Account</label>
                            <input name="account" type="text" class="input" maxlength="12" placeholder="Enter 4~12 letters or numbers" required>
                        </div>
                
                        <div class="inputContainer">
                            <label for="" class="label">Password</label>
                            <input name="pw" type="text" class="input" maxlength="15" placeholder="Enter 6~15 letters or numbers" required>
                        </div>
                
                        <div class="inputContainer">
                            <label for="" class="label">Confirm Password</label>
                            <input name="checkpw" type="text" class="input" maxlength="15" placeholder="Re-enter the password" required>
                        </div>
                    
                        <div class="inputContainer">
                            <label for="" class="label">Email</label>
                            <input name="mail" type="text" class="input" placeholder="Enter your E-mail" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"/> 
                        </div>
                        <div class="Btn" style="position: relative;">
                            <input type="submit" class="submitBtn" value="Sign Up">
                        </div>
                    </div>
                </div>
            </form>
			<div class="angle">
				<img src="img/angle.png" alt="angle logo" title=":("/>
			</div>
			<div class="devil">
				<img src="img/devil.png" alt="devil logo" title=":D"/>
			</div>
		</div>
	</body>
</html>