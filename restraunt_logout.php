<?php
//logout.php
session_start();
session_destroy();
$_SESSION['logged_restraunt'] = false;
echo "Restraunt logout success";
header("location: Home Page.php");
?>