<html>
<head>
<style>
table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

 td {
    padding: 15px;
     background-color: orange;
     color: white;}
     tr:nth-child(2n+1) /* represents every odd row of an HTML table */ {
  background-color: green;
}

tr:nth-child(2n+0) /* represents every even row of an HTML table */ {
  background-color: pink;
}

   
}th{
      background-color: #4CAF50;
    color: white;}
</style>
</head>
<body>
    <?php
session_start(); // Right at the top of your script

$con = mysqli_connect("localhost","root","");
if(!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysqli_select_db($con,"online_food");




$sql="INSERT INTO menu 
VALUES
('{$_SESSION['restraunt_id']}','$_POST[item_name]','$_POST[item_category]','$_POST[food_id]','$_POST[price]')";






if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";




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
    </body>
</html>