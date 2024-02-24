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

  <title>My Travel - my memory</title>
  <meta name="description" content="Traveller">
  <meta name="author" content="WebThemez">

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <!-- Font Awesome -->
  <!--animate-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
  <link href="font/css/font-awesome.min.css" rel="stylesheet">


  <!-- - favicon-->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- - custom css link -->
  <!-- <link rel="stylesheet" href="./css/style.css"> -->

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




<!----------------- recent Tours -->

<section class="section popular">
        <div class="container">

          <p class="section-subtitle wow fadeInLeft animated" data-wow-delay=".5s" style="padding: 7vmin 3vmin 5vmin 3vmin">Upcoming Tours</p>

          <h2 class="h2 section-title wow fadeInLeft animated" data-wow-delay=".5s">Booking Started</h2>

          <ul class="popular-list">

          <?php
      $sql = "SELECT * FROM tbltourpackages ORDER BY PackageId DESC LIMIT 5";
      $query = $dbh->prepare($sql);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);

      if ($query->rowCount() > 0) {
        foreach ($results as $result) {
      ?>
            
            <li>
            <div class="popular-card"style="width:43vmin;height:70vmin; justify-content:space-between;">

                <figure class="card-banner wow fadeInLeft animated" data-wow-delay=".5s">
                 
                    <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" width="740" height="518" loading="lazy"
                      alt="image" class="img-cover">
                  
                  

                  <span class="card-badge wow fadeInLeft animated" data-wow-delay=".5s">
                    <ion-icon name="time-outline"></ion-icon>
                    <time>
                    <?php
                    $date = new DateTime($result->Creationdate);
                    echo $date->format('d M'); 
                    ?>
                </time>
                  </span>
                </figure>

                <div class="card-content wow fadeInLeft animated" data-wow-delay=".5s">

                  <div class="card-wrapper">
                    <div class="card-price">
                      <h5> $ <?php echo htmlentities($result->PackagePrice);?></h5>
                    </div>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star-outline"></ion-icon>

                      <data value="2">(2)</data>
                    </div>
                  </div>

                  <div class=" wow fadeInUp animated" data-wow-delay=".5s" style="padding: 3vmin 0 1vmin 0">
              <h4 style="padding-bottom:1vmin;"><b>Title:</b> <?php echo htmlentities($result->PackageName);?></h4>
              <p><b>Duration :</b> <?php echo htmlentities($result->PackageType);?></p>
              <p><b>Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
              <p><b>Features</b> <?php echo htmlentities($result->PackageFetures);?></p>
            </div>
            <div class="wow fadeInRight animated" data-wow-delay=".5s">
<a href="package_details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="view" 
style="padding:1vmin 2vmin; background-color:hsla(198, 87%, 30%, 0.775);;width: max-content;border-radius:1vmin;color:white;">Details</a>
</div>
            
              
                </div>

              </div>
            </li>
            <?php
        }
      }
      ?>
          </ul>
        </div>
        <div style="margin: 8rem 0 5vmin 45%;">
          <a href="Packages.php" class="btn btn-primary " >Learn More</a>
          </div>
      </section>








<!----------------- Popular Tours -->


