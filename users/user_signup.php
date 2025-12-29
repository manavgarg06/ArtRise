<?php
    session_start();
    include "../db_connect.php";
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");

    $name= $_GET['SignName'];
    $email = $_GET['SignEmail'];
    $password = $_GET['SignPass'];
    $hashpass = password_hash($password, PASSWORD_DEFAULT);
    $age = $_GET['SignAge'];
    $contact = $_GET['SignContact'];

    function sendMail($emailid, $v_code){
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'artrise.mail.verify@gmail.com';
            $mail->Password = 'kijqnshwkwtkljer';

            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('artrise.mail.verify@gmail.com');
            $mail->addAddress($emailid);
            $mail->isHTML(true);

            $mail->Subject = 'Email Verification from ArtRise';
            $mail->Body = "Thanks for registration!
                Click the link below to verify the email address
                <a href='http://localhost/ArtRise/users/verify.php?email=$emailid&v_code=$v_code'>Verify</a>";
            
            // echo $emailid;
            // echo $v_code;
            $mail->send();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    if(empty($name)){
        echo '<script>alert(" Enter Name");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if(empty($password)){
        echo '<script>alert(" Enter Password");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if(empty($age)){
        echo '<script>alert(" Enter age");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if(empty($email)){
        echo '<script>alert(" Enter email");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if(empty($contact)){
        echo '<script>alert(" Enter contact");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if (strlen($password) < 6) {
        echo '<script>alert("Password should not contain less than 6 characters");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
    }
    else if (strlen($contact) != 10) {
        echo '<script>alert("Contact number must contain 10 digits");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
    }
    else{
        $v_code = bin2hex(random_bytes(16));
        $path='noimage.png';
        echo '<script>console.log('.$hashpass.')</script>';
        echo '<script>console.log('.$name.')</script>';
        echo '<script>console.log('.$path.')</script>';
        echo '<script>console.log('.$age.')</script>';
        echo '<script>console.log('.$email.')</script>';
        echo '<script>console.log('.$contact.')</script>';
        echo '<script>console.log('.$v_code.')</script>';
        $sql = "INSERT INTO users (password,name,profile_pic,age,email,contact,verification_code, is_verified) Values('$hashpass','$name','$path','$age','$email','$contact','$v_code','0');";

        if($conn->query($sql) == true && sendMail($email,$v_code)){
            $new_id = mysqli_insert_id($conn);
            $sql = "SELECT * from users;";
            $result=mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)) {
                $f = $row['user_id'];
                $sql = "INSERT INTO chatroom (user1, user2, last_msg) values($f, $new_id, 'Say Hello');";
                $result1=mysqli_query($conn,$sql);
            }
            echo '<script>alert(" Please check your email for verification");setTimeout(()=>{window.location.replace("./index.php");},500);</script>';
        }
        else{
            echo '<script>alert(" Some error occured");setTimeout(()=>{window.location.replace("./index.php");},500);</script>';
            // echo '<script>alert(" Some error occured");</script>';

        }
    }
    $conn->close();
?>