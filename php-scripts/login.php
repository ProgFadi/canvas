<?php
session_start();
// receive data posted from form
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if(isset($_POST['username']) && isset($_POST['password']))
   {
       $username = $_POST['username'];
       $password =  $_POST['password'];
       
       // validation
       if(!$username || strlen($username) < 4 || !$password || strlen($password) < 4)
       {
           // problem inputs
           echo "<h1>Username and password length must be at least 4 chrs.</h1>";
       }
       else{
           // auth
           // check data in db
           $query = "SELECT * FROM painters WHERE username='".$username."' AND password='".$password."' LIMIT 0,1";
           // open con
      
           require_once "../php-scripts/dbCon.php";
           //    $con = mysqli_connect("localhost","root","","canvas");
           if($con)
           {
              $results =  mysqli_query($con,$query);
              $list = $results->fetch_all(MYSQLI_ASSOC);
              if(!$list || count($list) != 1)
              {
                  echo "<h1>Invalid credentials</h1>";
              }
              else{
                  // ok, user is authorized in db
                  $_SESSION['username'] = $username;
                  $_SESSION['user_id'] = $list[0]['id'];

                  header("location:../painter_panel.php");
              }
           }
           else{
               echo "<h1>Error in connecting with DB</h1>";
           }
        }
   }
   else{
       echo "<h1>Not valid inputs</h1>";
   }
}
else{
    echo "false";
}
// open connection to database
// select where username = and password = 
// redirect to management page
?>