<?php
session_start();
include "../../db_connect.php";
if (!isset($_SESSION['user_id'])) {
    header('location: ../index.php');
}

$content_id = $_POST['post_id'];
$user_id = $_SESSION['user_id'];

//  Update the likes for the post
$sql21 = "UPDATE users_content SET likes = likes - 1 WHERE content_id = $content_id";
// $result21 = mysqli_query($conn, $sql21);

$sql23 = "DELETE from likes where content_id = $content_id";
// $result23 = mysqli_query($conn, $sql23);

if ($conn->query($sql21) === TRUE && $conn->query($sql23) === TRUE) {
    $result = mysqli_query($conn, "SELECT * FROM users_content WHERE content_id = $content_id");
    $row = mysqli_fetch_assoc($result);
    $likes = $row['likes'];
    echo $likes;
} else {
    echo "Error updating likes: " . $conn->error;
}
$conn->close();
