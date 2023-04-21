<?php   
   if($_SERVER["REQUEST_METHOD"]=="POST"){               
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "wedding-website";

    $con = new mysqli($host,$user,$pass,$db);
    if (!$con){
        echo  "Error connecting to the database.";
    }
    $name =mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $number = mysqli_real_escape_string($con,$_POST['number']);
    $message = mysqli_real_escape_string($con,$_POST['message']);

    $qry = "UPDATE `rsvp` SET `attends`='$number',`message`='$message' WHERE `name`='$name' AND `email`='$email'";
    $insert = mysqli_query($con,$qry);
    if(!$insert){
        echo "There are some problems";
    }else{
        header('location:index.php#rsvp-section');
    } 
    mysqli_close($con);
}
?>