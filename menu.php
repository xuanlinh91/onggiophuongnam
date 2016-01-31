<?php                              
								$query = mysql_query("select * from category where cparent='0' order by priority asc");
                                $rownum = mysql_num_rows($query);
                                if ($rownum <= 0)
                                {
                                    echo 'Chưa có dữ liệu';
                                } else
                                {
                                    while ($row = mysql_fetch_array($query))
                                    {
                                        echo '<li class="sliding-element"><a href="" onclick="return cateselect('."'".$row['cid']."'".');" name="'.$row['cid'].'">'.$row['cname'].'</a>';
										
										$sql = "select * from category where cparent ='".$row['cid']."'";
										$query2 = mysql_query($sql);
										$rownum2 = mysql_num_rows($query2);
										if ($rownum > 0)
										{
											echo '<ul>';
											while ($row = mysql_fetch_array($query2))
											{
												echo '<li class="sliding-element"><a href="" onclick="return cateselect('."'".$row['cid']."'".');" name="'.$row['cid'].'">'.$row['cname'].'</a></li>';							
												
											}
											echo '</ul>';
											
										} 
										
										echo '</li>';
                                    }
                                }
                                ?>      