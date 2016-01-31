<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ỐNG GIÓ PHƯƠNG NAM</title>
<link rel="stylesheet" href="style.css" />
 <link rel="stylesheet" type="text/css" href="preview.css"/>
	<link rel="stylesheet" type="text/css" href="wt-rotator.css"/>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.wt-rotator.min.js"></script>
	<script type="text/javascript" src="js/preview.js"></script>
	<script type="text/javascript" src="js/sliding_effect.js"></script>
    <script type="text/javascript" src="js/action.js"></script>
</head>
<body>
	<?php
		include ("connect.php");
		include "cutstr.php";
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		session_start();
        //ob_start();
	?>
    <div id="wrapall">
   		 <div id="main">
            <div id= "banner">
                <div class="panel">
                <div class="container">
                    <div class="wt-rotator">
                        <a href="#"></a>            
                        <div class="desc"></div>
                        <div class="preloader"></div>
                        <div class="c-panel">
                            <div class="buttons">
                                <div class="prev-btn"></div>
                                <div class="play-btn"></div>    
                                <div class="next-btn"></div>               
                            </div>
                            <div class="thumbnails">
                                <ul>
                                    <li>
                                        <a href="images/1.png" ></a>                                                      
                                    </li>                                                                      
                                    <li>
                                        <a href="images/2.png" ></a>                                                             	
                                    </li>
                                                                                                                                                     
                                </ul>
                            </div>     
                        </div>
                </div>	
                </div>
            </div>
            
            </div>           
            
            <div id="horizonmenu">
            	<ul class="menu">

                    <li><a href="" id="home_btn">TRANG CHỦ</a></li>
                    <li><a href="" id="about_btn">GIỚI THIỆU</a></li>
                    <li><a href="">SẢN PHẨM</a>
                
                        <ul>	
								<?php
							  		include "menu.php";
								?>
                        </ul>
                
                    </li>
                   <li><a href="" id="contractor_btn">CÔNG TRÌNH</a></li>
                   <li><a href="" id="library_btn">THƯ VIỆN</a></li>
                   <li><a href="" id="contac_btn">LIÊN HỆ</a></li>
                </ul>
            
            </div>
            
                       
                
            
            <div class="content">
            	
                <div class="leftcol">
                	<?php
                   		$queryleft = mysql_query("select * from module where mcolumnindex=1"); 
						$rownumleft = mysql_num_rows($queryleft);
						
						for($i=1;$i<=$rownumleft;$i++)
						{	
							$query = mysql_query("select * from module where mcolumnindex=1 and mpriority=".$i); 
							$row=mysql_fetch_array($query);
							if($row[6] != 0){
								$code = '<div id="'.$row['mid'].'" class="'.$row['mclass'].'" ><div class="tieude">'.$row['mname'].'</div>';
								echo $code;
								include "module/".$row['msource'];
								echo "</div>";								
							}
							
						
						}
						
					?>
                	
                
                
                		

           		</div>
                <div class="centercol">                	
                    <div id="catediv" ></div>
					<div id="aboutdiv"></div>
					<div id="contactdiv"></div>
                    <div id="searchdiv"></div>
                    <div id="productdiv"></div>
                    <div id="contractordiv"></div>
                    <div id="newdiv">
                        <div class="tieude">Sản phẩm mới</div>
                            <?php
                            $query1 = mysql_query("select * from sanpham");
                            $rownum1 = mysql_num_rows($query1);
                            if($rownum1 == 0)
                            {
                                echo "Chưa có dữ liệu";
                            }

                            $i=0;
							$sobanghi = 12;
							$soluongtrang = 5;
							$sotrang = ceil($rownum1/$sobanghi);							
							$trang = @$_REQUEST["p"];
							if (!isset($trang)) $trang = 1;
							if ($trang>$sotrang) $trang = $sotrang;	
							
							$sql='select * from sanpham limit '.($trang-1)*$sobanghi.','.$sobanghi;
							$query = mysql_query($sql);
                            $rownum = mysql_num_rows($query);
							
                            while($row=mysql_fetch_array($query))
                            {

                                $i++;
                                if(strlen($row[1])<=40){
									$namestr = $row[1].'<br />';
								
								} else $namestr = cut_title($row[1],40);
								
                                echo '<div class="tablesp"><center><a onclick="return product_click('."'".$row[0]."'".');" href="" name="'.$row[0].'"><img src="'.$row[5].'"</img></a><br><br><b>'.$namestr.'</b>'/*.'</br >Mã sp: '.$row['sid'].'<br>Giá: '.$row[4].'<br /><input type="button" value="Chọn Mua" class="buy" onclick="return buy_click(this);" title="'.$row[0].'" />'.*/.'</center></div>';
                                if($i==4)
                                {    
									echo '<br >';                               
									
                                    $i=0;
                                }


                            }
							echo '<br >'; 
							$back = $trang -1;
							if	($back<1){
							
								$back=1;
							}
							
							$next =$trang +1;
							if($next>$sotrang){
								$next = $sotrang;
							}
							
							echo '<br><br><div id="pagelink"><br><div id = "back"><a  href=?p='.$back.'>Back </a></div>';
							
							
							$dvi = floor($soluongtrang/2);
							
							
							$dau=$trang-$dvi;
							
							$cuoi=$trang + $soluongtrang-$dvi-1;
							$giua=$trang;
														
							if	($dau<=0){
								
								
								$dau=1;
								$cuoi=$soluongtrang;
								
							}
							if	($cuoi<$soluongtrang){
							
								$dau=1;
								$cuoi=$soluongtrang;						
							} 
								if	($cuoi>$sotrang){
								
									$dau=$sotrang-$soluongtrang;
									if	($dau<=0){
								
										
										$dau=1;
										
									}
									$cuoi=$sotrang;							
								} 
							
							$bacham="...";
							if($dau>1){
								echo $bacham;
							}
							for ($i=$dau;$i<=$cuoi;$i++){
								
								//if ($i == $trang) echo "<b><font color=red >  $i  </font></b>";
								//else 
									echo "<div class ='page' name={$i}><a href=?p={$i}>  {$i}  </a></div>";
									
							
							}
							if($cuoi<$sotrang){
								echo $bacham;
							}
							echo '<div id = "next" href=?p='.$next.'><a href=?p='.$next.'> Next</a></div></div>';
                            ?>
                            

                	</div>
                </div>

                <div class="rightcol">
                	<?php
                   		$queryright = mysql_query("select * from module where mcolumnindex=3"); 
						$rownumright = mysql_num_rows($queryright);
						
						for($i=1;$i<=$rownumright;$i++)
						{	
							$query = mysql_query("select * from module where mcolumnindex=3 and mpriority=".$i); 
							$row=mysql_fetch_array($query);
							if($row[6] != 0){
								$code = '<div id="'.$row['mid'].'" class="'.$row['mclass'].'" ><div class="tieude">'.$row['mname'].'</div>';
								echo $code;
								include "module/".$row['msource'];
								echo "</div>";
							}
						}
						
					?>
                	
                   
                
                </div>

            </div>
            <div id="footer" class="module">
                <?php 
			   	include "footer.php";
			   
			   ?>
            
            </div>
	</div>
    </div>
</body>
</html>
