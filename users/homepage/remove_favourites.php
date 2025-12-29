<?php
session_start();
include "../../db_connect.php";
if (!isset($_SESSION['user_id'])) {
    header('location: ../index.html');
}

$content_id = $_POST['fav_id'];
$user_id = $_SESSION['user_id'];

$sql2 = "DELETE from favourites where content_id = $content_id";
// $result2 = mysqli_query($conn, $sql2);

if ($conn->query($sql2) === TRUE) {
    // echo "Success";
} else {
    echo "Error updating likes: " . $conn->error;
}
$conn->close();
