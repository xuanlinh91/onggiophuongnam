<?php
$server = "localhost"; // host server
$username= "root"; // tên truy cập MySQL
$password = ""; // mật khảu truy cập MySQL
$connectserver = mysql_connect($server, $username, $password);
mysql_select_db("onggio");
mysql_set_charset('utf8',$connectserver);

if ( !$connectserver )
   {
      die("không nết nối được vào MySQL server"); //Thông báo không kết nối được
   }
?>
