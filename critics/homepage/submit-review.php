<?php
session_start();
include "../../db_connect.php";
if (!isset($_SESSION['critics_id'])) {
  header('location: ../index.html');
}

$critic_id = $_SESSION['critics_id'];
$review = $_POST['review'];
$star_index = $_POST['star_index'];
$content_id = $_POST['content_id'];
// echo $review;
// echo $star_index;
// echo $content_id;
if (empty($star_index) || empty($review)) {
  echo '<script>alert(" Fill Both Stars and Comment fields");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
  exit();
} else {
  $sql = "UPDATE CRITICS_CONTENT
                SET rating = rating + $star_index,
                 critics_rated = critics_rated + 1
                WHERE content_id = '$content_id';";

  if (mysqli_query($conn, $sql)) {
    // echo 'nice';
    echo '<script>alert(" data Updated");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  $sqlk = "insert into judges (critics_id, content_id, review) values ('$critic_id', '$content_id', '$review');";
  $resultk = mysqli_query($conn, $sqlk);

  $sql2 = "select * from critics_content where content_id = '$content_id';";

  $result = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_assoc($result);

  $critic_rat = $row['critics_rated'];
  $rating_recv = $row['rating'];

  // echo 'hello';
  // echo $critic_rat;
  // echo $rating_recv;

  $user_id = $row['user_id'];
  if ($critic_rat == 3 && $rating_recv >= 5) {
    $content_id = $row['content_id'];
    $content = $row['content'];
    $description = $row['description'];
    $rating = $row['rating'];
    $art_type = $row['art_type'];
    $file_type = $row['file_type'];
    // $upload_date = $row['upload_date'];
    $sql3 = "insert into users_content (content_id, content, creator_id, description, ratings, art_type, file_type)
          values ('$content_id', '$content', '$user_id', '$description', '$rating', '$art_type', '$file_type');";
    $result = mysqli_query($conn, $sql3);
    $msg = "Your Content with id = " . $content_id . " has been approved.";
    $sql = "INSERT INTO notification (user_id, msg) VALUES ('$user_id', '$msg');";
    mysqli_query($conn, $sql);
  }
  else if($critic_rat == 3) {
    $msg = "Your Content with id = " . $content_id . " has been discarded.";
    $sql = "INSERT INTO notification (user_id, msg) VALUES ('$user_id', '$msg');";
    mysqli_query($conn, $sql);
  }
}
?>