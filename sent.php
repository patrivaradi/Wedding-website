<?php
 if($_SERVER["REQUEST_METHOD"]=="POST"){
        include "db_connection.php";
        $name =mysqli_real_escape_string($con,$_POST['name']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        
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