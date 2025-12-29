<?php
    session_start();
    include "../../db_connect.php";
    if(!isset($_SESSION['user_id'])) {
      header('location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="../../assets/img/logo1.png" type="image/x-icon">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="../../assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../../assets/css/styles.css">

    <link rel="stylesheet" href="./design.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>ArtRise</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">
                <img src="../../assets/img/logo1.png" alt="" class="nav__logo-img">
                ArtRise
            </a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="../homepage" class="nav__link">Home</a>
                    </li>
                    
                    <li class="nav__item">
                        <a href="../market/index.php" class="nav__link">Market</a>
                    </li>

                    <li class="nav__item">
                        <a href="../chat/index.php" class="nav__link">Chat</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">Profile</a>
                    </li>

                    <li class="nav__item">
                        <a href="../cart/index.php" class="nav__link"><i class="fa fa-shopping-cart" style="font-size:30px;"></i></a>
                    </li>

                    <li class="nav__item">
                        <a href="../user_logout.php" class="nav__link">Logout</a>
                    </li>

                    <a href="../post_feed/index.php" class="button button--ghost">+ Post</a>
                </ul>

                <div class="nav__close" id="nav-close">
                    <i class='bx bx-x'></i>
                </div>

                <img src="../../assets/img/nav-img.png" alt="" class="nav__img">
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>

        </nav>
    </header>

        <main class="main">
            
            <!--==================== CATEGORY ====================-->
            <?php
                $user_id=$_SESSION['user_id'];
                $sql="Select * from users where user_id=$user_id;";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($result);
            ?>
            <section class="section category">
                <div class="profile-container">
                    <div class="profile-header">
                        <div class="profile-card__img">
                            <div class="profile-pic">
                                <label class="-label" for="file">
                                    <span class="glyphicon glyphicon-camera"></span>
                                    <span>Change Image</span>
                                </label>
                                <input id="file" type="file" onchange="updateProfilePic(event)" />
                                <?php echo "<img src='../../src/" . $row['profile_pic'] ."' id='output' width='200' />"; ?>
                            </div>
                        </div>
                        <div class="profile-details">
                            <h1 id="name">
                                <?php
                                    echo $row['name'];
                                ?>
                            </h1>
                            <p id="email">
                                <?php
                                    echo $row['email'];
                                ?>
                            </p>
                            <ul>
                                <li><a href="#" onclick="myPost()">Posts</a></li>
                                <li><a href="#" onclick="myLikes()">Likes</a></li>
                                <li><a href="#" onclick="myFav()">Favorites</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            
            <!--==================== DISCOUNT ====================-->
            <div id="my_posts">
                <section class="section category">
                    <h3 class="section__title">My Posts</h3>
                </section>
                <?php
                        $user_id=$_SESSION['user_id'];
                        $sql="Select * from users_content where content_id 
                        in (select content_id from uploads where user_id=$user_id);";
                        $result=mysqli_query($conn,$sql);
                
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $file_type = $row['file_type'];
                                $content_id = $row['content_id'];
                                $creator = $row['creator_id'];
                                $sql = "select * from users where user_id = '$creator';";
                                $result_inner = mysqli_query($conn, $sql);
                                $nrow = mysqli_fetch_assoc($result_inner);
                                echo '
                                    <section id="my_feed">
                                        <div id="carding" class="discount__container container grid">
                                            <div class="feed-card">
                                                <div class="profile-picture">
                                                    <img src="../../src/'.$nrow['profile_pic'].'" alt="Profile Picture">
                                                </div>
                                                <div class="feed-content">
                                                <div class="username">';
                
                                                    $uploader_name = $nrow['name'];
                                                    echo $uploader_name;
                                                echo 
                                                    '</div>
                                                    <div class="post-content">';
                                echo $row['description'];
                                echo '
                                                    </div>
                                                    <div class="post-image">';
                                if (strpos($file_type, 'image/') === 0) {
                                    echo "<img src='../../uploads/critics_content/" . $row['content'] . "'>";
                                } else if (strpos($file_type, 'video/') === 0) {
                                    echo "<video width='320' height='240' controls><source src='../../uploads/critics_content/" . $row['content'] . "' type='$file_type'></video>";
                                }
                                echo '
                                                    </div>
                                                    <div class="like-comment">
                                                        <div class="post-actions">
                                                        ';
                
                        ?>
                
                                <span class="post-likes">
                                    <form id="post-<?php echo $content_id; ?>" action="increase_likes.php" method="POST">
                                        <input type="hidden" name="post_id" value="<?php echo $content_id; ?>">
                                        <button type="submit" id="thumbs-up-<?php echo $content_id; ?>" class="thumbs-up-btn" style="color:white;background:linear-gradient(136deg, hwb(260 3% 80%) 0%, hsl(266, 48%, 16%) 100%);" onclick="event.preventDefault(); increaseLikes(<?php echo $content_id; ?>);">
                                            <?php
                                            $sql_likes = "SELECT * FROM likes WHERE content_id = $content_id AND user_id = $user_id";
                                            $resultl = mysqli_query($conn, $sql_likes);
                                            if (mysqli_num_rows($resultl) == 0)
                                                echo '<i class="material-icons" id="thumbs-up-icon-' . $content_id . '">thumb_up</i>';
                                            else
                                                echo '<i class="material-icons" id="thumbs-up-icon-' . $content_id . '" style="color: blue;">thumb_up</i>';
                                            ?>
                                        </button>
                                    </form>
                                    <span id="like-count-<?php echo $content_id; ?>"><?php echo $row["likes"]; ?>&nbsp;likes</span>
                                </span>
                
                                <?php
                
                                echo
                                '<span class="post-comments"><i class="material-icons">mode_comment</i>';
                                $sql1 = "SELECT * from reviews where content_id = $content_id;";
                                $result1 = mysqli_query($conn, $sql1);
                                $numComments = mysqli_num_rows($result1);
                                echo $numComments;
                                echo
                                '&nbsp;comments
                                                        </span>';
                                ?>
                
                
                                <span class="post-favorites">
                                    <form id="post-<?php echo $content_id; ?>" action="add_favourites.php" method="POST">
                                        <input type="hidden" name="fav_id" value="<?php echo $content_id; ?>">
                                        <button type="submit" id="fav-btn-<?php echo $content_id; ?>" class="fav-btn" style="color:white;background:linear-gradient(136deg, hwb(260 3% 80%) 0%, hsl(266, 48%, 16%) 100%);" onclick="event.preventDefault(); addFavorite(<?php echo $content_id; ?>);">
                                            <?php
                                            $sqlf = "SELECT * FROM favourites WHERE content_id = $content_id AND user_id = $user_id";
                                            $resultf = mysqli_query($conn, $sqlf);
                                            if (mysqli_num_rows($resultf) == 0)
                                                echo '<i class="material-icons" id="fav-icon-' . $content_id . '">favorite_border</i>';
                                            else
                                                echo '<i class="material-icons" id="fav-icon-' . $content_id . '" style="color: red;">favorite</i>';
                                            ?>
                                        </button>
                                    </form>
                                    <span>&nbsp;Favorites</span>
                                </span>
                
                        <?php
                                echo '</div>
                                                <div class="post-comments-section">';
                                while ($row1 = mysqli_fetch_array($result1)) {
                                    echo '
                                                    <div class="post-comment">
                                                        <p class="comment-author">';
                                    echo $row1['name'];
                                    echo
                                    '</p>
                                                        <p class="comment-text">';
                                    echo $row1['comment'];
                                    echo
                                    '</p>
                                                    </div>';
                                }
                                echo '
                                                    <form class="add-comment-form" action="add_comment.php" method="post">
                                                    <div class="add-comment">
                                                        <input type="hidden" name="content_id_comment" value="' . $content_id . '">
                                                        <input type="text" name="comment" placeholder="Write a comment">
                                                        <button type="submit">Post</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>';
                            }
                        }
                        ?>
                        
                </div>

                <div id="my_likes">
                    <section class="section category">
                        <h3 class="section__title">My Liked Posts</h3>
                    </section>
                    <?php
                        $user_id=$_SESSION['user_id'];
                        $sql="Select * from users_content where content_id in
                        (select content_id from likes where user_id = $user_id);";
                        $result=mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $file_type = $row['file_type'];
                                $content_id = $row['content_id'];
                                $creator = $row['creator_id'];
                                $sql = "select * from users where user_id = '$creator';";
                                $result_inner = mysqli_query($conn, $sql);
                                $nrow = mysqli_fetch_assoc($result_inner);
                                echo '
                                    <section id="my_feed">
                                        <div id="carding" class="discount__container container grid">
                                            <div class="feed-card">
                                                <div class="profile-picture">
                                                    <img src="../../src/'.$nrow['profile_pic'].'" alt="Profile Picture">
                                                </div>
                                                <div class="feed-content">
                                                <div class="username">';
                
                                                    $uploader_name = $nrow['name'];
                                                    echo $uploader_name;
                                                echo 
                                                    '</div>
                                                    <div class="post-content">';
                                echo $row['description'];
                                echo '
                                                    </div>
                                                    <div class="post-image">';
                                if (strpos($file_type, 'image/') === 0) {
                                    echo "<img src='../../uploads/critics_content/" . $row['content'] . "'>";
                                } else if (strpos($file_type, 'video/') === 0) {
                                    echo "<video width='320' height='240' controls><source src='../../uploads/critics_content/" . $row['content'] . "' type='$file_type'></video>";
                                }
                                echo '
                                                    </div>
                                                    <div class="like-comment">
                                                        <div class="post-actions">
                                                        ';
                
                        ?>
                
                                <span class="post-likes">
                                    <form id="post-<?php echo $content_id; ?>" action="increase_likes.php" method="POST">
                                        <input type="hidden" name="post_id" value="<?php echo $content_id; ?>">
                                        <button type="submit" id="thumbs-up-<?php echo $content_id; ?>" class="thumbs-up-btn" style="color:white;background:linear-gradient(136deg, hwb(260 3% 80%) 0%, hsl(266, 48%, 16%) 100%);" onclick="event.preventDefault(); increaseLikes(<?php echo $content_id; ?>);">
                                            <?php
                                            $sql_likes = "SELECT * FROM likes WHERE content_id = $content_id AND user_id = $user_id";
                                            $resultl = mysqli_query($conn, $sql_likes);
                                            if (mysqli_num_rows($resultl) == 0)
                                                echo '<i class="material-icons" id="thumbs-up-icon-' . $content_id . '">thumb_up</i>';
                                            else
                                                echo '<i class="material-icons" id="thumbs-up-icon-' . $content_id . '" style="color: blue;">thumb_up</i>';
                                            ?>
                                        </button>
                                    </form>
                                    <span id="like-count-<?php echo $content_id; ?>"><?php echo $row["likes"]; ?>&nbsp;likes</span>
                                </span>
                
                                <?php
                
                                echo
                                '<span class="post-comments"><i class="material-icons">mode_comment</i>';
                                $sql1 = "SELECT * from reviews where content_id = $content_id;";
                                $result1 = mysqli_query($conn, $sql1);
                                $numComments = mysqli_num_rows($result1);
                                echo $numComments;
                                echo
                                '&nbsp;comments
                                                        </span>';
                                ?>
                
                
                                <span class="post-favorites">
                                    <form id="post-<?php echo $content_id; ?>" action="add_favourites.php" method="POST">
                                        <input type="hidden" name="fav_id" value="<?php echo $content_id; ?>">
                                        <button type="submit" id="fav-btn-<?php echo $content_id; ?>" class="fav-btn" style="color:white;background:linear-gradient(136deg, hwb(260 3% 80%) 0%, hsl(266, 48%, 16%) 100%);" onclick="event.preventDefault(); addFavorite(<?php echo $content_id; ?>);">
                                            <?php
                                            $sqlf = "SELECT * FROM favourites WHERE content_id = $content_id AND user_id = $user_id";
                                            $resultf = mysqli_query($conn, $sqlf);
                                            if (mysqli_num_rows($resultf) == 0)
                                                echo '<i class="material-icons" id="fav-icon-' . $content_id . '">favorite_border</i>';
                                            else
                                                echo '<i class="material-icons" id="fav-icon-' . $content_id . '" style="color: red;">favorite</i>';
                                            ?>
                                        </button>
                                    </form>
                                    <span>&nbsp;Favorites</span>
                                </span>
                
                        <?php
                                echo '</div>
                                                <div class="post-comments-section">';
                                while ($row1 = mysqli_fetch_array($result1)) {
                                    echo '
                                                    <div class="post-comment">
                                                        <p class="comment-author">';
                                    echo $row1['name'];
                                    echo
                                    '</p>
                                                        <p class="comment-text">';
                                    echo $row1['comment'];
                                    echo
                                    '</p>
                                                    </div>';
                                }
                                echo '
                                                    <form class="add-comment-form" action="add_comment.php" method="post">
                                                    <div class="add-comment">
                                                        <input type="hidden" name="content_id_comment" value="' . $content_id . '">
                                                        <input type="text" name="comment" placeholder="Write a comment">
                                                        <button type="submit">Post</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>';
                            }
                        }
                        ?>
                </div>

                <div id="my_fav">
                    <section class="section category">
                        <h3 class="section__title">My Favorites</h3>
                    </section>
                    <?php
                        $user_id=$_SESSION['user_id'];
                        $sql="Select  * from users_content where content_id in
                        (select content_id from favourites where user_id=$user_id);";
                        $result=mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $file_type = $row['file_type'];
                                $content_id = $row['content_id'];
                                $creator = $row['creator_id'];
                                $sql = "select * from users where user_id = '$creator';";
                                $result_inner = mysqli_query($conn, $sql);
                                $nrow = mysqli_fetch_assoc($result_inner);
                                echo '
                                    <section id="my_feed">
                                        <div id="carding" class="discount__container container grid">
                                            <div class="feed-card">
                                                <div class="profile-picture">
                                                    <img src="../../src/'.$nrow['profile_pic'].'" alt="Profile Picture">
                                                </div>
                                                <div class="feed-content">
                                                <div class="username">';
                
                                                    $uploader_name = $nrow['name'];
                                                    echo $uploader_name;
                                                echo 
                                                    '</div>
                                                    <div class="post-content">';
                                echo $row['description'];
                                echo '
                                                    </div>
                                                    <div class="post-image">';
                                if (strpos($file_type, 'image/') === 0) {
                                    echo "<img src='../../uploads/critics_content/" . $row['content'] . "'>";
                                } else if (strpos($file_type, 'video/') === 0) {
                                    echo "<video width='320' height='240' controls><source src='../../uploads/critics_content/" . $row['content'] . "' type='$file_type'></video>";
                                }
                                echo '
                                                    </div>
                                                    <div class="like-comment">
                                                        <div class="post-actions">
                                                        ';
                
                        ?>
                
                                <span class="post-likes">
                                    <form id="post-<?php echo $content_id; ?>" action="increase_likes.php" method="POST">
                                        <input type="hidden" name="post_id" value="<?php echo $content_id; ?>">
                                        <button type="submit" id="thumbs-up-<?php echo $content_id; ?>" class="thumbs-up-btn" style="color:white;background:linear-gradient(136deg, hwb(260 3% 80%) 0%, hsl(266, 48%, 16%) 100%);" onclick="event.preventDefault(); increaseLikes(<?php echo $content_id; ?>);">
                                            <?php
                                            $sql_likes = "SELECT * FROM likes WHERE content_id = $content_id AND user_id = $user_id";
                                            $resultl = mysqli_query($conn, $sql_likes);
                                            if (mysqli_num_rows($resultl) == 0)
                                                echo '<i class="material-icons" id="thumbs-up-icon-' . $content_id . '">thumb_up</i>';
                                            else
                                                echo '<i class="material-icons" id="thumbs-up-icon-' . $content_id . '" style="color: blue;">thumb_up</i>';
                                            ?>
                                        </button>
                                    </form>
                                    <span id="like-count-<?php echo $content_id; ?>"><?php echo $row["likes"]; ?>&nbsp;likes</span>
                                </span>
                
                                <?php
                
                                echo
                                '<span class="post-comments"><i class="material-icons">mode_comment</i>';
                                $sql1 = "SELECT * from reviews where content_id = $content_id;";
                                $result1 = mysqli_query($conn, $sql1);
                                $numComments = mysqli_num_rows($result1);
                                echo $numComments;
                                echo
                                '&nbsp;comments
                                                        </span>';
                                ?>
                
                
                                <span class="post-favorites">
                                    <form id="post-<?php echo $content_id; ?>" action="add_favourites.php" method="POST">
                                        <input type="hidden" name="fav_id" value="<?php echo $content_id; ?>">
                                        <button type="submit" id="fav-btn-<?php echo $content_id; ?>" class="fav-btn" style="color:white;background:linear-gradient(136deg, hwb(260 3% 80%) 0%, hsl(266, 48%, 16%) 100%);" onclick="event.preventDefault(); addFavorite(<?php echo $content_id; ?>);">
                                            <?php
                                            $sqlf = "SELECT * FROM favourites WHERE content_id = $content_id AND user_id = $user_id";
                                            $resultf = mysqli_query($conn, $sqlf);
                                            if (mysqli_num_rows($resultf) == 0)
                                                echo '<i class="material-icons" id="fav-icon-' . $content_id . '">favorite_border</i>';
                                            else
                                                echo '<i class="material-icons" id="fav-icon-' . $content_id . '" style="color: red;">favorite</i>';
                                            ?>
                                        </button>
                                    </form>
                                    <span>&nbsp;Favorites</span>
                                </span>
                
                        <?php
                                echo '</div>
                                                <div class="post-comments-section">';
                                while ($row1 = mysqli_fetch_array($result1)) {
                                    echo '
                                                    <div class="post-comment">
                                                        <p class="comment-author">';
                                    echo $row1['name'];
                                    echo
                                    '</p>
                                                        <p class="comment-text">';
                                    echo $row1['comment'];
                                    echo
                                    '</p>
                                                    </div>';
                                }
                                echo '
                                                    <form class="add-comment-form" action="add_comment.php" method="post">
                                                    <div class="add-comment">
                                                        <input type="hidden" name="content_id_comment" value="' . $content_id . '">
                                                        <input type="text" name="comment" placeholder="Write a comment">
                                                        <button type="submit">Post</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>';
                            }
                        }
                        ?>
                </div>
      </main>



    <!--==================== FOOTER ====================-->
    <footer class="footer section">
                <div class="footer__container container grid">
                    <div class="footer__content">
                        <a href="#" class="footer__logo">
                            <img src="../../assets/img/logo1.png" alt="" class="footer__logo-img">
                            ArtRise
                        </a>

                        <p class="footer__description">Enjoy the thrill of creativity</p>
                        
                        <div class="footer__social">
                            <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                                <i class='bx bxl-facebook'></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                                <i class='bx bxl-instagram-alt' ></i>
                            </a>
                            <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                                <i class='bx bxl-twitter' ></i>
                            </a>
                        </div>
                    </div>

                    <div class="footer__content">
                        <h3 class="footer__title">About</h3>
                        
                        <ul class="footer__links">
                            <li>
                                <a href="#" class="footer__link">About Us</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Features</a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer__content">
                        <h3 class="footer__title">Our Services</h3>
                        
                        <ul class="footer__links">
                            <li>
                                <a href="../drawing/index.php" class="footer__link">Dive into Art</a>
                            </li>
                            <li>
                                <a href="../music/index.php" class="footer__link">Dive into Music </a>
                            </li>
                            <li>
                                <a href="../visual/index.php" class="footer__link">Dive into Visual Treats</a>
                            </li>
                            <li>
                                <a href="../literary/index.php" class="footer__link">Dive into Literature</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <span class="footer__copy">&#169; ArtRise. All rigths reserved</span>

            </footer>
        
        <!--=============== MAIN JS ===============-->
        <script src="../../assets/js/main.js"></script>
        <script src="script.js"></script>
        <script>
        $('.add-comment-form').submit(function(event) {
            // Prevent the form from submitting normally
            event.preventDefault();

            // Get the form data
            var formData = $(this).serialize();

            // Send an AJAX request to add_comment.php
            $.ajax({
                type: 'POST',
                url: '../homepage/add_comment.php',
                data: formData,
                success: function(response) {
                    // Append the new comment to the comments list
                    // $('#comments-list').append(response);

                    // // Reset the form
                    // $('#add-comment-form')[0].reset();
                    $(this).closest('.post').find('.comments-list').append(response);

                    // Reset the form
                    $(this)[0].reset();
                }.bind(this)
            });
        });

        function addFavorite(contentId) {
            var favIcon = document.getElementById("fav-icon-" + contentId);

            if (favIcon.style.color !== "red") {
                // User has not favorited the content yet, so add it to favorites
                console.log("hii");
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        favIcon.style.color = "red";
                        // document.getElementById("fav-count-" + contentId).innerHTML = favCount + 1 + "&nbsp;favorites";
                    }
                };
                xhttp.open("POST", "../homepage/add_favourites.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("fav_id=" + contentId);
            } else {
                // User has already favorited the content, so remove it from favorites
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        favIcon.style.color = "";
                        // document.getElementById("fav-count-" + contentId).innerHTML = favCount - 1 + "&nbsp;favorites";
                    }
                };
                xhttp.open("POST", "../homepage/remove_favourites.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("fav_id=" + contentId);
            }
        }

        function increaseLikes(contentId) {
            var thumbsUpIcon = document.getElementById("thumbs-up-icon-" + contentId);
            var likeCount = parseInt(document.getElementById("like-count-" + contentId).innerHTML);

            if (thumbsUpIcon.style.color !== "blue") {
                console.log("hii");
                // User has not liked the post yet, so increase the like count
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        thumbsUpIcon.style.color = "blue";
                        document.getElementById("like-count-" + contentId).innerHTML = likeCount + 1 + "&nbsp;likes";

                    }
                };
                xhttp.open("POST", "../homepage/increase_likes.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("post_id=" + contentId);
            } else {
                // User has already liked the post, so decrease the like count
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        thumbsUpIcon.style.color = "";
                        document.getElementById("like-count-" + contentId).innerHTML = likeCount - 1 + "&nbsp;likes";
                    }
                };
                xhttp.open("POST", "../homepage/decrease_likes.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("post_id=" + contentId);
            }
        }
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
// var loadFile = function (event) {
  // var image = document.getElementById("output");
  // image.src = URL.createObjectURL(event.target.files[0]);
// };
  function updateProfilePic(event) {
    console.log("doing");
    var image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);

    // Create FormData object and append file data
    var formData = new FormData();
    formData.append("file", event.target.files[0]);

    // Make AJAX request to PHP script
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_pic.php");
    xhr.send(formData);
    console.log("done");
  }
</script>

    </body>
</html>
