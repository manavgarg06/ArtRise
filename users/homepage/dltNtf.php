<?php
    session_start();
    include "../../db_connect.php";
    $user_id = $_SESSION['user_id'];
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM notification where id = $id;";
        if ($conn->query($sql) === TRUE) {
            echo '<script>window.location.replace("../profile/index.php");</script>';
        } else {
            echo "Error adding comment: " . $conn->error;
        }
    }
    $conn->close();
?>