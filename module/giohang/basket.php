<?php
                        if(isset($_POST['iddel']) && ($_POST['iddel'] != ''))
                        {
                            $id = $_POST['iddel'];
    						echo $id;
                            for($i = 0; $i < count($_SESSION['giohang']);$i++)
    						{

    							if ($_SESSION['giohang'][$i]["id"] == $id)
    							{
    								$_SESSION['giohang'][$i]["id"] == NULL;

    							}
    						}


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
    										$code = $code .'<li>'.$row[1].'('.$sl.')<a href="" title="'.$id.'"class="delgiohang">[Xóa]</a></li>';
    									}
    								}

    							}
    						}

    						$code = $code . "</ul>";
    						echo $code;

					   }
?>
