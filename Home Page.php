
 <?php
session_start(); // Right at the top of your script
//session_unset(); 

?>


<!DOCTYPE html>
<html>
<title>The LOC</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
    background-repeat: no-repeat;
    background-size: cover;
    background-image: url("y4.jpg");
    min-height: 90%;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small" id="nav-placeholder">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="#" class="w3-bar-item w3-button">HOME</a>
    <a href="#menu" class="w3-bar-item w3-button">MENU</a>
    <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
	

      
      <?php

      
if(isset($_SESSION['logged_restraunt']))
    { 
            echo $_SESSION["login_restraunt"]; 
            echo '<a href="restraunt_logout.php" class="w3-bar-item w3-button"><span>Restraunt Logout</span></a></li>';
            echo '<a href="add_item.html" class="w3-bar-item w3-button">Add Item</a>';
			echo '<a href="remove_item.html" class="w3-bar-item w3-button">Remove Item</a>';

    }


      
            
else if(isset($_SESSION['logged_user']))
    { 
            echo $_SESSION["login_user"]; 
            echo '<a href="user_logout.php" class="w3-bar-item w3-button"><span>User Logout</span></a></li>';
            echo '<a href="hotels_list.php" class="w3-bar-item w3-button">Search Hotels</a>';
			//echo '<a href="remove_item.html" class="w3-bar-item w3-button">Remove Item</a>';

    }

      
else
    {
            echo '<a href="restraunt_login_form.html" class="w3-bar-item w3-button">Restraunt SignUp/Login</a>
    <a href="user_login_form.html" class="w3-bar-item w3-button">User Login/Registration</a>	';
    }

?>
      
      
	

  </div>
</div>
  
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-padding">
    <span class="w3-tag w3-xlarge">Open from 10am to 12pm</span>
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white w3-hide-small" style="font-size:100px">Lord of<br>Connoisseurs </span>
    <span class="w3-text-white w3-hide-large w3-hide-medium" style="font-size:60px"><b>Lord of<br>Connoisseurs</b></span>
    <p><a href="#menu" class="w3-button w3-xxlarge w3-black">Feeling Lucky ?</a></p>
  </div>
</header>

