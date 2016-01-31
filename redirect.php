<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	session_start();

?>
<html>
<header>
	<link rel="stylesheet" href="style.css" />
	<meta http-equiv="refresh" content="5; url=admin.php" />
</header>

<body align="center">
	<div id="redirect"><font color=black align="center">

			<? 
				
				echo "Chào đại ca " .$_SESSION['user'];
			?>
			, sau 5 giây em sẽ chở đại ca đến trang admin ! </font></div>
</body>

</html>

