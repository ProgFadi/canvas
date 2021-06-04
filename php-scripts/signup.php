<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    if(isset($_POST['full_name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_conf'])
    && isset($_POST['birth']) && isset($_FILES['painter_image']))
    {
      
       $target_dir = "../assets/images/painters/";
       $fullName = $_POST['full_name'];
       $username = $_POST['username'];
       $password = $_POST['password'];
       $password_conf = $_POST['password_conf'];
       $artType = $_POST['art_types'];
       $experience = $_POST['experience'];
       $birth = $_POST['birth'];
       $image_name = $_FILES['painter_image']['name'];
       $image_name2 = time().'_'.$username.'.'.pathinfo($image_name, PATHINFO_EXTENSION);
       
       // validate inputs
       if(strlen($fullName) < 4 || strlen($username) < 4 || strlen($password) < 4 || strlen($password_conf) < 4) 
       {
           echo "<h1>Invalid inputs 2</h1>";
       }
       if($password !== $password_conf)
       {
           echo "<h1>Passwords mismatched!</h1>";
       }
       $isImage = getimagesize($_FILES["painter_image"]["tmp_name"]);
       if(!$isImage)
       {
           echo "<h1>Invalid inputs - image</h1>";
       }
       // check if username is already booked in  db
       $q = "SELECT * FROM painters where username='".$username."'";

       // insert
       // first: insert data to db
       require_once "./php_scripts/dbCon.php";

       $results = mysqli_query($con,$q);
       $list = $results->fetch_all(MYSQLI_ASSOC);
       if($list && count($list)>0)
       {
           echo "Sorry, entered username is already taken, Try another one";
       }
       $query = "INSERT INTO painters(full_name,username,password,birth,art_type,experience,image_name)values('".$fullName."','".$username."'
       ,'".$password."','".$birth."','".$artType."','".$experience."','".$image_name2."')";
       
       $isInserted = mysqli_query($con,$query);
       if($isInserted)
       {
           $path = $target_dir.$image_name2;
          // save image to the folder of painters
          if (move_uploaded_file($_FILES["painter_image"]["tmp_name"], $path)) {
           header("location:../login.html");
          } else {
            echo "Sorry, there was an error uploading your file.";
          }

       }
       else
       {
           echo "insertion failed";
       }
      

    }
    else{
        echo "<h1>Invalid inputs 1</h1>";
    }
}

?>