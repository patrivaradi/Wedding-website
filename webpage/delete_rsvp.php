<?php
include('db_connection.php');

if (isset($_POST['delete'])) {
  $rsvp_id = $_POST['rsvp_id'];
  
  // Delete the record from the database
  $sql = "DELETE FROM `rsvp` WHERE `id` = '$rsvp_id'";
  mysqli_query($con, $sql);
  
  // Redirect back to the gallery page
  header("Location:view_rsvp.php");
  exit();
}
?>