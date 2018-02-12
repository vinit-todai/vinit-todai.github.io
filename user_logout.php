<?php
//logout.php
session_start();
session_destroy();
$_SESSION['logged_user'] = false;
echo "User logout success";
header("location: Home Page.php");
?>