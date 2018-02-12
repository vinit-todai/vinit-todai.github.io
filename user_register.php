<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysqli_select_db($con,"online_food");




$sql = "INSERT INTO username VALUES ('$_POST[name]','$_POST[mobile]','$_POST[username1]','$_POST[password]','')";





if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";

    


//$result = mysqli_query($con,"SELECT * FROM username");
//
//echo "<table border='1'>
//<tr>
//<th>Menu Id</th>
//<th>Item Name</th>
//<th>Item Category</th>
//<th>Food Id</th>
//<th>Price</th>
//
//</tr>";
//
//while($row = mysqli_fetch_array($result))
//  {
//  echo "<tr>";
//  echo "<td>" . $row['menu_id'] . "</td>";
//  echo "<td>" . $row['item_name'] . "</td>";
//  echo "<td>" . $row['item_category'] . "</td>";
//  echo "<td>" . $row['food_id'] . "</td>";
//  echo "<td>" . $row['price'] . "</td>";
//
//  echo "</tr>";
//  }
//echo "</table>";

mysqli_close($con);
?>

<html>
    
    
<body>
    
<h2><a href = "Home Page.html">Home</a></h2>
</body>
</html>