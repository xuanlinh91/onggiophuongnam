<?php
ob_start(); 
session_start();
include("connect.php");
if (!isset($_SESSION['db_is_logged_in']) || $_SESSION['db_is_logged_in'] !== true) {

	header('Location: login.php');
    exit;
ob_end_flush();
}

?>
<script type="text/javascript" language="JavaScript1.2" src="images/stm31.js"></script>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin ABC cafe - 66 ngõ 40 Tạ Quang Bửu</title>
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
<link rel="icon" type="image/x-icon" href="favicon.ico" />
<script src="scripts/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="scripts/process.js" type="text/javascript"></script>
</head>

<body>
	<div id="notifi">
		<p>Chào đại ca, <b> <?php echo $_SESSION['user']; ?> </b>
		đại ca đang ở trang Admin
		<a href="index.php"><br>Trang chủ</a>    -     <a href="logout.php">Đăng "xuất" ?</a>
	</div>
	<div id="menumanage" >
		<a href="index.php" target="blank">Home</a>   -  <!--<a href="#"   onMouseOut="document.getElementById('tablemanage').style.visibility='hidden'; "  onMouseOver="document.getElementById('tablemanage').style.visibility='visible';"-->
		<a id ="addclip_lnk" href="#"   >
Thêm Clip</a>  -  <a id ="statistics_lnk" href="#"   >Thống kê</a>  -  <a id ="search_lnk" href="#"   >Tìm kiếm</a>
		
	</div>
	<div id="wrappermanage" height=100%>
		<div id="search" align="left" class="manageboard">
			<form action="" method="post">
				<table border=1 cellspacing=5 cellpadding=10>
									<tr>
									<td><input type="text" id="keyword" name="keyword"></td>
									<td><select id="typesearch" name="typesearch">
										<option value="ma" selected>Mã số clip</option>
										<option value="ten">Tên clip</option>
										
									</select>
									</td>
									
									<td><input type="button" id ="searchclip_btn" name="searchclip" value="Tìm kiếm"></td>
									</tr>
				</table>
			</form>
		</div>
		<div id="addclip" align="center" class="manageboard">
		<form name="form1" method="post" action="" >
		<table border=1 cellspacing=5 cellpadding=10>
			<tr>
				
				<td width=200 class="textleft">
				Mã số clip:		
				</td>
				<td >
					<input size=50 type="text" id="mso" name="mso" value="" ></input>
		
				</td>
			</tr>
			
			<tr>
				<td class="textleft">
					Tên clip:
				</td>
				<td>
				
							<input size=50 type="text" id="name" name="name" value=""></input>
						
				</td>
			</tr>
			
			<tr>
				<td class="textleft">
					Link youtube:
				</td>
				<td>
				
							<input size=50 type="text" id="link" name="link" value=""></input>
						
				</td>
			</tr>
			<tr>
				<td class="textleft">
					Description:
				</td>
				<td>
				
							<textarea rows="8" id="des" cols="40" name="des"></textarea>
						
				</td>
			</tr>
			
			
		</table>
		<br><br>
		<input size=20 type="button" id ="addclip_btn" name="addclip" value="Thêm">
		<input size=20 type="button" id ="clear_btn" name="clear" value="Clear">	
		</form>
		</div>
		<div id="editclip" align="center" class="manageboard">haha</div>
		<div id="statistics" align="center" class="manageboard">
		<form name="formstatistics" action="" method="post">
			<input size=20 type="button" id ="sua" name="sua" value="Sửa thông tin clip">		
			
			<input size=20 type="button" id ="xoa" name="xoa" value="Xóa clip" ></input>
			<br><br>
		<table border=1 cellspacing=1 cellpadding=5>
			
			<tr>
				<td class="textleft">
					Stt
				</td>
				<td class="textleft">
					Mã số
				</td>
				<td class="textleft">
					Hình ảnh
				</td>
				<td class="textleft">
					Tên clip
				</td>
				<td class="textleft">
					Mô tả
				</td><td class="textleft">
					Votes
				</td>
				<td class="textleft">
					Select
				</td>
				
				
			</tr>
			<?	
				
				$query = mysql_query("select * from sanpham");
							$rownum = mysql_num_rows($query);
								if($rownum == 0)
									{
										echo "Chưa có dữ liệu";
									}
				$i=0;
				while($row=mysql_fetch_array($query))
									{
												$i++;
												echo "<tr>";
											
												echo '<td class="textleft">'.$i.'</td>';
												echo '<td class="textleft">'.$row[0].'</td>';
												echo '<td class="textleft"><img width=150 src="http://img.youtube.com/vi/'.$row[1].'/0.jpg"</img></td>';
												echo '<td class="textleft"><a href="video.php?id=' .$row[0].'">'.$row[4].'</a></td>';
												echo '<td class="textleft">'.$row[2].'</td>';
												echo '<td class="textleft">'.$row[3].'</td>';
												echo '<td class="textleft"><input type="radio" name="select" value="'.$row[0].'"></input></td>';
												echo "</tr>";
													
										
									}
			
			?>
			
			
			
			
		</table>
		
		</form>
		</div>
	</div>
</body>
</html>