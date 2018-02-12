    <?php

       session_start();

    $con = mysqli_connect("localhost","root","");
    if (!$con)
      {
      die('Could not connect: ' . mysql_error());
      }

    $db=mysqli_select_db($con,"online_food");





          $myusername = $_POST['username'];
          $mypassword = $_POST['password']; 

          $sql = "SELECT user_id FROM username WHERE username = '$myusername' and password = '$mypassword'";
          $result = mysqli_query($con,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_NUM);
//          $active = $row['active'];

          $count = mysqli_num_rows($result);

          // If result matched $myusername and $mypassword, table row must be 1 row

          if($count == 1) {
            
             $_SESSION['login_user'] = $myusername;
             $_SESSION['logged_user'] = true;
             $_SESSION['user_id'] = $row[0];

             header("location: welcome_user.php");
          }else {
             $error = "Your Login Name or Password is invalid";
          }

    ?>