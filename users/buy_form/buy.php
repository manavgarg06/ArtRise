<?php
    session_start();
    include "../../db_connect.php";
    $work = $_SESSION['buying_id'];
    $user = $_SESSION['user_id'];
    $sql = "SELECT * from market where content_id = '$work';";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $seller_id=$row['seller_id'];
    $content=$row['content'];
    $seller=$row['seller'];
    $file_type=$row['file_type'];
    $art_type=$row['art_type'];
    $description=$row['description'];
    $cost=$row['cost'];
    $sql = "INSERT INTO cart (content_id, seller_id, content, seller, file_type, art_type, description, cost, buyer_id) 
    VALUES ('$work', '$seller_id', '$content', '$seller', '$file_type', '$art_type', '$description', '$cost', '$user');";
    $result=mysqli_query($conn, $sql);
    $msg = "Your Content with id = " . $work . " has been sold.";
    $sql = "INSERT INTO notification (user_id, msg) VALUES ('$seller_id', '$msg');";
    mysqli_query($conn, $sql);
    $sql = "DELETE from market where content_id = '$work';";
    mysqli_query($conn, $sql);
    $conn->close();
    echo '<script>alert("Successfully bought the product");setTimeout(()=>{window.location.replace("../homepage/index.php");},500);</script>';
?>