<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!doctype html>
<html lang="en-gb" class="no-js">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <title>Travii - About Page</title>
  <meta name="description" content="Traveller">

  <link rel="stylesheet" href="css/bootstrap.min.css" />
   
  <link href="font/css/font-awesome.min.css" rel="stylesheet">


  <!-- - favicon-->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- - custom css link -->
  <link rel="stylesheet" href="./css/style.css">

  <!-- - google font link-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Comforter+Brush&family=Heebo:wght@400;500;600;700&display=swap"
    rel="stylesheet">
</head>

<body>
 <?php include('includes/header.php'); ?>
 <!--/.header-->
       <!-- signup -->
       <?php include('includes/signup.php');?>     
      <!-- //signu -->
      <!-- signin -->
      <?php include('includes/signin.php');?>   
 <div id="#top"></div>

    <!-- 
        - #ABOUT
      -->



    <!-- Why choose us section-->
    <section class="about-container">
        <div class="about-section" style="margin:15vmin 0 0 0";>
            <div class="about-title"><span class="typo">Why Choose Us</span></div>

        </div>

        <div class="about-details-wrapper">
            <div class="about-cards">
                <div class="about-image-circle violet">
                    <img src="./assets/images/star.svg" alt="star" />
                </div>
                <div class="about-content-wrapper">
                    <div class="about-content">Handpicked Hotels</div>
                    <div class="about-para">
                        Lorem ipsum dolor sit amet, consect adipiscing elit. Aenean
                        commodo ligula eget dolor. Aenean massa
                    </div>
                </div>
            </div>
            <div class="about-cards">
                <div class="about-image-circle yellow">
                    <img src="./assets/images/world.svg" alt="world" />
                </div>
                <div class="about-content-wrapper">
                    <div class="about-content">World Class Service</div>
                    <div class="about-para">
                        Lorem ipsum dolor sit amet, consect adipiscing elit. Aenean
                        commodo ligula eget dolor. Aenean massa
                    </div>
                </div>
            </div>
            <div class="about-cards">
                <div class="about-image-circle orange">
                    <img src="./assets/images/thumbs up.svg" alt="thumbs up" />
                </div>
                <div class="about-content-wrapper">
                    <div class="about-content">Best Price Guarantee</div>
                    <div class="about-para">
                        Lorem ipsum dolor sit amet, consect adipiscing elit. Aenean
                        commodo ligula eget dolor. Aenean massa
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- contact form -->

    <section class="contact-container">
        <div class="contact-rectangle">
            <div class="image-circle">
                <img src="./assets/images/sendwithcirlce.svg" alt="send" />
            </div>
            <div class="contact-content">
                Subscribe to get information, latest news and other interesting offers
                at Travii
            </div>

            <div class="email-form">
                <input type="text" placeholder="Your email" />
                <button>Subscribe</button>
            </div>
        </div>
    </section>


  




    <?php include('includes/footer.php'); ?>

    <a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"> &nbsp;^</i></a>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


  <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.nav.js" type="text/javascript"></script> 
</body>
</html>
