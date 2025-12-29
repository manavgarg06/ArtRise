<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "artrise";
    $conn=mysqli_connect($server,$username,$password, $db);
    if(!$conn)
    {
        echo "Connection Failed";
        die("Connection failed due to". mysqli_connect_error());
    }
?>