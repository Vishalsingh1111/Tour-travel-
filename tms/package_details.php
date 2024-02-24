<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
{
	$pid=intval($_GET['pkgid']);
	$useremail=$_SESSION['login'];
	$fromdate=$_POST['fromdate'];
	$todate=$_POST['todate'];
	$comment=$_POST['comment'];
	$status=0;
	$sql="INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,Comment,status) VALUES(:pid,:useremail,:fromdate,:todate,:comment,:status)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':pid',$pid,PDO::PARAM_STR);
	$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
	$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
	$query->bindParam(':todate',$todate,PDO::PARAM_STR);
	$query->bindParam(':comment',$comment,PDO::PARAM_STR);
	$query->bindParam(':status',$status,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
		echo '<script>alert("Booked Scuccessfully . Thank you")</script>';
	}
	else 
	{
		echo '<script>alert("Something Went Wrong. Please try again")</script>';
	}

}
?>
<!doctype html>
<html lang="en-gb" class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>My Travel - Package details</title>
	<meta name="description" content="Traveller">

	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<!-- <link rel="stylesheet" href="css/styles.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
	<!-- Font Awesome -->

	 <!-- - favicon-->
	 <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

	<!--animate-->
	<link href="assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
	<link href="font/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<header class="header">
		<?php if($_SESSION['login'])
		{?>
			<div class="top-header">
				<div class="container">
					<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
						<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
						<li class="prnt"><a href="profile.php">My Profile</a></li>
						<li class="prnt"><a href="change_password.php">Change Password</a></li>
						<li class="prnt"><a href="tour_history.php">My Tour History</a></li>
					</ul>
					<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 
						<li class="tol">Welcome :</li>        
						<li class="sig"><?php echo htmlentities($_SESSION['login']);?></li> 
						<li class="sigi"><a href="logout.php" >/ Logout</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<?php 
		} else 
		{
			?>
			<div class="top-header">
				<div class="container">
					<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
						<li class="hm"><a href="admin/index.php">Admin Login</a></li>
					</ul>
					<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 
						<li class="tol">Toll Number : 123-4568790</li>        
						<li class="sig"><a href="#" data-toggle="modal" data-target="#myModal" >Sign Up</a></li> 
						<li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4" >&nbsp; Sign In</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<?php 
		}?>
		<div class="container">
			<nav class="navbar navbar-inverse" role="navigation">
				<div class="navbar-header adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
					<a href="index.php" class="navbar-brand scroll-top logo"><b>Travii</b></a>
					<button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!--/.navbar-header-->
				<div id="main-nav" class="collapse navbar-collapse adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
				<ul class="nav navbar-nav" id="mainNav">
 					<li ><a href="index.php" class="scroll-link">Home</a></li>
 					<li><a href="About.php" class="scroll-link">About</a></li>
 					<li><a href="Packages.php" class="scroll-link">Packages</a></li>
 					<li><a href="Blog.php" class="scroll-link">Blogs</a></li>
 					<li><a href="contact.php" class="scroll-link">Contact</a></li>
 				</ul>
				</div>
				<!--/.navbar-collapse-->
			</nav>
			<!--/.navbar-->
		</div>
		<!--/.container-->
	</header>
	<!--/.header-->
	<div id="#top"></div>

			 
	</section>

	<!--Package-->
	<section id="packages" class="secPad">
		<div class="container">
			
			<!--- selectroom ---->
			<div class="selectroom">
				<div class="container"> 
					<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
					else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
					<?php 
					$pid=intval($_GET['pkgid']);
					$sql = "SELECT * from tbltourpackages where PackageId=:pid";
					$query = $dbh->prepare($sql);
					$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=1;
					if($query->rowCount() > 0)
					{
						foreach($results as $result)
						{ 
							?>

<section id="home" class="wow fadeInLeft animated" data-wow-delay=".5s" style="text-align: center;margin-top:12vmin;" >
<h1 style="padding:10vmin 0 0 0"><p class="section-subtitle"><?php echo htmlentities($result->PackageName);?></p></h1>
				<p style="padding:2vmin auto;margin-bottom:6vmin;" >Get Every Package Related Information Here and Book Interest Trip</p>

				
  <div style="display: inline-block; position: relative; margin: 0 auto; text-align: center;">
    <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" style="width: 95%; max-width: 100%; height: auto;margin: 0 auto; border:2px solid #999;padding:5vmin;" alt="banner" />
  
  </div>
</section>


							<div>
								<div class="  wow fadeInRight animated" style="padding:8vmin 6vmin 3vmin 6vmin;border-bottom:1px solid black;"data-wow-delay=".5s">
									<h2 style="padding:0 0 1.5vmin 0"><?php echo htmlentities($result->PackageName);?></h2>
									<p><b>PKG No :</b> <?php echo htmlentities($result->PackageId);?></p>
									<p><b>Package Duration :</b> <?php echo htmlentities($result->PackageType);?></p>
									<p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
									<p><b>Features</b> <?php echo htmlentities($result->PackageFetures);?></p>
									<div class="Price">
										<p>
										<h2 style="color:red"> $ <?php echo htmlentities($result->PackagePrice);?></h2></p>
										
										
									</div>
									<p style="padding:0vmin 0 0vmin 0"><b>Last Update:</b> <?php echo htmlentities($result->UpdationDate);?></p>
									</div>
						</div>
								</div>
								
							
								
								
							
								<div style="width:90%;margin:0 auto;">
									<p class="text-center"><h3 style="font-size:5vmin;color:green;margin:8vmin 0 5vmin 0;">Package Overview and Summary</h3>
									<?php echo htmlentities($result->PackageDetails);?></p>
								 
								 <h4 class="text-center" style="font-size:3vmin;">Tour and Services ends !</h4>
								 </div>
								 
								 
							</div>


<!-- Booking Details Heading -->

							<div class="heading" style="border:1px solid #999;margin:20vmin auto;width:80%;">
				
				<h1 align="center" style="margin:5vmin;"><p class="section-subtitle animated wow fadeInUp animated" >Book Above Trip</p></h1>
			    <!-- </div> -->
							<form name="book" method="post">							
								<div class="">
									<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">
										<div class="ban-bottom" style="padding:14vmin 4vmin 1vmin 4vmin" >
											<div class=" col-md-6 mr-2 ">
												<label class="inputLabel">From Date</label>
												<input class="form-control" id="datepicker" type="date" placeholder="dd-mm-yyyy"  name="fromdate" required="">
											</div>
											<div class=" col-md-6">
												<label class="inputLabel">To Date</label>
												<input class="form-control" id="datepicker1" type="date" placeholder="dd-mm-yyyy" name="todate" required="">
											</div>
										</div>
										<ul style="padding:1vmin 6vmin 8vmin 6vmin" >

											<li class="spe" style="padding-bottom:4vmin">
												<label class="inputLabel">Comment</label>
												<textarea  class="form-control" rows="4" cols="4" type="text" name="comment" required=""></textarea>
											</li>
											<?php if($_SESSION['login'])
											{?>
												<li class="spe" align="center">
													<button type="submit" name="submit2" class="btn-primary btn">Book</button>
												</li>
												<?php 
											} else {?>
												<li class="sigi" align="center" style="margin-top: 1%">
													<a href="#" data-toggle="modal" data-target="#myModal4"  class="btn-primary btn" > Book Now</a>
												</li>
												<?php
											} ?>
											<div class="clearfix"></div>
										</ul>
									</div>
								</div>
										</div>
							</form>
							<?php 
						}
					} ?>
				</div>
			</div>
			<!--- /selectroom ---->
		</div>
	</section>




<!----------------- recent Tours -->

<section class="section popular">
        <div class="container">

          <p class="section-subtitle wow fadeInLeft animated" data-wow-delay=".5s" style="padding: 7vmin 3vmin 10vmin 3vmin">Upcoming Tours</p>

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
              <p><b>Type :</b> <?php echo htmlentities($result->PackageType);?></p>
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
		  <div style="margin: 8rem 0 5vmin 45%;">
          <a href="Packages.php" class="btn btn-primary " >Learn More</a>
          </div>
        </div>
      </section>


	  <a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"> &nbsp;^</i></a>
	<?php include('includes/footer.php');?>
	<!-- signup -->
	<?php include('includes/signup.php');?>     
	<!-- //signu -->
	<!-- signin -->
	<?php include('includes/signin.php');?>     
	<!-- //signin -->
	<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.nav.js" type="text/javascript"></script> 

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
