while($row = mysqli_fetch_array($result)) {
    $content_id = $row['id'];
    echo '
    <form id="post" method="POST">
        <input type="hidden" name="post_id" value="' . $content_id . '">
        <button type="submit" id="thumbs-up" class="thumbs-up-btn" style="color:white;background:linear-gradient(136deg, hwb(260 3% 80%) 0%, hsl(266, 48%, 16%) 100%);" onclick="likePost('.$content_id.')">';
            $sql_likes= "SELECT * FROM likes WHERE content_id= $content_id AND user_id = $user_id";
            $resultl = mysqli_query($conn, $sql_likes);
            if(mysqli_num_rows($resultl) == 0)
                echo '<i class="material-icons" onclick="changeColor_thumbsUp()">thumb_up</i>';
            else 
                echo '<i class="material-icons" style="color: blue;">thumb_up</i>';
            echo '
        </button>
    </form>';
}

<script>
    function changeColor_thumbsUp() {
        var thumbsUp = document.getElementById('thumbs-up');
        thumbsUp.style.color = 'red';
    }

    function changeColor_Fav() {
        var FavOn = document.getElementById('fav_on');
        FavOn.style.color = 'red';
    }
</script>

<?php
    session_start();
    include "../../db_connect.php";
    if(!isset($_SESSION['user_id'])) {
        header('location: ../index.php');
    }

    $content_id = $_POST['post_id'];
    $user_id = $_SESSION['user_id'];

    $sql= "SELECT * FROM likes WHERE content_id= $content_id AND user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) == 0) {

        // Update the likes for the post
        
        $sql12 = "UPDATE users_content SET likes = likes + 1 WHERE content_id = $content_id";
        $result12 = mysqli_query($conn, $sql12);

        $sql13 = "INSERT into likes (content_id, user_id) VALUES ($content_id, $user_id);";
        $result13 = mysqli_query($conn, $sql13);
        $conn->close();
 
    } 
    else {

        // Update the likes for the post
        $sql21 = "UPDATE users_content SET likes = likes - 1 WHERE content_id = $content_id";
        $result21 = mysqli_query($conn, $sql21);

        $sql23 = "DELETE from likes where content_id = $content_id";
        $result23 = mysqli_query($conn, $sql23);
        $conn->close();
}