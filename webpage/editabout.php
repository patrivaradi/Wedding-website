<?php   
if(isset($_FILES['herimg'])&& isset($_FILES['himimg'])){
    include("db_connection.php");

    $img_name_her = $_FILES['herimg']['name'];
    $img_size_her = $_FILES['herimg']['size'];
    $tmp_name_her = $_FILES['herimg']['tmp_name'];
    $error = $_FILES['herimg']['error'];

    $story_her = $_POST['story-her'];

    $img_name_him = $_FILES['himimg']['name'];
    $img_size_him = $_FILES['himimg']['size'];
    $tmp_name_him = $_FILES['himimg']['tmp_name'];
    $error = $_FILES['himimg']['error'];

    $story_him = $_POST['story-him'];

    if($error === 0){
        if($img_size_her > 5000000 || $img_size_him > 5000000){
            $em="Sorry, your file is too large";
            $error = array('error'=> 1, 'em'=>$em);
            echo json_encode($error);
            exit();
        }else {
            $img_ex_her = pathinfo($img_name_her, PATHINFO_EXTENSION);
            $img_ex_lc_her = strtolower($img_ex_her);

            $img_ex_him = pathinfo($img_name_him, PATHINFO_EXTENSION);
            $img_ex_lc_him = strtolower($img_ex_him);

            $allowed_exs = array("jpg", "jpeg" , "png");
            if(in_array($img_ex_lc_her,$allowed_exs) && in_array($img_ex_lc_him,$allowed_exs)){
                $new_img_name_her = uniqid("IMG-",true).'.'.$img_ex_lc_her;
                $img_upload_path_her = '../images/'.$new_img_name_her;
                move_uploaded_file($tmp_name_her,$img_upload_path_her);

                $new_img_name_him = uniqid("IMG-",true).'.'.$img_ex_lc_him;
                $img_upload_path_him = '../images/'.$new_img_name_him;
                move_uploaded_file($tmp_name_him,$img_upload_path_him);

                // INSERT INTO DATABASE
                $sql="INSERT INTO `stories`(`her_pic`, `her_side`, `his_pic`, `his_side`) VALUES ('$new_img_name_her','$story_her','$new_img_name_him','$story_him')";
                mysqli_query($con,$sql);
                header("location:index.php#about-us-section");

            }else{
                $em="Sorry, you can't upload files this type!";
                $error = array('error'=> 1, 'em'=>$em);
                echo json_encode($error);
                exit();
            }

        }
    }else{
        $em="unknown error";
        $error = array('error'=> 1, 'em'=>$em);
        echo json_encode($error);
        exit();
    }
}
?>