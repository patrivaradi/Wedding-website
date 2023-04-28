<?php   

   if($_SERVER["REQUEST_METHOD"]=="POST"){               
    include "db_connection.php";
    $time = mysqli_real_escape_string($con,$_POST['loc-time']);
    $where = mysqli_real_escape_string($con,$_POST['loc-where']);
    $where_url = mysqli_real_escape_string($con,$_POST['loc-where-map']);
    $dress = mysqli_real_escape_string($con,$_POST['loc-dress']);
    $park = mysqli_real_escape_string($con,$_POST['loc-park']);
    $det = mysqli_real_escape_string($con,$_POST['loc-det']);

    
    $qry = "INSERT INTO `location`(`time`, `location`, `location-url`, `dress`, `park`, `details`) VALUES ('$time','$where','$where_url','$dress','$park','$det')";
    $insert = mysqli_query($con,$qry);
    if(!$insert){
        echo "There are some problems";
    }else{
        header('location:index.php');
    } 
    mysqli_close($con);
}
?>