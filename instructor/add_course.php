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

<?php 
	$conn = mysqli_connect("localhost","root","","database");

	if (isset($_POST['upload'])) {
		$file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];	
		$temp_name = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_destination = "upload/".$file_name;
		
		if (move_uploaded_file($temp_name,$file_destination)) { 
			$q = "INSERT INTO videos (name) VALUES ('$file_name')";
			if(mysqli_query($conn,$q)) {
				$success = "Video uploaded successfully.";
			}
			else {	
				$failed = "Something went wrong??";
			}
		}
		else {
			$msz = "Please select a video to upload..!";
		}
	}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title> Instructor | ADD Course </title>
		
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
				<a href="="../student/login.php" class="logout_btn"> LogOut </a>
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
					<span> Home </span> 
			</a>
				
			<a href="add_course.php"> 
				<i class="fa fa-plus"> </i> 
				<span> Add New Course </span>
			</a>
			
			<a href="add_note.php"> 
				<i class="far fa-sticky-note"> </i> 
				<span> Add Note </span> 
			</a>
			
			<a href="../student/dashboard.php"> 
				<i class="fas fa-user-alt"> </i> 
				<span> Switch to Student Mode </span> 
			</a>
		</div>
		<!--sidebar end-->

		<!-- Content to display -->
		<div class="content">
			<div class="container mt-3">
				<h1 class="text-center mb-5">
					<b> Add New Course </b>
				</h1>
				
				<div class="col-lg-8 m-auto">
					<form action="add_course.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>
								<strong> Upload a Video: </strong>
							</label>
							<input type="file" name="file" class="form-control">
						</div>
						
						<?php if(isset($success)) { ?>
							<div class="alert alert-success">
								<?php echo $success;?>
							</div>
						<?php } ?>
						
						<?php if(isset($failed)) { ?>
							<div class="alert alert-danger">
								<?php echo $failed;?>
							</div>
						<?php } ?>

						<?php if(isset($msz)) { ?>
							<div class="alert alert-danger">
								<?php echo $msz;?>
							</div>
						<?php } ?>
					
						<input type="submit" name="upload" value="Upload" class="btn btn-success ml-3">
					</form>
				</div>
			</div>
		</div>
		<!-- Content to display -->
	
		<script>
			/* Loop through all dropdown buttons to toggle between hiding and showing its 
			dropdown content - This allows the user to have multiple dropdowns without any conflict */
			var dropdown = document.getElementsByClassName("dropdown-btn");
			var i;
			for (i = 0; i < dropdown.length; i++) {
				dropdown[i].addEventListener("click", function() {
					this.classList.toggle("active");
					var dropdownContent = this.nextElementSibling;
					if (dropdownContent.style.display === "block") {
						dropdownContent.style.display = "none";
					} 
					else {
						dropdownContent.style.display = "block";
					}
				});
			}
		</script>

	</body>
</html>