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

	<title>My Travel - Blog details</title>
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
								</div>
								
							
								
								
							
								<div style="width:90%;margin:0 auto 10vmin;">
									<p class="text-center"><h3 style="font-size:8vmin;color:green;margin:20vmin 0 8vmin 0;text-align: center">
                                    <?php echo htmlentities($result->PackageName);?></h3>
                                    
                                    <div style="display: inline-block; position: relative; margin: 0 auto; text-align: center;">
                                     <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" 
                                     style="width: 95%; max-width: 100%; height: auto;margin: 0 auto; border:2px solid #999;padding:5vmin;" alt="banner" />
                                     <p style="padding:1vmin 0 3vmin 0"><b>Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
                                     </div>
                                    <p style="padding:8vmin 0 1vmin 0"><b>Publish:</b>  
                                    <?php $date = new DateTime($result->Creationdate);echo $date->format('d M');
                                ?>
                                </p>
									<?php echo htmlentities($result->PackageDetails);?></p>
								 
								 <h4 class="text-center" style="font-size:4vmin; padding:2vmin 0">Thank You 🙏🏻</h4>
                                 
								 </div>
								 
								 
							</div>						 
						<?php 
						}
					} ?>
				</div>
			</div>
			<!--- /selectroom ---->
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
