<?php
    session_start();
    include "../db_connect.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");

    $logname = $_GET['logname'];
    $logemail = $_GET['logemail'];
    $logpass = $_GET['logpass'];
    $loghash = password_hash($logpass, PASSWORD_DEFAULT);
    $logqualifi= $_GET['logqualifi'];
    $logtype= $_GET['logcontact'];

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
                <a href='http://localhost/ArtRise/critics/verify.php?email=$emailid&v_code=$v_code'>Verify</a>";
            
            // echo $emailid;
            // echo $v_code;
            $mail->send();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    if(empty($logname)){
        echo '<script>alert(" Enter Your Name");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if(empty($logemail)){
        echo '<script>alert(" Enter Your Email");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if(empty($logpass)){
        echo '<script>alert(" Enter Password");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if(empty($logqualifi)){
        echo '<script>alert(" Enter Your Qualification");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if(empty($logtype)){
        echo '<script>alert(" Enter Your Art Speciality");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if (strlen($logpass) < 6) {
        echo '<script>alert("Password should not contain less than 6 characters");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
    }
    else{
        $v_code = bin2hex(random_bytes(16));
        $sql = "INSERT INTO critics_request (name,email,critic_type,qualification,password,verification_code, is_verified) Values('$logname','$logemail','$logtype','$logqualifi','$loghash','$v_code','0');";

        if(sendMail($logemail,$v_code) && $conn->query($sql) == true){
            echo '<script>alert(" Request to become Critic sent to admin");setTimeout(()=>{window.location.replace("../index.php");},500);</script>';
        }
        else{
            // echo '<script>alert(" Some error occured");setTimeout(()=>{window.location.replace("../index.php");},500);</script>';
            echo '<script>alert(" Some error occured");</script>';
        }
    }
    $conn->close();
?>