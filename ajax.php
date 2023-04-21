<?php
$nameErr = $emailErr = $numberErr ="";
   $name = $email =$number="";
   $errors = '';
   
   
   
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
    $qry = "INSERT INTO `rsvp`(`name`, `email`, `attends`,`message`) VALUES ('$name','$email','$number','$message')";
    $insert = mysqli_query($con,$qry);
    if(!$insert){
        echo "There are some problems";
    }else{
        echo "<span>DAta in</span>";
        //header('location:index.php#rsvp-section');
    } 
    mysqli_close($con);
}

?>