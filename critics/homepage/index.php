<?php
session_start();
include "../../db_connect.php";
if (!isset($_SESSION['critics_id'])) {
    header('location: ../index.php');
}
$critic_id = $_SESSION['critics_id'];
$sql = "SELECT * FROM critics WHERE critics_id = $critic_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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
                        <a href="#" class="nav__link active-link">Home</a>
                    </li>

                    <li class="nav__item">
                        <a href="../profile" class="nav__link">Profile</a>
                    </li>

                    <li class="nav__item">
                        <a href="../critic_logout.php" class="nav__link">Logout</a>
                    </li>
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
                        <h1 id="name"><?php echo $row['name']; ?></h1>
                        <p id="email"><?php echo $row['email']; ?></p>
                    </div>
                </div>
                <div class="profile-body">
                    <div class="profile-about">
                        <h2>About Me</h2>
                        <p><?php echo $row['about']; ?></p>
                    </div>
                    <div class="profile-posts">
                        <h2>Qualification</h2>
                        <p><?php echo $row['qualification']; ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== DISCOUNT ====================-->

        <?php
        $sql1 = "select content_id from judges where critics_id = '$critic_id';";
        $result1 = mysqli_query($conn, $sql1);
        // $content_row = mysqli_fetch_assoc($result1);

        $content_ids = array();

        while ($rown = mysqli_fetch_assoc($result1)) {
            $content_ids[] = $rown['content_id'];
        }
        $sql1 = "select content_id from critics_content where critics_rated>=3;";
        $result1 = mysqli_query($conn, $sql1);
        while ($rown = mysqli_fetch_assoc($result1)) {
            $content_ids[] = $rown['content_id'];
        }

        $aty = $row['critic_type'];
        // Query the database for artworks

        if (!empty($content_ids)) {
            $sql = "SELECT * FROM critics_content WHERE art_type = '$aty' AND content_id NOT IN (" . implode(",", $content_ids) . ");";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $content_id = $row['content_id'];
                $file_name = $row['content'];
                // $file_size = $row['file_size'];
                $file_type = $row['file_type'];
                // $file_path = $row['file_path'];
                $description = $row['description'];
                // $content_type = $row['art_type'];
                $file_path = "../../uploads/critics_content/" . $file_name;
                $user_id = $row['user_id'];
                $sql = "select * from users where user_id = '$user_id';";
                $result_inner = mysqli_query($conn, $sql);
                $nrow = mysqli_fetch_assoc($result_inner);

                $uploader_name = $nrow['name'];

                // Display the artwork on the webpage                    
                echo '
                              <section id="my_feed">
                              <div id="carding" class="discount__container container grid">
                                <div class="feed-card" data-content-id="' . $content_id . '">
                                  <div class="profile-picture">
                                    <img src="../../src/'.$nrow['profile_pic'].'" alt="Profile Picture">
                                  </div>
                                  <div class="feed-content">
                                    <div class="username">';
                echo "<p>$uploader_name</p>";
                echo '</div>
                                    <div class="post-content">';
                echo "<p>$description</p>";
                echo '</div>
                                    <div class="post-image">';
                if (strpos($file_type, 'image/') === 0) {
                    echo "<img src='../../uploads/critics_content/" . $row['content'] . "'>";
                } else if (strpos($file_type, 'video/') === 0) {
                    echo "<video width='320' height='240' controls><source src='$file_path' type='$file_type'></video>";
                } else {
                    echo "<p>Unsupported file type: $file_type</p>";
                }
                echo '</div>
                                    <div class="like-comment">
                                        <div class="post-actions">
                                            <span class="post-comments"><i class="material-icons">stars</i>Review it!</span>
                                        </div>
                                        <form action="submit-review.php" method="post">
                                            <input type="hidden" name="content_id" value="' . $content_id . '">
                                            <div class="post-comments-section">
                                                <div>
                                                    <span class="star" ></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                </div>
                                                <div class="add-comment">
                                                    <input name="review" type="text" placeholder="Write the review">
                                                    <input id="star_index-input" name="star_index" type="hidden">
                                                    <button type="submit">Post</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              </section>';
                echo '<style>
                                #carding {
                                    border: none;
                                }
                                </style>';
            }
        } else {
            $sql = "SELECT * FROM critics_content WHERE art_type = '$aty';";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $content_id = $row['content_id'];
                $file_name = $row['content'];
                // $file_size = $row['file_size'];
                $file_type = $row['file_type'];
                // $file_path = $row['file_path'];
                $description = $row['description'];
                // $content_type = $row['art_type'];
                $file_path = "../../uploads/critics_content/" . $file_name;
                $user_id = $row['user_id'];
                $sql = "select * from users where user_id = '$user_id';";
                $result_inner = mysqli_query($conn, $sql);
                $nrow = mysqli_fetch_assoc($result_inner);

                $uploader_name = $nrow['name'];

                // Display the artwork on the webpage                    
                echo '
                              <section id="my_feed">
                              <div id="carding" class="discount__container container grid">
                                <div class="feed-card" data-content-id="' . $content_id . '">
                                  <div class="profile-picture">
                                    <img src="https://m.media-amazon.com/images/I/415MsdCcduL.png" alt="Profile Picture">
                                  </div>
                                  <div class="feed-content">
                                    <div class="username">';
                echo "<p>$uploader_name</p>";
                echo '</div>
                                    <div class="post-content">';
                echo "<p>$description</p>";
                echo '</div>
                                    <div class="post-image">';
                if (strpos($file_type, 'image/') === 0) {
                    echo "<img src='../../uploads/critics_content/" . $row['content'] . "'>";
                } else if (strpos($file_type, 'video/') === 0) {
                    echo "<video width='320' height='240' controls><source src='$file_path' type='$file_type'></video>";
                } else {
                    echo "<p>Unsupported file type: $file_type</p>";
                }
                echo '</div>
                                    <div class="like-comment">
                                        <div class="post-actions">
                                            <span class="post-comments"><i class="material-icons">stars</i>Review it!</span>
                                        </div>
                                        <form action="submit-review.php" method="post">
                                            <input type="hidden" name="content_id" value="' . $content_id . '">
                                            <div class="post-comments-section">
                                                <div>
                                                    <span class="star" ></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                </div>
                                                <div class="add-comment">
                                                    <input name="review" type="text" placeholder="Write the review">
                                                    <input id="star_index-input" name="star_index" type="hidden">
                                                    <button type="submit">Post</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              </section>';
                echo '<style>
                                #carding {
                                    border: none;
                                }
                                </style>';
            }
        }
        
        mysqli_close($conn);
        ?>



    </main>



    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">
                    <img src="../../assets/img/logo3.png" alt="" class="footer__logo-img">
                </a>

                <p class="footer__description"> Let your Art <br> Beautify the world.</p>

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
                                <a href="../../users/index.php" class="footer__link">Dive into Art</a>
                            </li>
                            <li>
                                <a href="../../users/index.php" class="footer__link">Dive into Music </a>
                            </li>
                            <li>
                                <a href="../../users/index.php" class="footer__link">Dive into Visual Treats</a>
                            </li>
                            <li>
                                <a href="../../users/index.php" class="footer__link">Dive into Literature</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <span class="footer__copy">&#169; ArtRise. All rigths reserved</span>

            </footer>
    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>
    <!--=============== SCROLL REVEAL ===============-->
    <script src="../../assets/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="../../assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <!-- <script src="../../assets/js/main.js"></script> -->
    <script src="logic.js"></script>

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