<?php

if(isset($_POST['submit']) && isset($_FILES['uplimg'])){
    include "db_connection.php";

    $img_name = $_FILES['uplimg']['name'];
    $img_size = $_FILES['uplimg']['size'];
    $tmp_name = $_FILES['uplimg']['tmp_name'];
    $error = $_FILES['uplimg']['error'];

    if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg" , "png");

            if(in_array($img_ex_lc,$allowed_exs)){
                $new_img_name = uniqid("FOOTER-",true).'.'.$img_ex_lc;
                $img_upload_path = '../uploads/footer-logo/'.$new_img_name;
                move_uploaded_file($tmp_name,$img_upload_path);

                //INSERT INTO DATABASE
                $sql="INSERT INTO `images`(`image_url`) VALUES ('$new_img_name')";
                mysqli_query($con,$sql);
                header("location:index.php#rsvp-section");
            }else{
                $error_message ="You can't upload files of this type!";
                header("location:index.php?error=$error_message");
            }
        
    }else {
        $error_message ="unknown error occured";
        header("location:index.php?error=$error_message");
    }
}else{
    header("location:index.php#gallery-section");
}
?>