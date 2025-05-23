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
		<link rel="stylesheet" href="css/recordstyle.css">
	</head>
	<body>
		<?php require_once "../ff/navmenu/navmenu.php" ?>
		<?php require_once "../ff/navmenu/phone_menu.php" ?>
		<div class="main">
			<div class="recordposition">
				<div class="record">
					<?php
						$username= $_SESSION["username"];
						$qq = "SELECT * FROM record WHERE creditor='$username' and dt_state='待確認'or creditor='$username' and ct_state='待確認' or debtor= '$username' and dt_state='待確認' or debtor= '$username' and ct_state='待確認'"; //搜尋 *(全部欄位) ，從 表
						$qq_run = mysqli_query($conn,$qq); //$conn <<此變數來自引入的 db_cn.php
						$qqnum=mysqli_num_rows($qq_run);
					?>
					<div class="tab">
						<div class="tab_pst1">
							<button class="tablinks" onclick="openCity(event, 'choose1')">借出</button>
							<button class="tablinks" onclick="openCity(event, 'choose2')">欠款</button>
							<button class="tablinks" onclick="openCity(event, 'check')">待確認 <?php echo '<span id="echo_tx" style="color:rgb(255, 133, 67); font-size: 14px;font-weight:bold;">'.$qqnum.'</span>'; ?></button>
							<button class="tablinks" onclick="openCity(event, 'finish')">已完成</button>
						</div>
						<div class="tab_pst2">
							<button class="tablinks" onclick="openCity(event, 'newloan')">新增借出紀錄</button>
							<button class="tablinks" onclick="openCity(event, 'newOutstanding')">新增欠款紀錄</button>
						</div>
					</div>
					 
					<div class="page">
						<div id="choose1" class="tabcontent">
							<table>
								<?php
									$username= $_SESSION["username"];
									$query = "SELECT * FROM record WHERE (creditor= '$username' and ct_state='未還') or ((creditor= '$username' and ct_state='已完成')and dt_state!='已完成') or (creditor= '$username' and ct_state='未還') "; //搜尋 *(全部欄位) ，從 表
									
									$query_run = mysqli_query($conn,$query); //$conn <<此變數來自引入的 db_cn.php
									
								?>
								<tr>
									<th>欠款人</th>
									<th>債主</th>
									<th>金額</th>
									<th>備註</th>
									<th>新增日期</th>
									<th>&nbsp&nbsp欠款方&nbsp&nbsp</th>
									<th>&nbsp&nbsp債主方&nbsp&nbsp</th>
								</tr>
								<!-- 大括號的上、下半部分 分別用 PHP 拆開 ，這樣中間就可以純用HTML語法-->
								<?php
									if(mysqli_num_rows($query_run) > 0)
									{
										foreach($query_run as $row)
										{
											$idname=$row['debtor'];
											$nnquery= "SELECT nickname FROM contacts WHERE object= '$idname' and username='$username'";
											$nn = mysqli_query($conn,$nnquery);
											foreach($nn as $nnrow){
								?>
								<tr>
									<!-- $row['(輸入資料表的欄位名稱)'];  <<用雙引號也行 -->
									<td><?php echo $nnrow['nickname']; ?></td>
									<td class="loan_cdt_color"><?php echo $row['creditor']; ?></td>
									<td id="mny_color"><?php echo $row['money']; ?></td> 
									<td><?php echo $row['notes']; ?></td>
									<td class="loan_cdt_color"><?php echo $row['created_at']; ?></td>
									<?php   
										if($row['ct_state'] == "未還" && $row['creditor']==$username ) {	
											?>
											<td class="loan_cdt_color"><?php echo $row['dt_state']; ?></td>
											<td><form action="change_state_loan.php" method="post">
													<input type="hidden" name="hidden_id" value=<?php echo $row['id']; ?>>	
													<input class="changebtn" type="submit" name="send" value=<?php echo $row['ct_state']; ?>>
												</form>
											</td>
											<?php
										}
										else{
											?>
												<td class="loan_cdt_color"><?php echo $row['dt_state']; ?></td>
												<td class="loan_cdt_color"><?php echo $row['ct_state']; ?></td>
											<?php
										}
									?> 
								</tr>
								<?php
											}
										}
									}
								?>
							</table> 
						</div>
					</div>
					<div class="page">
						<div id="choose2" class="tabcontent">
							<table>
								<?php
									$username= $_SESSION["username"];
									$query = "SELECT * FROM record WHERE (debtor= '$username' and dt_state='未還') or ((debtor= '$username' and dt_state='已完成')and ct_state!='已完成') or (debtor= '$username' and ct_state='未還') "; //搜尋 *(全部欄位) ，從 表
									$query_run = mysqli_query($conn,$query); //$conn <<此變數來自引入的 db_cn.php
									
								?>
								<tr>
									<th>欠款人</th>
									<th>債主</th>
									<th>金額</th>
									<th>備註</th>
									<th>新增日期</th>
									<th>&nbsp&nbsp欠款方&nbsp&nbsp</th>
									<th>&nbsp&nbsp債主方&nbsp&nbsp</th>
								</tr>
								<!-- 大括號的上、下半部分 分別用 PHP 拆開 ，這樣中間就可以純用HTML語法-->
								<?php
									if(mysqli_num_rows($query_run) > 0)
									{
										foreach($query_run as $row)
										{
											$idname=$row['creditor'];
											$nnquery= "SELECT nickname FROM contacts WHERE object= '$idname' and username='$username'";
											$nn = mysqli_query($conn,$nnquery);
											foreach($nn as $nnrow){
								?>
								<tr>
									<!-- $row['(輸入資料表的欄位名稱)'];  <<用雙引號也行 -->
									<td class="loan_cdt_color"><?php echo $row['debtor']; ?></td>
									<td><?php echo $nnrow['nickname']; ?></td>
									<td id="mny_color"><?php echo $row['money']; ?></td> 
									<td><?php echo $row['notes']; ?></td>
									<td class="loan_cdt_color"><?php echo $row['created_at']; ?></td> 
									<?php   
										if($row['dt_state'] == "未還" && $row['debtor']==$username ) {	
											?>
											<td><form action="change_state_o.php" method="post">
													<input type="hidden" name="hidden_id" value=<?php echo $row['id']; ?>>	
													<input class="changebtn" type="submit" name="send" value=<?php echo $row['dt_state']; ?>>
												</form>
											</td>
											<td class="loan_cdt_color"><?php echo $row['ct_state']; ?></td>
											
											<?php
										}
										else{
											?>
												<td class="loan_cdt_color"><?php echo $row['dt_state']; ?></td>
												<td class="loan_cdt_color"><?php echo $row['ct_state']; ?></td>
											<?php
										}
									?>     
								</tr>
								<?php
											}
										}
									}
								?>
							</table>
						</div>
					</div>
					<div class="page">	
						<div id="check" class="tabcontent">
							<table>
								<?php
									$query = "SELECT * FROM record WHERE creditor='$username' and dt_state='待確認'or creditor='$username' and ct_state='待確認' or debtor= '$username' and dt_state='待確認' or debtor= '$username' and ct_state='待確認'"; //搜尋 *(全部欄位) ，從 表
									$query_run = mysqli_query($conn,$query); //$conn <<此變數來自引入的 db_cn.php
									
								?>
								<tr>
									<th>欠款人</th>
									<th>債主</th>
									<th>金額</th>
									<th>備註</th>
									<th>新增日期</th>
									<th>&nbsp&nbsp欠款方&nbsp&nbsp</th>
									<th>&nbsp&nbsp債主方&nbsp&nbsp</th>
								</tr>
								<!-- 大括號的上、下半部分 分別用 PHP 拆開 ，這樣中間就可以純用HTML語法-->
								<?php
									if(mysqli_num_rows($query_run) > 0)
									{
										foreach($query_run as $row)
										{
											if($row['debtor'] == $username){
												$idname=$row['creditor'];
											}
											else if($row['creditor'] == $username){
												$idname=$row['debtor'];
											}
											$nnquery= "SELECT nickname FROM contacts WHERE object= '$idname' and username='$username'";
											$nn = mysqli_query($conn,$nnquery);
											foreach($nn as $nnrow){
												if($row['debtor'] == $username){
													$dt=$username;
													$cdt=$nnrow['nickname'];
												}
												else if($row['creditor'] == $username){
													$dt=$nnrow['nickname'];
													$cdt=$username;
												}
								?>
								<tr>
									<!-- $row['(輸入資料表的欄位名稱)'];  <<用雙引號也行 -->
									<td><?php echo $dt; ?></td>
									<td><?php echo $cdt; ?></td>
									<td id="mny_color"><?php echo $row['money']; ?></td> 
									<td><?php echo $row['notes']; ?></td>
									<td class="loan_cdt_color"><?php echo $row['created_at']; ?></td> 
									<?php
										if($row['ct_state'] == "待確認" && $cdt==$username ) 
										{	
											?>
											<td class="loan_cdt_color"><?php echo $row['dt_state']; ?></td>
											<td><form action="change_state_ck.php" method="post">
													<input type="hidden" name="hidden_id" value=<?php echo $row['id']; ?>>	
													<input class="changebtn" type="submit" name="send" value=<?php echo $row['ct_state']; ?>>
												</form>
											</td>
											<?php
										}
										else if($row['dt_state'] == "待確認" && $dt==$username)
										{	
											?>
											
											<td><form action="change_state_ck.php" method="post">
													<input type="hidden" name="hidden_id" value=<?php echo $row['id']; ?>>
													<input class="changebtn" type="submit" name="send" value=<?php echo $row['dt_state']; ?>>
												</form>
											</td>
											<td class="loan_cdt_color"><?php echo $row['ct_state']; ?></td>
											<?php
										}
										else
										{ 
											?>
											<td class="loan_cdt_color"><?php echo $row['dt_state']; ?></td>
											<td class="loan_cdt_color"><?php echo $row['ct_state']; ?></td>
											<?php
										}
									?>
								</tr>
								<?php
											}
										}
									}
								?>
							</table>
						</div>
					</div>
					<div class="page">	
						<div id="finish" class="tabcontent">
						<table>
								<?php
									$query = "SELECT * FROM record WHERE (creditor='$username' and ct_state='已完成') or (debtor= '$username' and ct_state='已完成') and (dt_state='已完成'and ct_state='已完成')"; //搜尋 *(全部欄位) ，從 表
									$query_run = mysqli_query($conn,$query); //$conn <<此變數來自引入的 db_cn.php
									
								?>
								<tr>
									<th>欠款人</th>
									<th>債主</th>
									<th>金額</th>
									<th>備註</th>
									<th>新增日期</th>
									<th>&nbsp&nbsp狀態&nbsp&nbsp</th>
								</tr>
								<!-- 大括號的上、下半部分 分別用 PHP 拆開 ，這樣中間就可以純用HTML語法-->
								<?php
									if(mysqli_num_rows($query_run) > 0)
									{
										foreach($query_run as $row)
										{
											if($row['debtor'] == $username){
												$idname=$row['creditor'];
											}
											else if($row['creditor'] == $username){
												$idname=$row['debtor'];
											}
											$nnquery= "SELECT nickname FROM contacts WHERE object= '$idname' and username='$username'";
											$nn = mysqli_query($conn,$nnquery);
											foreach($nn as $nnrow){
												if($row['debtor'] == $username){
													$dt=$username;
													$cdt=$nnrow['nickname'];
												}
												else if($row['creditor'] == $username){
													$dt=$nnrow['nickname'];
													$cdt=$username;
												}
								?>
								<tr>
									<!-- $row['(輸入資料表的欄位名稱)'];  <<用雙引號也行 -->
									<td><?php echo $dt; ?></td>
									<td><?php echo $cdt; ?></td>
									<td id="mny_color"><?php echo $row['money']; ?></td> 
									<td><?php echo $row['notes']; ?></td>
									<td class="loan_cdt_color"><?php echo $row['created_at']; ?></td> 
									<td class="cg_color"><?php echo $row['ct_state']; ?></td>  
								</tr>
								<?php
											}
										}
									}
								?>
							</table>
						</div>
					</div>
					<div class="page">
						<?php
							$query = "SELECT nickname, object FROM contacts WHERE username= '$username'"; //搜尋 *(全部欄位) ，從 表

							$query_run = mysqli_query($conn,$query); //$con <<此變數來自引入的 db_cn.php
						?>	
						<div id="newloan" class="tabcontent">
							<p class=rcdtext>借出</p>
							<form action="addloanrecord.php" method="post" onsubmit="return validateForm()">  <!--連結php-->
								<div class="inputContainer2">
									<select name="ct">
										<?php
											if(mysqli_num_rows($query_run) > 0)
											{
												foreach($query_run as $row)
												{
										?>
											<option value=<?php echo $row['nickname'] ?>>&nbsp&nbsp<?php echo $row['nickname']; ?>&nbsp&nbsp</option>
										<?php
												}
											}
											else{
										?>
											<option value=""></option>
										<?php
											}
										?>
									</select>
								</div>
								<div class="inputContainer1">
									<label for="" class="label1">
										<svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
											<path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
										</svg>
										
									</label>
									<input name="mny" type="text" class="input" maxlength="15" placeholder="" required>
								</div>
								<div class="inputContainer">
									<label for="" class="label2">
										<svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
											<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
										</svg>
									</label>
									<input name="nt" type="text" class="input2" maxlength="15" placeholder="備註">
									<div class="Btn" style="position: relative;">
										<input type="submit" class="submitBtn" value="新增">
									</div>
								</div>	
							</form> 
						</div>
					</div>
					<div class="page">
						<?php
							$query = "SELECT nickname, object FROM contacts WHERE username= '$username'"; //搜尋 *(全部欄位) ，從 表

							$query_run = mysqli_query($conn,$query); //$con <<此變數來自引入的 db_cn.php
						?>	
						<div id="newOutstanding" class="tabcontent">
							<p class=rcdtext>欠款</p>
							<form action="addoutstandingrecord.php" method="post" onsubmit="return validateForm()">  <!--連結php-->
								<div class="inputContainer2">
									<select name="dt">
										<?php
											if(mysqli_num_rows($query_run) > 0)
											{
												foreach($query_run as $row)
												{
										?>
											<option value=<?php echo $row['nickname'] ?>>&nbsp&nbsp<?php echo $row['nickname']; ?>&nbsp&nbsp</option>
										<?php
												}
											}
											else{
										?>
											<option value=""></option>
										<?php
											}
										?>
									</select>
								</div>
								<div class="inputContainer1">
									<label for="" class="label1">
										<svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
											<path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
										</svg>
										
									</label>
									<input name="mny" type="text" class="input" maxlength="15" placeholder="" required>
								</div>
								<div class="inputContainer">
									<label for="" class="label2">
										<svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
											<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
										</svg>
									</label>
									<input name="nt" type="text" class="input2" maxlength="15" placeholder="備註">
									<div class="Btn" style="position: relative;">
										<input type="submit" class="submitBtn" value="新增">
									</div>
								</div>	
							</form> 
						</div>
					</div>
					<script src="scripts/tab.js"></script>
				</div>  
			</div>
		</div>
		<?php require_once "../ff/navmenu/footer.php" ?>
	</body>
</html>