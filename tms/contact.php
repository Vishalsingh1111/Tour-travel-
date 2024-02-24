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

  <title>Travii - Contact</title>
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
 <div id="#top"></div>


<!--Contact -->
<section style="background:#fff;" id="cont">
<div class="heading text-center">
        <!-- Heading -->
        <h2  class="section-subtitle" style="color:#000;padding: 17vmin 3vmin 5vmin 3vmin;">Let's Keep In Touch!</h2>
        <p style="color:#000;">Thank You for visiting. If you would like to get into contact with Us, please fill out the form below.</p>
      </div>
  <div class="container" style="margin-bottom:10vmin;background:#e1e1e1;">
    <div class="row">
    
    </div>
    <div class="row mrgn30" style="color:green;">
      <div class="col-sm-10 col-md-8">
        <!--NOTE: Update your email Id in "contact_me.php" file in order to receive emails from your contact form-->
        <form name="sentMessage" id="contactForm"  validate>
          <h3 style="padding: 2vmin 0vmin 3vmin 0vmin;">Contact Form</h3>
          <div class="control-group">
            <div class="controls">
              <input type="text" class="form-control" 
              placeholder="Full Name" id="name" required
              data-validation-required-message="Please enter your name" />
              <p class="help-block"></p>
            </div>
          </div> 	
          <div class="control-group" style="margin-bottom: 8px;">
            <div class="controls">
              <input type="email" class="form-control" placeholder="Email" 
              id="email" required
              data-validation-required-message="Please enter your email" />
            </div>
          </div> 	

          <div class="control-group" style="margin-bottom: 8px;">
            <div class="controls">
              <textarea rows="10" cols="100" class="form-control" 
              placeholder="Message" id="message" required
              data-validation-required-message="Please enter your message" minlength="5" 
              data-validation-minlength-message="Min 5 characters" 
              maxlength="999" style="resize:none"></textarea>
            </div>
          </div> 		 
          <div id="success"> </div> <!-- For success/fail messages -->
         
        </form>
        <button type="submit" class="btn btn-primary text-centre" style="margin:3vmin auto">Send</button><br />
      </div> 

      <!-- signup -->
      <?php include('includes/signup.php');?>     
      <!-- //signu -->
      <!-- signin -->
      <?php include('includes/signin.php');?>     
      <!-- //signin -->
      <div class="col-sm-12 col-md-4">
        <h3 style="padding: 2vmin 0vmin 3vmin 0vmin;">Address:</h3>
        <address style="color:#000;">
          Travii Tour & Travel Company<br>
          Patna, Bihar 80023 <br>
          Bihar India.
          <br>
        </address>
        <h4 style="color:#000;padding: 2vmin 0vmin 1vmin 0vmin;">Phone:</h4>
        <address>
        1234-5678-90<br>
        </address>
      </div>
    </div>
  </div>
  <!--/.container-->
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
