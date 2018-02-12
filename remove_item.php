<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysqli_select_db($con,"online_food");




//$sql="INSERT INTO menu 
//VALUES
//('$_POST[menu_id]','$_POST[item_name]','$_POST[item_category]','$_POST[food_id]','$_POST[price]')";
//
//
//

$sql="DELETE FROM menu WHERE item_name='$_POST[item_name]'";



if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record removed";




$result = mysqli_query($con,"SELECT * FROM menu");

echo "<table border='1'>
<tr>
<th>Menu Id</th>
<th>Item Name</th>
<th>Item Category</th>
<th>Food Id</th>
<th>Price</th>

</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['menu_id'] . "</td>";
  echo "<td>" . $row['item_name'] . "</td>";
  echo "<td>" . $row['item_category'] . "</td>";
  echo "<td>" . $row['food_id'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";

  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>