<?php
session_start();
include "../../db_connect.php";
if (!isset($_SESSION['user_id'])) {
    header('location: ../index.php');
}

$content_id = $_POST['post_id'];
$user_id = $_SESSION['user_id'];

// Update the likes for the post

$sql12 = "UPDATE users_content SET likes = likes + 1 WHERE content_id = $content_id";
// $result12 = mysqli_query($conn, $sql12);

$sql13 = "INSERT into likes (content_id, user_id) VALUES ($content_id, $user_id);";
// $result13 = mysqli_query($conn, $sql13);

if ($conn->query($sql12) === TRUE && $conn->query($sql13) === TRUE) {
    // echo "Success";
    $result = mysqli_query($conn, "SELECT * FROM users_content WHERE content_id = $content_id");
    $row = mysqli_fetch_assoc($result);
    $likes = $row['likes'];
    echo $likes;
} else {
    echo "Error updating likes: " . $conn->error;
}
$conn->close();
