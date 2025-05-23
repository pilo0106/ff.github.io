<?php
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
		<link rel="stylesheet" href="css/en_userstyle.css">

		<script> 
			function validateForm() {
				var y = document.forms["Form"]["pw"].value;
				var x = document.forms["Form"]["newpw"].value;
				var re = /[^a-zA-Z0-9.-_]/;
				var okpw = re.exec ( document.forms["Form"]["newpw"].value);
				if(okpw)
				{
					window.alert ( "The password is only allowed to fill in English letters, numbers, underscores, decimal points and minus signs." );
                    return false;
				}
				if(x.length<5){
					alert("Insufficient password length");
					return false;
				}
				if(x == y){
					alert("The new password cannot be the same as the old password");
					return false;
				}
			}
		</script>
			
	</head>
	<body>
	<?php require_once "../ff/navmenu/en_navmenu.php" ?>
	<?php require_once "../ff/navmenu/en_phone_menu.php" ?>
		<div class="main">			
			<nav>
				<label for="touch"><span>Profile Settings</span></label>               
				<input type="checkbox" id="touch"> 
			
				<ul class="slide">
				<li><button class="menubutton" onclick="openCity(event, 'password')">Change Password</button></li>
				<li><button class="menubutton" onclick="openCity(event, 'mail')">Change E-mail</button></li>
				</ul>
			</nav> 
			<div class="userposition">
				<div class="user">
					<div class="page">
						<div id="password" class="tabcontent">
							<p>Change password</p>
							<form  name="Form" action="en_updatepassword.php" method="post" onsubmit="return validateForm()">
								<div class="inputContainer">
									<label for="" class="label">
										<svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
											<path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
											<path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
										</svg>
										
									</label>
									<input name="pw" type="text" class="input" maxlength="15" placeholder="Enter old password" required>
								</div>
								<div class="inputContainer2">
									<label for="" class="label">
										<svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
											<path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
										</svg>
									</label>
									<input name="newpw" type="text" class="input2" maxlength="15" placeholder="Enter new password" required>
									<div class="Btn" style="position: relative;">
										<input type="submit" class="submitBtn" value="Change">
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="page">
						<div id="mail" class="tabcontent">
							<p>Change E-mail</p> 
							<form action="en_updatemail.php" method="post">
								<div class="inputContainer">
									<label for="" class="label">
										<svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
											<path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
											<path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
										</svg>
										
									</label>
									<input name="pw" type="text" class="input" maxlength="15" placeholder="Enter the password" required>
								</div>
								<div class="inputContainer2">
									<label for="" class="label">
										<svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
											<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
										</svg>
									</label>
									<input name="mail" type="text" class="input2" placeholder="Enter the new e-mail" required>
									<div class="Btn" style="position: relative;">
										<input type="submit" class="submitBtn" value="Change">
									</div>
								</div>
							</form> 
						</div>
					</div>
					<script src="scripts/tab.js"></script>
				</div>
			</div>>
		</div>
		<?php require_once "../ff/navmenu/en_footer.php" ?>
	</body>
</html>