<!-- Menu Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
  <div class="w3-content">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">THE Lucky Luck menu</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pizza');" id="myLink">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Pizza</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Indian');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Indian</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Starter');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Soups and Starters</div>
      </a>
    </div>

    <div id="Pizza" class="w3-container menu w3-padding-32 w3-white">
      <h1><b></b>Margarita<span class="w3-right w3-tag w3-dark-grey w3-round">200</span></h1>
      <p class="w3-text-grey">Popular in The Chocolate room,Neopolitian,Joey's and 5 more</p>
      <hr>
   
      <h1><b>Quattro Formaggito</b> <span class="w3-right w3-tag w3-dark-grey w3-round">570</span></h1>
      <p class="w3-text-grey">Four cheeses (mozzarella, parmesan, pecorino, jarlsberg) because cheese didnt kill anyone.Available in Dominoes exclusive.</p>
      <hr>
      
      <h1><b>Chocolate pizza</b><span class="w3-tag w3-purple w3-round">Foodie recommends</span> <span class="w3-right w3-tag w3-dark-grey w3-round">317.00</span></h1>
      <p class="w3-text-grey">Chocolate or pizza..well let us have both like Joey Tribbiani likes.Available in Di bella , jimis burger and pizza and 7 more</p>
      <hr>

      <h1><b>Pineapple'o'clock</b> <span class="w3-right w3-tag w3-dark-grey w3-round">200</span></h1>
      <p class="w3-text-grey">Sweet and yellow , apples handsome brother on the most adorable thing of universe.Available in Hungry heads,The neo pizzeria and Joeys</p>
      <hr>

      <h1><b>Veggie delight</b> <span class="w3-tag w3-green w3-round">99% fat free</span><span class="w3-right w3-tag w3-dark-grey w3-round">200.00</span></h1>
      <p class="w3-text-grey">Too Fat...Too sluggish...well this goes wrong for this pizza as it is the fittest pizza ever. Available in Joeys.</p>
      <hr>

      <h1><b>Burger Pizza</b><span class="w3-right w3-tag w3-dark-grey w3-round">121.50</span></h1>
      <p class="w3-text-grey">burger ? pizza ?....It is Pirger</p>
    </div>

    <div id="Indian" class="w3-container menu w3-padding-32 w3-white">
      <h1><b>Vada Pav</b> <span class="w3-tag w3-yellow w3-round">Favourites</span> <span class="w3-right w3-tag w3-dark-grey w3-round">13</span></h1>
      <p class="w3-text-grey">A simple vada pav to quench your hunger of cheap thrills.Available in Kunj Vihar,Shiv Sagar and 5400 more places</p>
      <hr>
  
      <h1><b>Cheese burst dosa</b> <span class="w3-right w3-tag w3-dark-grey w3-round">225.50</span></h1>
      <p class="w3-text-grey">cheese cheese everywhere...the dish causes me to stare.Available in pure milk centre.</p>
    </div>


    <div id="Starter" class="w3-container menu w3-padding-32 w3-white">
      <h1><b>Today's Soup</b> <span class="w3-tag w3-grey w3-round">Seasonal</span><span class="w3-right w3-tag w3-dark-grey w3-round">$5.50</span></h1>
      <p class="w3-text-grey">Ask the waiter</p>
      <hr>
   
      <h1><b>Bruschetta</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$8.50</span></h1>
      <p class="w3-text-grey">Bread with pesto, tomatoes, onion, garlic</p>
      <hr>
      
      <h1><b>Garlic bread</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$9.50</span></h1>
      <p class="w3-text-grey">Grilled ciabatta, garlic butter, onions</p>
      <hr>
      
      <h1><b>Tomozzarella</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$10.50</span></h1>
      <p class="w3-text-grey">Tomatoes and mozzarella</p>
    </div><br>

  </div>
</div>

<!-- About Container -->
<div class="w3-container w3-padding-64 w3-red w3-grayscale w3-xlarge" id="about">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">About</h1>
    <p>The site is a one stop shop for all those who live to eat.We at The Lord of Connoisseurs assure that the visiotr will be hungry and entertained as well as satisfyied after seeing our site. Come and check out the sweetest pleasures in the world of a foodies.</p>
    <p>As per our motto,we declare the most famous restaurant of the month This months winners are :</p>
    <img src="The Chocolate Room.jpg" style="width:100%" class="w3-margin-top w3-margin-bottom" alt="The Chocolate room">  
  </div>
</div>

<!-- Contact (with google maps) -->
<!--
<div id="contact" class="w3-grayscale-max" style="width:100%;height:0px;"></div>

<div class="w3-container w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Contact</h1>
    <p>Register with us to start up with your journey to surf the best food accross the city</p>
    <p><span class="w3-tag">FYI!</span>Its the greeatest thing you can do for free after the Jio's data plan</p>
    <p class="w3-xxlarge"><strong>Contact details:</strong> Rest assured.We wont spill the secret out and your data is confidential with us</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="Mobile No" required name="Number"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email-id" required name="Email"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Password" required name="Password"></p>
      <p><button class="w3-button w3-light-grey w3-block" type="submit">LOC doesnt share food!</button></p>
        
       <br/> 
        <br>
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Login</h1>
        <br>
        
        
    </form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Username" required name="Userame"></p>
      
      <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="LoginPassword" required name="LoginPassword"></p>
      
      <p><button class="w3-button w3-light-grey w3-block" type="submit">Login!!</button></p>

      <form>
      
      </form>
  </div>
</div>
-->

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-48 w3-xxlarge">
  <p> May the food be with you! </p>
</footer>

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>
