<?php   
if($_SERVER["REQUEST_METHOD"]=="POST"){               
    include "db_connection.php";
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $text = mysqli_real_escape_string($con,$_POST['text']);
    $date = date('Y-m-d',strtotime(mysqli_real_escape_string($con,$_POST['date'])));

    $qry = "INSERT INTO `invitation`(`names`, `text`, `date`) VALUES ('$name','$text','$date')";
    $insert = mysqli_query($con,$qry);
    if(!$insert){
        echo "There are some problems";
    }else{
        header('location:index.php');
    } 
    mysqli_close($con);
}
?>