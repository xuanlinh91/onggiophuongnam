                    	<?php
                        $query = mysql_query("select * from sanpham order by sluotmua desc limit 5"); 
						$rownum = mysql_num_rows($query);
						if($rownum == 0)
						{
							echo "Lỗi dữ liệu";
						}

                        echo '<center><marquee onmouseover="this.stop()" direction = "up" onmouseout="this.start()" scrollAmount="2" width="150" height ="300" behavior="scroll">';
						while($row=mysql_fetch_array($query))
						{
							echo '<a name="'.$row[0].'" href="#" onclick="return product_click('."'".$row[0]."'".');"><div class="tablesp2"><img width=140px src="'.$row[5].'"</img></br >'.$row[1].'</br >'.$row[4].'</div></br ></a><br>';

						}
						echo '</marquee></center>';

						?>
