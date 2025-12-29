<?php
    session_start();
    include "../../db_connect.php";
    $user_id = $_SESSION['user_id']; 
    $commenter = $_SESSION['user_name'];
    $content_id = $_POST['content_id_comment'];
    $comment = $_POST['comment'];
    $sql1="INSERT into reviews (user_id, name, content_id, comment) VALUES ($user_id, '$commenter', $content_id, '$comment');";
    if ($conn->query($sql1) === TRUE) {
        echo '<script>window.location.replace("index.php");</script>';
    } else {
        echo "Error adding comment: " . $conn->error;
    }
    $conn->close();
?>