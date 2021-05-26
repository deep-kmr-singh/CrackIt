<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
	$_SESSION['username'] = $username;
	$_SESSION['msg'] = "You must log in first";
  	header('location: ../student/dashboard.php');
  }
  if (isset($_GET['logout'])) {
  	unset($_SESSION['username']);
	session_destroy();  	
  	header("location: ../registration/login.php");
  }
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title> Student | Dashboard </title>
		
		<link rel="icon" href="../images/icon.png"> 
		
		<link rel="stylesheet" href="dashboard.css">
		<link 
			rel="stylesheet" 
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
		
		<script 
			src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" 
			charset="utf-8"> 
		</script>
	</head>
  
	<body>
		<input type="checkbox" id="check">
	
		<!--header area start-->
		<header>
			<div class="left_area">
				<h3>Crack<span>It</span></h3>
			</div>
      
			<div class="right_area">
				<p> 
					<a href="../pre_pay/pay.php" class="logout_btn"> Upgrade to Premimum Account </a> 
				</p>
			</div>
		</header>
		<!--header area end-->
		
		<!--sidebar start-->
		<div class="sidebar">
			<div class="profile_info">
				<img src="../images/profile_pic.jpg" class="profile_image" alt="Profile Pic">
				<?php  if (isset($_SESSION['username'])) : ?>
					<p>
						Welcome <strong>
									<?php echo $_SESSION['username']; ?>
								</strong>
					</p>
				<?php endif ?>
			</div>
      
			<a href="dashboard.php"> 
					<i class="fas fa-desktop"> </i> 
					<span> My Courses </span> 
			</a>
				
			<a href="../add_pay/pay.php"> 
				<i class="fas fa-shopping-cart"> </i> 
				<span> Buy New Course </span> 
			</a>
				
			<a href="browse_course.php"> 
				<i class="fas fa-table"> </i> 
				<span> Browse Courses </span> 
			</a>
				
			<a href="account_setting.php"> 
				<i class="fas fa-sliders-h"> </i> 
				<span> Account Settings </span> 
			</a>
				
			<a href="../instructor/dashboard.php"> 
				<i class="fas fa-user-alt"> </i> 
				<span> Switch to Instructor Mode </span> 
			</a>
			
			<a href="../registration/login.php"> 
				<i class="fas fa-user-alt"> </i> 
				<span> LogOut </span> 
			</a>
		</div>
		<!--sidebar end-->

		<!-- Content to display -->
		<div class="content">
			<div class="container mt-3 mb-3">
			<h1>
				<b> Course Display </b>
			</h1>
		
			<div class="row">
				<?php
					$conn = mysqli_connect("localhost","root","","database");
					
					$q = "SELECT * FROM videos";
					$query = mysqli_query($conn,$q);
					while($row=mysqli_fetch_array($query)) { 
						$name = $row['name'];
						?>
						<div class="col-md-4">
							<video width="100%" controls>
								<source src="<?php echo 'upload/'.$name;?>">
							</video>
						</div>
					<?php }
				?>
			</div>
		</div>
		</div>
		<!-- Content to display -->
		
		<script type="text/javascript">
			$(document).ready(function(){
				$('.nav_btn').click(function(){
					$('.mobile_nav_items').toggleClass('active');
				});
			});
		</script>

	</body>
</html>