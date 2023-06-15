<?php   
if($_SERVER["REQUEST_METHOD"]=="POST"){               
    include "db_connection.php";
    $newpass =$_POST['pass1'];
    $newpass = strip_tags($newpass);
    $newpass = trim($newpass);
    $newpass = mysqli_real_escape_string($con,$newpass);
    $hashedPass = password_hash($newpass,PASSWORD_DEFAULT);

    $qry = "UPDATE `passwords` SET `pass`='$hashedPass' WHERE `name`='invited'";
    $insert = mysqli_query($con,$qry);
    if(!$insert){
        echo "There are some problems";
    }else{
        header('location:index.php');
    } 
    mysqli_close($con);
}
?>