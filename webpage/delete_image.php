<?php
include('db_connection.php');

if (isset($_POST['delete'])) {
  $image_id = $_POST['image_id'];
  
  // Get the image URL from the database
  $sql = "SELECT `image_url` FROM `images` WHERE `id` = '$image_id'";
  $res = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($res);
  $image_url = $row['image_url'];
  
  // Delete the image file from the website
  unlink("uploads/$image_url");
  
  // Delete the image record from the database
  $sql = "DELETE FROM `images` WHERE `id` = '$image_id'";
  mysqli_query($con, $sql);
  
  // Redirect back to the gallery page
  header("Location:index.php");
  exit();
}
?>