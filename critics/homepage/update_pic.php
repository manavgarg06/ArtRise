<?php
// Check if file was uploaded
session_start();
include "../../db_connect.php";
if (isset($_FILES["file"])) {
  $file = $_FILES["file"];
  $file_name = $file['name'];
  $file_size = $file['size'];
  $file_tmp = $file['tmp_name'];
  $file_type = $file['type'];
  $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
  $file_new_name = uniqid() . '.' . $file_ext;
  $file_destination = '../../src/' . $file_new_name;
  move_uploaded_file($file_tmp, $file_destination);

  $userId = $_SESSION["critics_id"]; // Replace with actual user ID
  $sql = "UPDATE critics SET profile_pic='$file_new_name' WHERE critics_id=$userId";
  mysqli_query($conn, $sql);
}
?>
