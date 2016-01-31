<?php
session_start();
if (isset($_SESSION['db_is_logged_in']))  {
   unset($_SESSION['db_is_logged_in']);
   
}

header('Location: login.php');
?>