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
		<link rel="stylesheet" href="css/contactstyle.css">
		
	</head>
	<body>
	<?php require_once "../ff/navmenu/en_navmenu.php" ?>
	<?php require_once "../ff/navmenu/en_phone_menu.php" ?>
		<div class="main">
			<div class="contactposition">
				<div class="contact">
					<div class="tab">
						<button class="tablinks" onclick="openCity(event, 'all')">Contacts</button>
						<button class="tablinks" onclick="openCity(event, 'new')">Add New Contact</button>
					</div>
					<?php
						$username= $_SESSION["username"];
						$query = "SELECT nickname, object FROM contacts WHERE username= '$username'"; //搜尋 *(全部欄位) ，從 表

						$query_run = mysqli_query($conn,$query); //$con <<此變數來自引入的 db_cn.php
					?>
					<div class="page">	
						<div id="all" class="tabcontent">
							<table>
									<tr>
										<th>Nickname</th>
										<th></th>
										<th>Contact ID</th>
										<th></th>
									</tr>
									<!-- 大括號的上、下半部分 分別用 PHP 拆開 ，這樣中間就可以純用HTML語法-->
									<?php
										if(mysqli_num_rows($query_run) > 0)
										{
											foreach($query_run as $row)
											{
									?>
									<tr>
										<!-- $row['(輸入資料表的欄位名稱)'];  <<用雙引號也行 -->
										<td><?php echo $row['nickname']; ?></td>
										<td>
											<a href="##"><svg xmlns="http://www.w3.org/2000/svg" width="0.67rem" height="0.67rem" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
												<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
												<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
											</svg></a>
										</td> 
										<td><?php echo '@'.$row['object']; ?></td>
										<td>
											<a href="##"><svg xmlns="http://www.w3.org/2000/svg" width="0.67rem" height="0.67rem" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16" >
												<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
											</svg></a>
										</td> 
									</tr>
									<?php
										}
										}
									?>
							</table> 
						</div>
					</div>
					<div class="page">	
						<div id="new" class="tabcontent">
							<form action="en_addcontact.php" method="post">
								<label for="" class="label" style="left:5.7rem;">
								<svg xmlns="http://www.w3.org/2000/svg" width="0.94rem" height="0.94rem" fill="currentColor" class="bi bi-at" viewBox="0 0 16 16">
									<path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"/>
								</svg>
									
								</label>
								<input type="text" name="findid" class="input" placeholder="Enter contact ID" required>
								<div class="Btn" style="position: relative;">
									<input type="submit" class="submitBtn" value="Add">
								</div>
								
							</form>
						</div>
						<script src="scripts/tab.js"></script>
					</div>
				</div>  
			</div>
		</div>
		<?php require_once "../ff/navmenu/en_footer.php" ?>
	</body>
</html>