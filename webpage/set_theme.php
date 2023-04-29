<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "db_connection.php";
    $chosenTheme = $_POST['chosenTheme'];
    //echo $chosenTheme;
    $qry = "UPDATE `passwords` SET `theme`='$chosenTheme' WHERE `name`='invited'";
    $insert = mysqli_query($con,$qry);
    if(!$insert){
        echo "There are some problems";
    }else{
        echo $chosenTheme;
    } 
    mysqli_close($con);
}
?>