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
        $query = "SELECT * FROM `rsvp` WHERE `name`='$name' AND `email`='$email'";
        $result=$con->query($query);
        
        if($result){
            if(mysqli_num_rows($result) > 0){
            // Data already exists in database
                echo 'exists';
            } else {
                echo 'go';
            }	
        }
    mysqli_close($con);
 }
 ?>