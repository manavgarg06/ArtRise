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
                        <a href="../profile/index.php" class="nav__link">Profile</a>
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
            
            <section class="section category">
                <div class="profile-container">
                    <div class="profile-header">
                        <div class="profile-details">
                            <ul>
                            <i class="fa fa-shopping-cart" id="cart_icon" style="font-size:30px;"></i>
                            </ul>
                            <ul>
                                <li><a href="#" onclick="myPost()">Artworks Bought</a></li>
                                <li><a href="#" onclick="myLikes()">Artworks Sold</a></li>
                                <li><a href="#" onclick="myFav()">Artworks in market</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            
            <!--==================== DISCOUNT ====================-->
            <div id="my_posts">
                <section class="section category">
                    <h3 class="section__title">Artworks Bought</h3>
                </section>
                    <div id="store">
                    <!--==================== POST SECTION ====================-->
                        <?php
                            $user_id=$_SESSION['user_id'];
                            $sql="SELECT * from cart where buyer_id = '$user_id';";
                            $result=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_array($result))
                                {
                                  $file_type = $row['file_type'];
                                  echo '
                                  <section id="my_feed">
                                    <div id="carding" class="discount__container container grid">
                                        <div class="feed-card">
                                            <div class="feed-content">
                                                <div class="username">';
                                                    echo $row['seller'];
                                                echo '</div>
                                                <div class="post-content">';
                                                    echo $row['description'];
                                                echo '</div>
                                                <div class="post-image">';
                                                    if (strpos($file_type, 'image/') === 0) {
                                                    echo "<img src='../../uploads/critics_content/" . $row['content'] . "' style='max-height: 250px; max-width: 250px; margin: auto;'>";
                                                    } else if (strpos($file_type, 'video/') === 0) {
                                                    echo "<video width='250' max-height='200' controls><source src='../../uploads/critics_content/" . $row['content'] . "' type='$file_type'></video>";
                                                    }
                                                echo'                                     
                                                </div>
                                                <div style="color: white; font-weight: bolder;">
                                                    <br>';
                                                    echo 'Bought &nbsp; in &nbsp; &#8377;';
                                                    echo $row['cost'];
                                                    echo'
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </section>';
                                }
                            }
                        ?>                
                    </div>
                </div>

                <div id="my_likes">
                    <section class="section category">
                        <h3 class="section__title">Artworks Sold</h3>
                    </section>
                    <div id="store">
                    <!--==================== POST SECTION ====================-->
                        <?php
                            $user_id=$_SESSION['user_id'];
                            $sql="SELECT * from cart where seller_id = '$user_id';";
                            $result=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_array($result))
                                {
                                  $file_type = $row['file_type'];
                                  echo '
                                  <section id="my_feed">
                                    <div id="carding" class="discount__container container grid">
                                        <div class="feed-card">
                                            <div class="feed-content">
                                                <div class="username">';
                                                    echo $row['seller'];
                                                echo '</div>
                                                <div class="post-content">';
                                                    echo $row['description'];
                                                echo '</div>
                                                <div class="post-image">';
                                                    if (strpos($file_type, 'image/') === 0) {
                                                    echo "<img src='../../uploads/critics_content/" . $row['content'] . "' style='max-height: 250px; max-width: 250px; margin: auto;'>";
                                                    } else if (strpos($file_type, 'video/') === 0) {
                                                    echo "<video width='250' max-height='200' controls><source src='../../uploads/critics_content/" . $row['content'] . "' type='$file_type'></video>";
                                                    }
                                                echo'                                     
                                                </div>
                                                <div style="color: white; font-weight: bolder;">
                                                    <br>';
                                                    echo 'Sold &nbsp; in &nbsp; &#8377;';
                                                    echo $row['cost'];
                                                    echo'
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </section>';
                                }
                            }
                        ?>                
                    </div>
                </div>

                <div id="my_fav">
                    <section class="section category">
                        <h3 class="section__title">Artworks in market</h3>
                    </section>
                    <div id="store">
                    <!--==================== POST SECTION ====================-->
                        <?php
                            $user_id=$_SESSION['user_id'];
                            $sql="SELECT * from market where seller_id = '$user_id';";
                            $result=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_array($result))
                                {
                                  $file_type = $row['file_type'];
                                  echo '
                                  <section id="my_feed">
                                    <div id="carding" class="discount__container container grid">
                                        <div class="feed-card">
                                            <div class="feed-content">
                                                <div class="username">';
                                                    echo $row['seller'];
                                                echo '</div>
                                                <div class="post-content">';
                                                    echo $row['description'];
                                                echo '</div>
                                                <div class="post-image">';
                                                    if (strpos($file_type, 'image/') === 0) {
                                                    echo "<img src='../../uploads/critics_content/" . $row['content'] . "' style='max-height: 250px; max-width: 250px; margin: auto;'>";
                                                    } else if (strpos($file_type, 'video/') === 0) {
                                                    echo "<video width='250' max-height='200' controls><source src='../../uploads/critics_content/" . $row['content'] . "' type='$file_type'></video>";
                                                    }
                                                echo'                                     
                                                </div>
                                                <div style="color: white; font-weight: bolder;">
                                                    <br>';
                                                    echo 'Reserved &nbsp; price &nbsp; &#8377;';
                                                    echo $row['cost'];
                                                    echo'
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </section>';
                                }
                            }
                        ?>                
                    </div>
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
                                <a href="users/index.php" class="footer__link">Dive into Art</a>
                            </li>
                            <li>
                                <a href="users/index.php" class="footer__link">Dive into Music </a>
                            </li>
                            <li>
                                <a href="users/index.php" class="footer__link">Dive into Visual Treats</a>
                            </li>
                            <li>
                                <a href="users/index.php" class="footer__link">Dive into Literature</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <span class="footer__copy">&#169; ArtRise. All rigths reserved</span>

            </footer>
        
        <!--=============== MAIN JS ===============-->
        <script src="../../assets/js/main.js"></script>
        <script src="script.js"></script>
    </body>
</html>