<section class="section popular">
        <div class="container">

          <p class="section-subtitle wow fadeInLeft animated" data-wow-delay=".5s" style="padding: 1vmin 3vmin 1vmin 3vmin">Available Tours</p>

          <h2 class="h2 section-title wow fadeInLeft animated" data-wow-delay=".5s">Most Popular Tours</h2>

          <ul class="popular-list">

            <?php $sql = "SELECT * from tbltourpackages order by rand() ";
      $query = $dbh->prepare($sql);
      $query->execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);
      $cnt=1;
      if($query->rowCount() > 0)
      {
        foreach($results as $result)
        { 
          ?>
            
            <li>
            <div class="popular-card"style="width:43vmin;height:70vmin; justify-content:space-between;">

                <figure class="card-banner wow fadeInLeft animated" data-wow-delay=".5s">
         
                    <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" width="740" height="518" loading="lazy"
                      alt="image" class="img-cover">
                  
              

                  <span class="card-badge wow fadeInLeft animated" data-wow-delay=".5s">
                    <ion-icon name="time-outline"></ion-icon>
                    <time>
                    <?php
                    $date = new DateTime($result->Creationdate);
                    echo $date->format('d M'); 
                    ?>
                </time>

                  </span>
                </figure>

                <div class="card-content wow fadeInLeft animated" data-wow-delay=".5s">

                  <div class="card-wrapper">
                    <div class="card-price">
                      <h5> $ <?php echo htmlentities($result->PackagePrice);?></h5>
                    </div>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star-outline"></ion-icon>

                      <data value="2">(2)</data>
                    </div>
                  </div>

                  <div class=" wow fadeInUp animated" data-wow-delay=".5s" style="padding: 3vmin 0 1vmin 0">
              <h4 style="padding-bottom:1vmin;"><b>Title:</b> <?php echo htmlentities($result->PackageName);?></h4>
              <p><b>Duration :</b> <?php echo htmlentities($result->PackageType);?></p>
              <p><b>Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
              <p><b>Features</b> <?php echo htmlentities($result->PackageFetures);?></p>
            </div>
            <div class="wow fadeInRight animated" data-wow-delay=".5s">
<a href="package_details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="view" 
style="padding:1vmin 2vmin; background-color:hsla(198, 87%, 30%, 0.775);;width: max-content;border-radius:1vmin;color:white;">Details</a>
</div>
            
              
                </div>

              </div>
            </li>
            <?php 
                $cnt++;
        }
      } ?>
          </ul>
          <div style="margin: 8rem 0 5vmin 45%;">
          <a href="Packages.php" class="btn btn-primary " >Learn More</a>
          </div>
        </div>
      </section>








 <!-- Bookings session -->
 <section class="booking-container" style="margin-bottom:10vmin;">
        <div class="booking-section">

          <div class=" booking-left">
            <div>

              <div class="title left wow fadeInLeft animated" data-wow-delay=".5s">
                Book your next trip <br />
                in 3 easy steps
              </div>
              <div class="list-container wow fadeInLeft animated" data-wow-delay=".5s">
                <img src="./assets/images/Destination.svg" class="book-icons" />
                <div>
                  <div class="item-name wow fadeInLeft animated" data-wow-delay=".5s">Choose Destination</div>
                  <div class="item-description wow fadeInUp animated" data-wow-delay=".5s">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Urna,
                    tortor tempus.
                  </div>
                </div>
              </div>
              <div class="list-container wow fadeInLeft animated" data-wow-delay=".5s">
                <img src="./assets/images/Payment.svg" class="book-icons" />
                <div>
                  <div class="item-name wow fadeInLeft animated" data-wow-delay=".5s">Make Payment</div>
                  <div class="item-description wow fadeInUp animated" data-wow-delay=".5s">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Urna,
                    tortor tempus.
                  </div>
                </div>
              </div>
              <div class="list-container wow fadeInLeft animated" data-wow-delay=".5s">
                <img src="./assets/images/Selected Date.svg" class="book-icons" />
                <div>
                  <div class="item-name wow fadeInLeft animated" data-wow-delay=".5s">Reach Airport on Selected Date</div>
                  <div class="item-description wow fadeInUp animated" data-wow-delay=".5s">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Urna,
                    tortor tempus.
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="booking-right" >
           <div class="box wow fadeInRight animated" data-wow-delay=".5s">
           <div>
            <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>"width="365" height="320" style="margin-top:4vmin;border-radius:2vmin;" class="booking-image wow fadeInRight animated" data-wow-delay=".5s" />
            <div class="box-details">
                <div class="place-name wow fadeInRight animated" data-wow-delay=".5s"><?php echo htmlentities($result->PackageName); ?></div>
                <div class="reviewer">
                    <div class="reviewer-details wow fadeInRight animated" data-wow-delay=".5s">
                    <?php
                    $date = new DateTime($result->Creationdate);
                    echo $date->format('d M'); 
                    ?>
                    </div>
                    <div class="line"></div>
                    <div class="reviewer-details wow fadeInRight animated" data-wow-delay=".5s">
                     Price:  $ <?php echo htmlentities($result->PackagePrice);?>
                    </div>
                </div>
                <div class="icon-container wow fadeInRight animated" data-wow-delay=".5s">
                    <div class="circle">
                    <a href="package_details.php?pkgid=<?php echo htmlentities($result->PackageId);?>">
                        <img src="./assets/images/leaf.svg" alt="leaf" />
                        </a>
                    </div>
                    <div class="circle">
                    <a href="package_details.php?pkgid=<?php echo htmlentities($result->PackageId);?>">
                        <img  src="./assets/images/map.svg" alt="map" />
                        </a>
                    </div>
                    <div class="circle">
                    <a href="package_details.php?pkgid=<?php echo htmlentities($result->PackageId);?>">
                   <img src="./assets/images/send.svg" alt="send" />
                    </a>
                    </div>

                </div>
                <div class="on-going">
                    <div class="on-going-container">
                        <img src="./assets/images/building.svg" class="building-icon" alt="building-icon" />
                        <div class="reviewer-details wow fadeInUp animated" style="font-size:1.5vmin;" data-wow-delay=".5s">
                        <?php echo htmlentities($result->PackageType);?>
                        </div>
                    </div>
                    <img src="./assets/images/heart (6) 1.svg" alt="heart" class="icon-heart wow fadeInUp animated" data-wow-delay=".5s" />
                </div>
            </div>
        </div>
    </div>

    <div class="background-circle-violet"></div>
    
</div>


          
        </div>
      </section>
 


      <!-- signup -->
      <?php include('includes/signup.php');?>     
      <!-- //signu -->
      <!-- signin -->
      <?php include('includes/signin.php');?>   

<?php include('includes/footer.php'); ?>

<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"> &nbsp;^</i></a>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


  <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.nav.js" type="text/javascript"></script> 
</body>
</html>
