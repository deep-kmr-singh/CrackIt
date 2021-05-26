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
    // initialize errors variable
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "database");
	
	if (isset($_GET['del_task'])) {
	$id = $_GET['del_task'];

	mysqli_query($db, "DELETE FROM videos WHERE id=".$id);
	header('location: edit_course.php');
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title> Instructor | Edit Course </title>
		
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
				
			<a class="dropdown-btn"> 
				<i class="fa fa-caret-down"> </i> 
				<span> Courses </span>
				<div class="dropdown-container" style="display: none; padding-left: 8px;">
					<a href="#"> View Courses </a>
					<a href="#"> Edit Course </a>
					<a href="#"> Add  New Course </a>
				</div>
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
			<table>
				<thead>
					<tr>
						<th> Topic Id. </th>
						<th> Topic Name </th>
						<th style="width: 60px;"> Delete Topic </th>
					</tr>
				</thead>

				<tbody>
					<?php 
						// select all tasks if page is visited or refreshed
						$tasks = mysqli_query($db, "SELECT * FROM videos");
						$i = 1; 
						while ($row = mysqli_fetch_array($tasks)) { ?>
							<tr>
								<td> <?php echo $i; ?> </td>
								<td class="task"> <?php echo $row['name']; ?> </td>
								<td class="delete"> 
									<a href="edit_course.php?del_task=<?php echo $row['id'] ?>">x</a> 
								</td>
							</tr>
					<?php $i++; } ?>	
				</tbody>
			</table>
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