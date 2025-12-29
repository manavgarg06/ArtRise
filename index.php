<?php
    session_start();
    include "db_connect.php";
    if(isset($_SESSION['critics_id'])) {
      header('location: critics/homepage/index.php');
    }
    else if(isset($_SESSION['user_id'])) {
        header('location: users/homepage/index.php');
    }
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="assets/img/logo1.png" type="image/x-icon">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--=============== SWIPER CSS ===============--> 
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

        <!--=============== CSS ===============--> 
        <link rel="stylesheet" href="assets/css/styles.css">

        <title>ArtRise</title>
    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">
                    <img src="assets/img/logo1.png" alt="" class="nav__logo-img">
                    ArtRise
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <a href="users" class="button button--ghost">Login</a>
                    </ul>

                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x'></i>
                    </div>

                    <img src="assets/img/nav-img.png" alt="" class="nav__img">
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>

            </nav>
        </header>

        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home container" id="home">
                <div class="swiper home-swiper">
                    <div class="swiper-wrapper">
                        <!-- HOME SLIDER 1 -->
                        <section class="swiper-slide">
                            <div class="home__content grid">
                                <div class="home__group">
                                    <img src="assets/img/img1.jpg" alt="" class="home__img">
                                    <div class="home__indicator"></div>
    
                                    <div class="home__details-img">
                                        <h4 class="home__details-title">Zainab</h4>
                                        <span class="home__details-subtitle">Trapped by reality, freed by imagination.</span>
                                    </div>
                                </div>
    
                                <div class="home__data">
                                    <h3 class="home__subtitle">#1 Top Rated in Art</h3>
                                    <h1 class="home__title">UOOOO <br> TRICK OR <br> TREAT!!</h1>
                                    <p class="home__description">This painting is a personification of my situation, which is why I captioned it 'Trapped by reality, freed by imagination.' For me art, be it sketching or painting, has always been therapeutic, more so during this lockdown.
                                    </p>

                                    <div class="home__buttons">
                                        <a href="users/index.php" class="button">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- HOME SLIDER 2 -->
                        <section class="swiper-slide">
                            <div class="home__content grid">
                                <div class="home__group">
                                    <img src="assets/img/img3.jpg" alt="" class="home__img">
                                    <div class="home__indicator"></div>
    
                                    <div class="home__details-img">
                                        <h4 class="home__details-title">Photo by M Venter</h4>
                                        <span class="home__details-subtitle">No words can describe them</span>
                                    </div>
                                </div>
    
                                <div class="home__data">
                                    <h3 class="home__subtitle">#2 Top rated in Art</h3>
                                    <h1 class="home__title">BRING BACK <br> MY COTTON <br> CANDY</h1>
                                    <p class="home__description">Person Sitting on Mountain Cliff.

                                    </p>

                                    <div class="home__buttons">
                                        <a href="users/index.php" class="button">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- HOME SLIDER 3 -->
                        <section class="swiper-slide">
                            <div class="home__content grid">
                                <div class="home__group">
                                    <img src="assets/img/img4.jpg" alt="" class="home__img">
                                    <div class="home__indicator"></div>
    
                                    <div class="home__details-img">
                                        <h4 class="home__details-title">Pagoda Tower</h4>
                                        <span class="home__details-subtitle">Religious place</span>
                                    </div>
                                </div>
    
                                <div class="home__data">
                                    <h3 class="home__subtitle">#3 Top Rated in Art</h3>
                                    <h1 class="home__title">HABIBI <br> COME TO <br> DUBAI</h1>
                                    <p class="home__description">Pagoda Towers were originally used as a place for religious ceremonies, worship, and meditation, but today they are also used for secular purposes such as landmarks or as tourist attractions.
                                    </p>

                                    <div class="home__buttons">
                                        <a href="users/index.php" class="button">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
            
            <!--==================== CATEGORY ====================-->
            <section class="section category">
                <h2 class="section__title">Favorite Art <br> Category</h2>

                <div class="category__container container grid">
                    <div class="category__data">
                    <a href="users/index.php">
                        <img src="src/drawing.jpg" alt="" class="category__img">
                        <h3 class="category__title">Paintings</h3>
                        <p class="category__description" style="color: white;">Paintings which touches your heart</p>
                    </a>
                    </div>

                    <div class="category__data">
                    <a href="users/index.php">
                        <img src="src/music.jpg" alt="" class="category__img">
                        <h3 class="category__title">Music</h3>
                        <p class="category__description" style="color: white;">Pick your daily drive</p>
                    </a>
                    </div>

                    <div class="category__data">
                    <a href="users/index.php">
                        <img src="src/visual.jpg" alt="" class="category__img">
                        <h3 class="category__title">Visual</h3>
                        <p class="category__description" style="color: white;">Enjoy the shorts</p>
                    </a>
                    </div>
                </div>
            </section>

            <!--==================== ABOUT ====================-->
            <section class="section about" id="about">
                <div class="about__container container grid">
                    <div class="about__data">
                        <h2 class="section__title about__title">About ArtRise</h2>
                        <p class="about__description">At ArtRise, we're passionate about promoting emerging artists and helping them gain the recognition they deserve. We believe that art has the power to inspire, challenge, and transform, and we're excited to be a part of that journey.
                        </p>
                        <a href="#" class="button">Know more</a>
                    </div>

                    <img src="assets/img/img8.png" alt="" class="about__img">
                </div>
            </section>


            <!--==================== OUR NEWSLETTER ====================-->
            <section class="section newsletter">
                <div class="newsletter__container container">
                    <h2 class="section__title">Our Newsletter</h2>
                    <p class="newsletter__description">
                        Promotion new products and sales. Directly to your inbox
                    </p>

                    <form action="" class="newsletter__form">
                        <input type="text" placeholder="Enter your email" class="newsletter__input">
                        <button class="button">
                            Subscribe
                        </button>
                    </form>
                </div>
            </section>
        </main>

        <!--==================== FOOTER ====================-->
            <footer class="footer section">
                <div class="footer__container container grid">
                    <div class="footer__content">
                        <a href="#" class="footer__logo">
                            <img src="assets/img/logo1.png" alt="" class="footer__logo-img">
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

            <!--=============== SCROLL UP ===============-->
            <a href="#" class="scrollup" id="scroll-up">
                <i class='bx bx-up-arrow-alt scrollup__icon'></i>
            </a>
        
        <!--=============== SCROLL REVEAL ===============-->
        <script src="assets/js/scrollreveal.min.js"></script>

        <!--=============== SWIPER JS ===============-->
        <script src="assets/js/swiper-bundle.min.js"></script>
        
        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
    </body>
</html>