<?php 
	echo '<br><div class="form">		
    <form method="post" action="">
		<table width=100%>	
        <tr>
            <td width=20%><label>Họ tên *:</td>
            <td><input type="text" id="emailname" style="width: 80%"></input></td>
       
        </tr>
        <tr>
            <td>Email *:</td>
            <td><input type="text" id="memail" style="width: 80%"></input></td>
       
        </tr>
        <tr>
            <td>Số điện thoại *:</td>
            <td><input type="text" id="mphone" style="width: 80%"></input></td>
       
        </tr>
		<tr>
            <td>Tiêu đề *:</td>
            <td><input type="text" id="mtitle" style="width: 80%"></input></td>
       
        </tr>
       </table>
        <div class="input-box">
            <label>Nội dung Email:</label><br><br><textarea id="mcontent" cols=70 rows=10/>';
           
       
        echo '</div>
        <div class="submit">
            <input type="button" class="sendmail" onclick="return sendmail();" value="Gửi mail">
        </div>
    </form>
	
    </div>
	<div id="sending">
        </div>';
?>