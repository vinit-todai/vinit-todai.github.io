

<html>
<head>
<title>Search</title>
</head>
<body>



    <form action="<?php echo htmlspecialchars($_SERVER[PHP_SELF]);?>" method="POST"> 
        <input type="text" name="query">
        <input type="submit" name="submit" value="Search" >
    </form>
	
	
	</body>
</html>
	
<?php
$search=$_POST["query"];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_connect_error());
  }

mysql_select_db("online_food",$con);

$result = mysql_query("SELECT * FROM menu where item_name='pizza');


mysql_close($con);

?>







<a class="sq_icon contrast add_to_cart" onclick="cart.add('1324');" data-tooltip="Add to Cart"><i class="fa fa-shopping-cart"></i></a>