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
        $pass =$_POST['pass'];
        $pass = strip_tags($pass);
        $pass = trim($pass);
        $pass = mysqli_real_escape_string($con,$pass);
        $query = "SELECT `pass` FROM `passwords` WHERE `name`='invited'";
        $result=$con->query($query);
        
        if($result){
            $row = $result -> fetch_assoc();
            $password =$row['pass'];
            if($password===$pass){
            // the password matches
            $_SESSION['loggedin'] = true;
            echo 'ok';
            } else {
                echo 'no';
            }	
        }
    mysqli_close($con);
 }
 ?>