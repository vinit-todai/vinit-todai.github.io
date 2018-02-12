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

          $sql = "SELECT user_id FROM restraunt_user WHERE username = '$myusername' and password = '$mypassword'";

//        $sql1 = "SELECT user_id FROM restraunt_user WHERE username = '$myusername' and password = '$mypassword'";
          $result = mysqli_query($con,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_NUM);
          $active = $row['active'];

          $count = mysqli_num_rows($result);

          // If result matched $myusername and $mypassword, table row must be 1 row

          if($count == 1) 
          {
            
             $_SESSION['login_restraunt'] = $myusername;
             $_SESSION['logged_restraunt'] = true;
             $_SESSION['restraunt_id'] = $row[0];


             header("location: welcome_restraunt.php");
          }

        else 
        {
             $error = "Your Login Name or Password is invalid";
            echo 'Your Login Name or Password is invalid';
        }

    ?>