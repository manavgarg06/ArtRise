<?php
    session_start();
    include "../../db_connect.php";
    if(!isset($_SESSION['user_id'])) {
      header('location: ../index.php');
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the file and its details
        $file = $_FILES['file'];
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_tmp = $file['tmp_name'];
        $file_type = $file['type'];

    // Get the description and content type
    $description = $_POST['description'];
    $content_type = $_POST['select'];
    $uploader = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];

    // Check if the file was uploaded successfully
    if (isset($file_name) && $file_name != '') {
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_exts = array('jpg', 'jpeg', 'png', 'mp4');

        if (in_array($file_ext, $allowed_exts)) {
            // Create a unique file name and move the file to the server
            $file_new_name = uniqid() . '.' . $file_ext;
            $file_destination = '../../uploads/critics_content/' . $file_new_name;
            move_uploaded_file($file_tmp, $file_destination);
            $sql = "INSERT INTO critics_content (content, user_id, file_type, description, art_type)
                        VALUES ('$file_new_name','$uploader', '$file_type', '$description', '$content_type')";
                mysqli_query($conn, $sql);
                $new_id = mysqli_insert_id($conn); // retrieve the auto-generated ID
                $sql = "INSERT INTO uploads (user_id, content_id)
                        VALUES ($uploader, $new_id)";
                mysqli_query($conn, $sql);
                echo "File uploaded successfully. New ID is: " . $new_id;
                if (isset($_POST["sell"]) && $_POST["sell"] == "yes") {
                    $cost = $_POST['cost'];
                    $sql = "INSERT INTO market (content_id, seller_id, content, seller, file_type, description, art_type, cost)
                    VALUES ('$new_id', '$uploader', '$file_new_name', '$user_name', '$file_type', '$description', '$content_type', '$cost')";
                    mysqli_query($conn, $sql);
                }
                mysqli_close($conn);
                header('location: ../profile/index.php');
            } else {
                echo "Invalid file type.";
            }
        } else {
            echo "Please select a file to upload.";
        }
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
                            <a href="../homepage/index.php" class="nav__link">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="../market/index.php" class="nav__link">Market</a>
                        </li>
                        <li class="nav__item">
                            <a href="../profile" class="nav__link">Profile</a>
                        </li>
                        <a href="../post_feed" class="button button--ghost active-link">+ Post</a>
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
        <!--==================== CATEGORY ====================-->
        <main class="main">
            <section class="section category">
                <form action="#" method="post" enctype="multipart/form-data">
                    <label for="file">Choose art file:</label>
                    <input type="file" id="file" name="file" accept=".mp4,.jpg,.png,.jpeg">
                    <label id="writing" for="description">Describe your artwork:</label>
                    <textarea placeholder="What's on your mind? Reflect upon your artwork here!!" name="description" id="description"></textarea>
                    <br>
                    <div id="selectedd">
                        <label for="select">Choose Content type:</label>
                        <select class="format" name="select" id="selecteds">
                            <option value="writing">Literary Arts</option>
                            <option value="art">Art/Drawing</option>
                            <option value="music">Music</option>
                            <option value="visarts">Visual Arts</option>
                        </select>
                    </div>
                    <br>
                    <p>Do you want to put this artwork on sell?</p>
                    <label><input type="radio" name="sell" value="yes" required>Yes</label>
                    <label><input type="radio" name="sell" value="no" required>No</label>
                    <div id="cost-field" style="display: none;">
                        <label for="cost">Cost:</label>
                        <input type="number" id="cost" name="cost">
                    </div>
                    <br>
                    <button>POST</button>
                </form>
            </section>
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
    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>
    <!--=============== SCROLL REVEAL ===============-->
    <script src="../../assets/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="../../assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="../../assets/js/main.js"></script>
    <script src="logic.js"></script>
    <script>
        const sellYesRadio = document.querySelector('input[value="yes"]');
        const sellNoRadio = document.querySelector('input[value="no"]');
        const costField = document.querySelector('#cost-field');

        sellYesRadio.addEventListener('change', () => {
            if (sellYesRadio.checked) {
            costField.style.display = 'block';
            } else {
            costField.style.display = 'none';
            }
        });

        sellNoRadio.addEventListener('change', () => {
            if (sellNoRadio.checked) {
            costField.style.display = 'none';
            } else {
            costField.style.display = 'block';
            }
        });
    </script>
</body>

</html>