
 <?php 
session_start();
//$_SESSION['location']="--=---";
//echo "initial loc is ";
//echo $_SESSION['location']; 
?>

<!--<!DOCTYPE html>-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    
    <style>
.w3-tangerine {
  font-family: 'Tangerine', serif;
}
body {
       background-image: url("blaah.jpg");
	       background-repeat: no-repeat;
		       background-size: 100%;


}
h3{color:white;}
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #ffc266;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  width: 170px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
    
    
</head>
<body>
   <div class="w3-bar w3-xlarge w3-red w3-opacity w3-hover-opacity-off w3-tangerine" id="myNavbar">
    <a href="Home Page.php" class="w3-bar-item w3-button w3-xxlarge w3-hover-grey">Home</a>
	
    <a href="hotels_list.php" class="w3-bar-item w3-button w3-xxlarge w3-hover-grey">Search Hotels</a>
     
      <a href="user_logout.php" class="w3-bar-item w3-button w3-xxlarge w3-hover-grey">Logout</a>
  </div>

<div>
<!--  <h1 style="background-color:orange ;text-align:center;">Menu according to locations</h1>-->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="delhi.jpg" alt="Delhi" style=" background-size: contain;
  width: 100vw;
  height: 100vh; width:100%;">
        <div class="carousel-caption">



<form method="post" action="index.php">
    <button type="submit" name="location" value="delhi";><span style="color:blue;">Delhi</span></button>
<!--    $_SESSION['location']="delhi";-->
</form>
   
        </div>
      </div>

      <div class="item">
        <img src="marine-drive.jpg" alt="Mumbai" style=" background-size: contain;
  width: 100vw;
  height: 100vh; width:100%;">
        <div class="carousel-caption">

        <form method="post" action="index.php">
    <button type="submit" name="location" value="mumbai"><span style="color:blue;">Mumbai</span></button>
<!--           $_SESSION['location']="mumbai"; -->
</form>
        </div>
      </div>
    
      <div class="item">
        <img src="download.jpg" alt="Bangalore" style=" background-size: contain;
  width: 100vw;
  height: 100vh; width:100%;">
        <div class="carousel-caption">

    <form method="post" action="index.php">
    <button type="submit" name="location" value="banglore"><span style="color:blue;">Banglore</span></button>
       
<!--   php $_SESSION['location']="bangl";     -->
</form>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>

