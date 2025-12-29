<?php
session_start();
include "../../db_connect.php";
if (!isset($_SESSION['user_id'])) {
    header('location: ../index.html');
}

$content_id = $_POST['fav_id'];
$user_id = $_SESSION['user_id'];

$sql1 = "INSERT into favourites (user_id, content_id) VALUES ($user_id, $content_id);";
// $result1 = mysqli_query($conn, $sql1);

if ($conn->query($sql1) === TRUE) {
        // echo "Success";
} else {
    echo "Error updating likes: " . $conn->error;
}
$conn->close();
