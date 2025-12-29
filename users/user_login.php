<?php
    session_start();
    include "../db_connect.php";
    
    $id = $_GET['id'];
    $password = $_GET['password'];
    $hashpass = password_hash($password, PASSWORD_DEFAULT);

    if(empty($id)){
        echo '<script>alert(" Enter email ID");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if(empty($password)){
        echo '<script>alert(" Enter Password");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else {
        $sql= "SELECT * FROM users WHERE email='$id' AND is_verified='1'"; 
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) == 1){
            if(password_verify($password,$row['password'])){
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['friend'] = $row['user_id'];
                echo '<script>alert("Successfully logged in");setTimeout(()=>{window.location.replace("homepage");},500);</script>';
                // header("Location: homepage.php"); 
                exit();
            }
            else{
                echo '<script>alert("Wrong ID Password");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
            }
        }
        else{
            echo '<script>alert(" Incorrect UserName or Password");</script>';
            exit();
        }
    }
?>