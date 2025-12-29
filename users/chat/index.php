<?php
    session_start();
    include "../../db_connect.php";
    if(!isset($_SESSION['user_id'])) {
      header('location: ../index.php');
    }
    if(isset($_GET['id1'])) {
      // write query here
      $_SESSION['friend'] = $_GET['id1'];
      header("Location: ".$_SERVER['PHP_SELF']);
  }
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = $_POST['msg'];
    $user_id = $_SESSION['user_id'];
    $friend = $_SESSION['friend'];
    $room = $_SESSION['room'];

    $sql= "INSERT INTO messages (room_id, msg, sender, receiver) values ($room, '$msg', $user_id, '$friend')";
    $result = mysqli_query($conn, $sql);
    $sql= "UPDATE chatroom set last_msg = '$msg' where room_id = $room";
    $result = mysqli_query($conn, $sql);
    header("Location: ".$_SERVER['PHP_SELF']);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../../assets/img/logo1.png" type="image/x-icon">
    <title>ArtRise Chat</title>
    <link rel="stylesheet" href="style.css">        
</head>
<body>
    <div class="chat-app">
        <div class="left-container" style="color: white">
          <div class="search-container">
            <a href="../homepage/"><i class="fa fa-arrow-circle-left" style="font-size:30px; color: rgb(7,94,84);"></i></a>
            &nbsp;
            <input type="text" placeholder="Search...">
            <button><i class="fa fa-search"></i></button>
          </div>
          <ul class="friends-list">
            <?php
                    $user_id=$_SESSION['user_id'];
                    $sql="SELECT * from chatroom where user1=$user_id or user2=$user_id;";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                          $friend;
                          if($row['user1']==$user_id)
                            $friend=$row['user2'];
                          else
                            $friend=$row['user1'];
                          if($_SESSION['friend']!=$friend)
                            echo "<li class='friend'>";
                          else
                          echo "<li class='friend active'>";
                          echo "
                            <a href='index.php?id1=" . $friend . "' style='color: white; text-decoration: none; display: flex;'>
                              <img src='https://dummyimage.com/50x50/000/fff' alt='Profile Picture'>
                              <div class='friend-info'>
                                <h4>";
                                $sql = "select * from users where user_id = $friend;";
                                $result1=mysqli_query($conn,$sql);
                                $row1 = mysqli_fetch_array($result1);
                                if($friend != $user_id)
                                  echo $row1['name'];
                                else
                                  echo "YOU";
                                echo '</h4>
                                <p>';
                                echo $row['last_msg'];
                                echo '</p>
                              </div>
                              </a>
                            </li>
                          ';
                        }
                    }
                ?>
          </ul>
        </div>
        <div class="chat-container">
          <div class="chat-header">
            <img src="https://dummyimage.com/50x50/000/fff" alt="Profile Picture">
            <?php
                    $user_id=$_SESSION['user_id'];
                    $friend = $_SESSION['friend'];
                    echo '
                    <h3 style="color:white">';
                    $sql = "select * from users where user_id = $friend;";
                    $result1=mysqli_query($conn,$sql);
                    $row1 = mysqli_fetch_array($result1);
                    if($friend != $user_id)
                      echo $row1['name'];
                    else
                      echo "YOU";
                    echo '</h3>
                    </div>
                    <div class="chat-messages">';
                    $sql="SELECT * from chatroom where (user1=$user_id and user2=$friend)
                    or (user1=$friend and user2=$user_id);";
                    $result=mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    $room = $row['room_id'];
                    $_SESSION['room'] = $room;
                    $sql = "SELECT * from messages where room_id = $room;";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                          if($row['sender']==$user_id)
                            echo '<div class="message received">';
                          else
                            echo '<div class="message">';
                          echo '
                            <p>' . $row['msg'] . '</p>
                            </div>
                          ';
                        }
                    }
                ?>
                </div>
          <div class="chat-input">
            <form action="#" method="post" enctype="multipart/form-data">
                <input type="text" name="msg" placeholder="Type your message here">
                <button type="submit">Send</button>
            </form>
          </div>
        </div>
      </div>
    <script src="script.js"></script>  
</body>
</html>