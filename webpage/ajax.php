<?php
$nameErr = $emailErr = $numberErr ="";
   $name = $email =$number="";
   $errors = '';
   
   if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "db_connection.php";
    $name =mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $number = mysqli_real_escape_string($con,$_POST['number']);
    $others = mysqli_real_escape_string($con,$_POST['others']);
    $message = mysqli_real_escape_string($con,$_POST['message']);
    $food = mysqli_real_escape_string($con,$_POST['food']);

    $sql="SELECT * FROM `invitation` ORDER BY `invitation`.`id` DESC LIMIT 1";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        $wedding_of=$row['names'];}
    $qry = "INSERT INTO `rsvp`(`name`, `email`, `attends`, `others-names`, `message`, `food-preference`, `wedding_of`) VALUES ('$name','$email','$number','$others','$message','$food','$wedding_of')";
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