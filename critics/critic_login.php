<?php
    session_start();
    include "../db_connect.php";
    
    $id = $_GET['logemail'];
    $password = $_GET['logpass'];
    
    if(empty($id)){
        echo '<script>alert(" Enter email ID");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if(empty($password)){
        echo '<script>alert(" Enter Password");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else{
        // $password = md5($password);
        $sql= "SELECT * FROM critics WHERE email='$id'"; 
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        if(mysqli_num_rows($result) == 1) {
            
            if(password_verify($password,$row['password'])){
                echo '<script>alert("Logged in");setTimeout(()=>{window.location.replace("homepage/index.php");},500);</script>';
                $_SESSION['critics_id']= $row['critics_id'];
                exit();
                // $_SESSION['critics_name'] = $row['name'];

                // $_SESSION['crtics_contact']= $row['contact'];
                // $_SESSION['crtics_email']= $row['email'];
                // $_SESSION['crtics_type']= $row['type'];
                // $_SESSION['crtics_qualification']= $row['qualification'];
            
            }
            else{
                echo '<script>alert("Wrong ID Password");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
            }
        }
        else{
            echo '<script>alert(" Incorrect UserName or Password");setTimeout(()=>{window.location.replace("./index.php");},500);</script>';
            exit();
        }
    }
?>