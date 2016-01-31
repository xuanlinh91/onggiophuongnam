<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop nh?c c? online</title>
<link rel="stylesheet" href="style.css" />
 <link rel="stylesheet" type="text/css" href="preview.css"/>
	<link rel="stylesheet" type="text/css" href="wt-rotator.css"/>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.wt-rotator.min.js"></script>
	<script type="text/javascript" src="js/preview.js"></script>
	<script type="text/javascript" src="js/sliding_effect.js"></script>
    <script type="text/javascript" src="js/action.js"></script>
</head>
<body><center><img src="images/loading.gif" /></center>
<?php	
	ob_start();
	include ("connect.php");	
	session_start();
	$username = addslashes($_POST['myusername']);  
	$password = addslashes($_POST['mypassword']);  
	$sql="select * from admin where acc='".$username."' and pass='".md5(md5($password))."'";
	$query = mysql_query($sql);
	$count=mysql_num_rows($query); 
		
		if ($count==1) 
		{
		
		$_SESSION['db_is_logged_in']= true;
		$_SESSION['user']= $_POST['myusername'];
		header('Location: redirect.php');
		} 
		else 
		{		
			
				header('Location: login.php');
	    }
 
	ob_flush();
?>
</body>
</html>