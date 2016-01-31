<div id="searchform">                    		<form action="#" method="post">
								<input type="text" id="keyword"  value="" placeholder="Search"/>
                                <select id="catesearch" style="width: 150px">
                                	<?php
                                    $query = mysql_query("select * from category");
									$rownum = mysql_num_rows($query);
									if($rownum == 0)
									{
										echo "Chưa có dữ liệu";
									}

									while($row=mysql_fetch_array($query))
									{
										echo '<option value="'.$row[0].'">'.$row[1].'</option>';
									}
									?>
								</select>
                                <select id="costsearch" style="width: 150px">
									<option value="nho" selected>Nhỏ hơn</option>
									<option value="lon">Lớn hơn</option>
								</select>
								<select id="typesearch"style="width: 150px">
									<option value="ten" selected>Tên sản phẩm</option>
									<option value="ma">Mã sản phẩm</option>
									<option value="gia">Giá sản phẩm</option>
								</select>
								<br />
								<input id="search_btn" type="button" value="Tìm kiếm" />
						    </form>
                            
</div>