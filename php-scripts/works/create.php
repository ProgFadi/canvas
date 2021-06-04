
<?php
// first: auth process
session_start();
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];

$target_dir = "../../assets/images/works/";
if(!$username || !$user_id)
{
    header("location:../assets/login.html");
}

// validation inputs
if(isset($_POST['title']) && isset($_POST['art_type']) && isset($_POST['spent_time']) && isset($_FILES['work_image']))
{ 
    // open con to DB
    require_once "../dbCon.php";
    if($con)
    {
     // ok, continue
     // receive inputs
     $title = htmlspecialchars(trim($_POST['title']));
     $art_type = htmlspecialchars(trim($_POST['art_type']));
     $spent_time = htmlspecialchars(trim($_POST['spent_time']));
     $work_image = htmlspecialchars(trim($_FILES['work_image']['name']));
     $descr = htmlspecialchars(trim($_POST['descr']));
     $publish_date = time();
     $image_name = $_FILES['work_image']['name'];
     $image_name = $user_id.'_'.$publish_date.'.'.pathinfo($image_name, PATHINFO_EXTENSION);
    //  prepare query to add new info to the works database
     $q = "INSERT INTO works(painter_id,art_type,publish_date,spent_time,title,descr,image_name)VALUES($user_id,'$art_type','$publish_date','$spent_time','$title','$descr','$image_name')";

     $isOk = mysqli_query($con,$q);
     if($isOk)
     {
         // if work info added successfully, then move picture from temp loation to permenant location
         $path = $target_dir.$image_name;
         if (move_uploaded_file($_FILES["work_image"]["tmp_name"], $path)) {
            header('location:../../painter_panel.php');
           } else {
             echo "Sorry, there was an error uploading your file.";
           }
     }
     else{
         echo '<h1>Cannot add new data!, try again</h1>';
     }
  
    }
    else{
        echo "<h1>Something went wrong, try again</h1>";
    }
    
}
else{
    echo "<h1>Invalid Inputs</h1>";
}
?>