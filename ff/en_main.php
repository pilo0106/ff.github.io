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
		<link rel="stylesheet" href="css/indexstyle.css">
		<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		
	</head>
	<body>
		<?php require_once "../ff/navmenu/en_navmenu.php" ?>
		<?php require_once "../ff/navmenu/en_phone_menu.php" ?>
		<div class="main">
			
			<div class="callboardposition">
				<div id="callboardtext">
				</div>
				<div id="callboard">
					<ul>
						<li> <a href="##"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 2022-12-29 15:44:59 Update：紀錄功能已完成</a> </li> <!--公告新增連結-->
						<li> <a href="##"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 2022-12-29 16:17:59 Update：通知功能已完成，通知將保留10天就會進行刪除</a> </li> <!--公告新增連結-->
						<li> <a href="##"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 2022-12-29 16:32:28 Update：密碼郵件修改功能已完成</a> </li> <!--公告新增連結-->
					</ul>
					<script src="scripts/callboard.js"></script>
				</div>
				
			</div>
			<h1 style="font-size:0.5rem;"><a href="en_record.php">Notice</a></h1>
			<div class="noticeposition">
			<div class="notice">
					<?php
						$from_nt = "SELECT * FROM notice WHERE to_user='$username'"; //搜尋 *(全部欄位) ，從 表

						$from_nt_run = mysqli_query($conn,$from_nt); //$con <<此變數來自引入的 db_cn.php
						if($from_nt_run){
							if(mysqli_num_rows($from_nt_run) > 0)
							{
								foreach($from_nt_run as $row)
								{
					?>
							<p><?php echo $row['created_at'].' An uncomfrirmed notification from '.'<span style="color: rgb(197, 166, 25); ">'. $row['creater'].'</span>' ?><br></p>
					<?php
								}
							}
						}
					?>
				</div>
			</div>
			<div class="angle">
				<img src="img/angle.png" alt="angle logo" title=":("/>
			</div>
			<div class="devil">
				<img src="img/devil.png" alt="devil logo" title=":D"/>
			</div>
			<div class="totaltext1">
				<p>Total Loans</p>
			</div>
			<div id="total1">
				<!--通知的內容-->
				<?php
					$username= $_SESSION["username"];
					$qq = "SELECT * FROM record WHERE (creditor= '$username' and ct_state='未還') or ((creditor= '$username' and ct_state='已完成')and dt_state!='已完成') or (creditor= '$username' and ct_state='未還') "; //搜尋 *(全部欄位) ，從 表
					
					$qq_run = mysqli_query($conn,$qq); //$conn <<此變數來自引入的 db_cn.php
					$qqnum=mysqli_num_rows($qq_run);
				?>
				<strong id="num"><?php echo $qqnum ?></strong>
			</div>
			<div class="totaltext2">
				<p>Total Overdraft </p>
			</div>
			<div id="total2">
				<!--通知的內容-->
				<?php
					$username= $_SESSION["username"];
					$qq = "SELECT * FROM record WHERE (debtor= '$username' and dt_state='未還') or ((debtor= '$username' and dt_state='已完成')and ct_state!='已完成') or (debtor= '$username' and ct_state='未還') "; //搜尋 *(全部欄位) ，從 表
					$qq_run = mysqli_query($conn,$qq); //$conn <<此變數來自引入的 db_cn.php
					$qqnum=mysqli_num_rows($qq_run);
				?>
				<strong id="num"><?php echo $qqnum ?></strong>
			</div>
		</div>
		
		<?php require_once "../ff/navmenu/en_footer.php" ?>
	</body>
</html>