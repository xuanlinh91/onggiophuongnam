<?php
	session_start();
	include ("connect.php");
	include "cutstr.php";
	function ingiohang()
	{
		if(isset($_SESSION['giohang']))
		{	
			$tongtien = 0;
			$code = '<div class="tieude">Giỏ hàng</div><ul>';
			for($i = 0; $i < count($_SESSION['giohang']);$i++)
			{

				if ($_SESSION['giohang'][$i]["id"] != NULL)
				{
					$id = $_SESSION['giohang'][$i]["id"];
					$sl = $_SESSION['giohang'][$i]["sl"];

					$query = mysql_query("select * from sanpham where sid = '".$id."'");
					$rownum = mysql_num_rows($query);
					if($rownum != 0)
					{
						while($row=mysql_fetch_array($query))
						{
							$tongtien = $tongtien + $row[4] * $sl;
							$code = $code .'<li>'.$row[1].'('.$sl.')<a href="index.php?iddel='.$id.'" title="'.$id.'"class="delgiohang" name="' . $id . '" onclick="return delgiohang(this);">[Xóa]</a></li>';

						}
					}
				}
			}
			if($tongtien==0){
				$code = $code.'</ul><p>Chưa có sản phẩm trong giỏ hàng, bạn click vào nút <b>Chọn mua</b> để thêm sản phẩm</p>';
			
			} 
			else
			{
				$code = $code . "</ul><br>Tổng chi phí: ". $tongtien.'<br>' ;
				$code = $code . '<center><input id="order_btn" value=" Order " type="button"></input></center>';
			
			}
			
			echo $code;
		}
	}

	if (isset($_POST['namebtn']) && !empty($_POST['namebtn']))
	{
		$namebtn = $_POST['namebtn'];
			if($namebtn=="Tìm kiếm")
			{
				$keyword=$_POST['keyword'];
				$typesearch ="sname";
				$cate = $_POST['catesearch'];
				
				if($_POST['costsearch'] == "lon"){
					$cost = ">";
				
				
				}
				if($_POST['costsearch'] == "nho"){
					$cost = "<";
				
				
				}
				if($_POST['typesearch'] == "ten"){
					$typesearch = "sname";
				
				
				
				}
				if ($_POST['typesearch'] == "ma"){
					$typesearch = "sid";
				
				
				
				}
				
				
				
				
				
				$sql="select * from sanpham where " .$typesearch." like '%".$keyword."%'";
				if ($_POST['typesearch'] == "gia"){
					$typesearch = "sgia";
					$sql="select * from sanpham where " .$typesearch." ".$cost." '".$keyword."' and scategory = '".$cate."'";
				
				
				}					
				$query=mysql_query($sql);
				
				$code = '<table border="0" id="tsanphammoi" align="center">';
				
									
											$i=0;
											while($row=mysql_fetch_array($query))
											{
												
													$i++;
													if($i==1)
													{
														$code =$code ."<tr>";
													}
													
														$code =$code . '<td width=160 heigh = 200><a href="sanpham.php?id='.$row[0].'"><div class="tablesp"><img width=150 src="'.$row[5].'"</img></br >'.$row[1].'</br >'.$row[4].'</div></br ></a><input type="button" value="Chọn Mua" class="buy" title="'.$row[0].'"></td>';													
														if($i==4)
														{	
															$code =$code . "</tr>";
															$i=0;
														}
														
												
											}
														 
														
								
								$code =$code ."</table>"; 
								echo $code;
					
			}
			else
			{
				echo "fail";
			}
	}
	if(isset($_POST['id']) AND $_POST['id']!=''){
        $id = $_POST['id'];
        $sl = $_POST['sl'];
		$check = "false";
		if(isset($_SESSION['giohang']))
		{
			for($i = 0; $i < count($_SESSION['giohang']);$i++)
			{

				if ($_SESSION['giohang'][$i]["id"] == $id)
				{

					$_SESSION['giohang'][$i]["sl"] = $_SESSION['giohang'][$i]["sl"] + $sl;
					ingiohang();
					return;
				}
			}
			if ($check !="true")
			{
				$j = count($_SESSION['giohang']);
				$_SESSION['giohang'][$j]["id"] = $id;
				$_SESSION['giohang'][$j]["sl"] = $sl;

			}

		}
		else
		{
			$_SESSION['giohang'][0]["id"] = $id;
			$_SESSION['giohang'][0]["sl"] = $sl;			

		
		
		
		}
		
		ingiohang();	
		
    }
	if(isset($_POST['iddel']) AND $_POST['iddel']!=''){
        $id = $_POST['iddel'];              
		$check = "false";
		if(isset($_SESSION['giohang']))
		{
			for($i = 0; $i < count($_SESSION['giohang']);$i++)
				{
				
					if ($_SESSION['giohang'][$i]["id"] == $id)
					{
						$_SESSION['giohang'][$i]["id"] == NULL;
												
					}
				}
			
			
		}				
		ingiohang();	
		
    }
	if(isset($_POST['hiengiohang']) AND $_POST['hiengiohang']!=''){
       
		if($_POST['hiengiohang'])
		{
			
			ingiohang();
			
		}				
		
    }
	if(isset($_POST['gioithieu']) AND $_POST['gioithieu']!=''){
       
		if($_POST['gioithieu'])
		{
			
			include "about.php";
			
		}				
		
    }
	if(isset($_POST['lienhe']) AND $_POST['lienhe']!=''){
       
		if($_POST['lienhe'])
		{
			
			include "contact.php";

			include "phpmailer/form.php";
    		
    
		}				
		
    }
	if(isset($_POST['congtrinh']) AND $_POST['congtrinh']!=''){
       
		if($_POST['congtrinh'])
		{
			
			include "contract.php";
		}				
		
    }
	if(isset($_POST['sendmail']) AND $_POST['sendmail']!=''){
       
		if($_POST['sendmail'])
		{
			
		
			//Nhúng thư viện phpmailer
			require_once('phpmailer/class.phpmailer.php');
			
			//Khởi tạo đối tượng
			$mail = new PHPMailer();
			
			/* Thông tin gửi mail */
			$mail->IsSMTP();                              // Gọi đến class xử lý SMTP
			$mail->Host       = "mail.google.com"; // SMTP server
			$mail->SMTPDebug  = 2;                   // Bật SMTP debug (cho việc kiểm tra lỗi)
			$mail->SMTPAuth   = true;                 // Sử dụng đăng nhập vào account
			$mail->SMTPSecure = "ssl";               // Phương thức mã hóa
			$mail->Host       = "smtp.gmail.com";     // Thiết lập thông tin của SMPT
			$mail->Port       = 465;                         // Thiết lập cổng gửi email của máy
			$mail->Username   = "xuanlinh91@gmail.com"; // SMTP account username
			$mail->Password   = "Amfcgemcgd123#";           // SMTP account password
			
			// Thông tin người gửi và Email người gửi
			$mail->SetFrom($_POST['email'],$_POST['hoten']);
			
			//Thiết lập thông tin người nhận
			$mail->AddAddress("thanhdoanh.mecontractor@gmail.com", "Site Administrator");
			
			// Thiết lập email nhận email hồi đáp nếu người nhận nhấn nút Reply
			
			$mail->AddReplyTo($_POST['email'],$_POST['hoten']);
			
			/* Nội dung Email */
			
			//Thiết lập tiêu đề
			$mail->Subject    = 'Thư từ '.$_POST['email'].': '.$_POST['tieude'];
			
			//Thiết lập định dạng font chữ
			$mail->CharSet = "utf-8";
			
			//Thiết lập nội dung chính của email
			$body = $_POST['noidung'];
			$mail->Body = $body;
			
			if($mail->Send())
			
			 
				{  
			
					  echo "success";
			
				}
						
    
		}				
		
    }

    if (isset($_POST['delete_product']) && !empty($_POST['delete_product']))
    {
    	for ($i = 0; $i < count($_SESSION['giohang']); $i++)
    	{
    		if ($_POST['delete_product'] == $_SESSION['giohang'][$i]['id'])
    		{
    			$_SESSION['giohang'][$i]['id'] = NULL;
    			ingiohang();
    			break;
    		}
    	}
	}
	if (isset($_POST['product']) && !empty($_POST['product']))
    {	
		if($_POST['product'])	
		{	
			$query = mysql_query("select * from sanpham where sid = '".$_POST['idproduct']."'");
			$row=mysql_fetch_array($query);
			$query2 = mysql_query("select * from category where cid = '".$row['scategory']."'");
			$row2=mysql_fetch_array($query2);
			$code = '<div class="tieude"><a href="" onclick="return sanpham_click();">Sản phẩm</a> - <a href="" name="'.$row2['cid'].'" onclick="return cateselect('."'".$row2['cid']."'".');">'.$row2['cname'].'</a> - '.$row['sid'].'</div>';
			$code = $code.'<br>Tên sản phẩm: '.$row['sname'].'<br>';
			//$code = $code.'<br>Mã sản phẩm: '.str_replace("\r\n","<br />", $row['sid']).'<br>';
			//$code = $code.'<br>Giá sản phẩm: '.$row['sgia'].'<br>';
			if($row['smota']=='' || $row['smota'] == NULL ){
				$textmota= '<br>Thông tin sản phẩm: Chưa có thông tin sản phẩm này!';
				} else $textmota ='<br>Thông tin sản phẩm:<br><center><img width=400px height=100% src="'.$row['smota'].'"/></center><br>';
			$code = $code.$textmota;		
			$code = $code.'<br><center><img src="'.$row['sanh'].'"/></center><br>';
						
			echo $code;
			
		}	
    	
	}
	if(isset($_POST['idcate']) AND $_POST['idcate']!=''){
       
		if($_POST['idcate'])
		{	
			$queryx = mysql_query("select * from category where cparent = '".$_POST['idcate']."'");
			$rownumx = mysql_num_rows($queryx);
			if($rownumx == 0)
			{
					$code="";
					$query = mysql_query("select * from category where cid = '".$_POST['idcate']."'");
					$rownum = mysql_num_rows($query);
					if($rownum != 0)
					{
						while($row=mysql_fetch_array($query))
						{
							
							$code = $code .'<div class="tieude">'.$row['cname'].'</div>';
							
							
		
						}
					}
					$query = mysql_query("select * from sanpham where scategory='".$_POST['idcate']."'");
					$rownum = mysql_num_rows($query);			
					$i=0;
					while($row=mysql_fetch_array($query))
					{
		 								$i++;
										if(strlen($row[1])<40){
											$namestr = $row[1].'<br />';
										
										} else $namestr = cut_title($row[1],40);
										
									   $code = $code .  '<div class="tablesp"><center><a onclick="return product_click('."'".$row[0]."'".');" href="" name="'.$row[0].'"><img  src="'.$row[5].'"</img></a><b>'.$namestr.'</b>'/*.'</br >Mã sp: '.$row['sid'].'<br>Giá sản phẩm: '.$row[4].'<br /><input type="button" value="Chọn Mua" class="buy" onclick="return buy_click(this);" title="'.$row[0].'" />'*/.'</center></div>';
										if($i==4)
										{    
											$code = $code .  '<br >';                               
											
											$i=0;
										}
		
		
		
					}
					
					echo $code;
			}
			else 
			{
				$code="";
				$query = mysql_query("select * from category where cid = '".$_POST['idcate']."'");
				$row=mysql_fetch_array($query);
				$code = $code .'<div class="tieude">'.$row['cname'].'</div>';
				$i=0;
				while($rowx=mysql_fetch_array($queryx))
						{
							
							$query = mysql_query("select * from sanpham where scategory='".$rowx['cid']."'");
							$rownum = mysql_num_rows($query);
										
							while($row=mysql_fetch_array($query))
							{
												$i++;
												if(strlen($row[1])<25){
													$namestr = $row[1].'<br />';
												
												} else $namestr = cut_title($row[1],25);
												
											   $code = $code .  '<div class="tablesp"><a onclick="return product_click('."'".$row[0]."'".');" href="" name="'.$row[0].'"><img width=100% src="'.$row[5].'"</img></a><b>'.$namestr.'</b></br >Mã sp: '.$row['sid'].'<br>Giá sản phẩm: '.$row[4].'<br /><input type="button" value="Chọn Mua" class="buy" onclick="return buy_click(this);" title="'.$row[0].'" /></div>';
												if($i==4)
												{    
													$code = $code .  '<br >';                               
													
													$i=0;
												}
				
				
				
							}
							
							
						}
				echo $code;
			
			}		
		}				
		
    }
	
	
?>