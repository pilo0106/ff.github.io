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
				var okpw = re.exec ( document.forms["registerForm"]["pw"].value);
                if ( okname ) {
                        window.alert ( "帳號只允許填入英文、數字、底線、小數點與減號" );
                        return false;
                }
				if(okpw)
				{
					window.alert ( "密碼只允許填入英文、數字、底線、小數點與減號" );
                        return false;
				}
				if(x.length<5){
					alert("密碼長度不足");
					return false;
				}
				if (x != y) {
					alert("請確認密碼是否輸入正確");
					return false;
				}
			}
		</script>
		
	</head>
	<body>
		<?php require_once "../ff/navmenu/lg_navmenu.php" ?>
		<?php require_once "../ff/navmenu/lg_phone_menu.php" ?>
		
		<div class="main">
			<form name="registerForm" action="user_register.php" method="post" onsubmit="return validateForm()">  <!--連結php-->
                <div class="signupFrm">
                    <div class="form">
                        <div style="position: relative;">
                            <h1 class="title">創建帳號</h1>
                        </div>
						<?php 
							if(isset($_SESSION['msg'])){
								//就印出
								echo "<p class='danger'> {$_SESSION['msg']} </p>";
							}
							session_unset(); ?>
                        <div class="inputContainer">
                            <label for="" class="label">帳號</label>
                            <input name="account" type="text" class="input" maxlength="12" placeholder="請輸入4~12個英文或數字" required>
                        </div>
                
                        <div class="inputContainer">
                            <label for="" class="label">密碼</label>
                            <input name="pw" type="text" class="input" maxlength="15" placeholder="請輸入6~15個英文或數字" required>
                        </div>
                
                        <div class="inputContainer">
                            <label for="" class="label">確認密碼</label>
                            <input name="checkpw" type="text" class="input" maxlength="15" placeholder="請重複輸入密碼" required>
                        </div>
                    
                        <div class="inputContainer">
                            <label for="" class="label">Email</label>
                            <input name="mail" type="email" class="input" placeholder="請輸入電子郵件" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"/> 
                        </div>
                        <div class="Btn" style="position: relative;">
                            <input type="submit" class="submitBtn" value="註冊">
							
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