<?php
 if($_SERVER["REQUEST_METHOD"]=="POST"){
        include "db_connection.php";
        $pass =$_POST['pass'];
        $pass = strip_tags($pass);
        $pass = trim($pass);
        $pass = md5($pass);
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