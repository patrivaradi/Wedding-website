<?php   

   if($_SERVER["REQUEST_METHOD"]=="POST"){               
    include "db_connection.php";
    $her_story = mysqli_real_escape_string($con,$_POST['story-her']);
    $his_story = mysqli_real_escape_string($con,$_POST['story-him']);
    
    $qry = "UPDATE `stories` SET `her_side`='$her_story',`his_side`='$his_story' WHERE `id`='1'";
    $insert = mysqli_query($con,$qry);
    if(!$insert){
        echo "There are some problems";
    }else{
        header('location:index.php');
    } 
    mysqli_close($con);
}

//    if(isset($_POST['submit']) && isset($_FILES['uplimgher'])&& isset($_FILES['uplimghim'])){         
//     include "db_connection.php";
//     $story_her = $_POST['edit-story-her'];
//     $story_him = $_POST['story-him'];


//     $img_name_her = $_FILES['uplimgher']['name'];
//     $img_size_her = $_FILES['uplimgher']['size'];
//     $tmp_name_her = $_FILES['uplimgher']['tmp_name'];
//     $error = $_FILES['uplimgher']['error'];

//     $img_name_him = $_FILES['uplimghim']['name'];
//     $img_size_him = $_FILES['uplimghim']['size'];
//     $tmp_name_him = $_FILES['uplimghim']['tmp_name'];
//     $error = $_FILES['uplimghim']['error'];

//     if($error === 0){
//         if($img_size_her > 125000 || $img_size_him > 125000){
//             $error_message ="Sorry, your file is too large";
//             header("location:index.php?error=$error_message");
//         }else {
//             $img_ex_her = pathinfo($img_name_her, PATHINFO_EXTENSION);
//             $img_ex_lc_her = strtolower($img_ex_her);

//             $img_ex_him = pathinfo($img_name_him, PATHINFO_EXTENSION);
//             $img_ex_lc_him = strtolower($img_ex_him);

//             $allowed_exs = array("jpg", "jpeg" , "png");

//             if(in_array($img_ex_lc_her,$allowed_exs) || in_array($img_ex_lc_him,$allowed_exs)){
//                 $new_img_name_her = uniqid("IMG-",true).'.'.$img_ex_lc_her;
//                 $img_upload_path_her = 'images/'.$new_img_name_her;
//                 move_uploaded_file($tmp_name_her,$img_upload_path_her);

//                 $new_img_name_him = uniqid("IMG-",true).'.'.$img_ex_lc_him;
//                 $img_upload_path_him = 'images/'.$new_img_name_him;
//                 move_uploaded_file($tmp_name_him,$img_upload_path_him);

//                 INSERT INTO DATABASE
//                 $sql="UPDATE `stories` SET `her_pic`='$new_img_name_her',`her_side`='$story_her',`his_pic`='$new_img_name_him',`his_side`='$story_him' WHERE `id`='1'";
//                 mysqli_query($con,$sql);
//                 header("location:index.php#about-us-section");
//             }else{
//                 $error_message ="You can't upload files of this type!";
//                 header("location:index.php?error=$error_message");
//             }
//         }
//     }
   
// }
    
//     else{
//         header("location:index.php#about-us-section");
//     }
   
//     mysqli_close($con);
?>