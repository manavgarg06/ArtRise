<?php
    session_start();
    include "../db_connect.php";
    $email = $_GET['email'];
    $v_code = $_GET['v_code'];
    if(isset($email) && isset($v_code)){
        $query ="SELECT * FROM critics_request WHERE email='$email' AND verification_code='$v_code'";
        $result = mysqli_query($conn,$query);
        if($result){
            if(mysqli_num_rows($result)==1){
                $result_fetch= mysqli_fetch_assoc($result);
                if($result_fetch['is_verified'] ==0){
                    $update = "UPDATE critics_request SET is_verified = '1' WHERE email='$result_fetch[email]'";
                    if(mysqli_query($conn,$update)){
                        echo"
                            <script>
                                alert('email verification successful');
                                window.location.href='index.php';
                            </script>
                        ";
                    }
                    else{
                        echo"
                            <script>
                                alert('email Already registered');
                                window.location.href='index.php';
                            </script>
                        ";
                    }
                }
            }
        }
        else{
            echo"
                <script>
                    alert('cannot run query');
                    window.location.href='index.php';
                </script>
            ";
        }
    }
?>