<?php
 if($_SERVER["REQUEST_METHOD"]=="POST"){
        include "db_connection.php";
        $pass =$_POST['pass'];
        $pass = strip_tags($pass);
        $pass = trim($pass);
        $pass = mysqli_real_escape_string($con,$pass);
        $query = "SELECT `pass`,`id` FROM `passwords`";
        $result=$con->query($query);
        
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
            
                $db_pass =$row['pass'];
                $db_user=$row['id'];
                if(password_verify($pass,$db_pass)){
                // the password matches
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['id']=$db_user;
                echo 'ok';
                mysqli_close($con);
                exit;
                }
            } 
            echo 'no';
        }
            else {
                echo 'error';
            }	
        
        mysqli_close($con);
 }
 ?>