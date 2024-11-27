<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== SWIPER CSS ===============--> 
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Care Guides</title>
    <link rel="stylesheet" href="css/home.css">
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
   
   <style>
    /* para hide */
    /* Hide the user icon */
    .header .header-2 .flex .icons .fas.fa-user {
        display: none; /* This hides the user icon */
    }
    
    /* Hide the user box */
    .header .header-2 .flex .user-box {
        display: none; /* This hides the user box */
    }
   </style>
</head>
<body>  
    <?php include 'header.php'; ?>

    <section class="new section container" id="new">
        <!-- <h2 class="section__title">
            CARE GUIDES
        </h2> -->

        <!-- <center><h2>CARE GUIDES</h2></center> -->
        <br>
        <div class="new__container">
            <div class="swiper new-swiper">
                <div class="swiper-wrapper">
                    <article class="new__card swiper-slide">
                        <span class="new__tag">betta fish</span>

                        <img src="assets/img/betta-3.jpg" alt="" class="new__img">

                      
                        <a href="cbetta.php" class="button new__button">care guides</a>
                    </article>

                    <article class="new__card swiper-slide">
                        <span class="new__tag">gold fish</span>

                        <img src="assets/img/goldfish-removebg-preview.png" alt="" class="new__img">

                        <a href="cgoldfish.php" class="button new__button">care guides</a>
                    </article>

                    <article class="new__card swiper-slide">
                        <span class="new__tag">guppy fish</span>

                        <img src="assets/img/GUPPY_GO-removebg-preview.png" alt="" class="new__img">

                   
                        <a href="cguppy.php" class="button new__button">care guides</a>
                    </article>

                    <article class="new__card swiper-slide">
                        <span class="new__tag">koi fish</span>

                        <img src="assets/img/koi.jpg" alt="" class="new__img">

                        <a href="ckoi.php" class="button new__button">care guides</a>
                    </article>                       
                </div>
            </div>
        </div>
    </section>

    <div id="guideText"></div>

    <a href="#" class="scrollup" id="scroll-up"> 
        <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
    </a>
    
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
