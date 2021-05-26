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
	$_SESSION["userId"] = "1";
	$conn = mysqli_connect('localhost', 'root', '', 'database')
		or die("Connection Error: " . mysqli_error($conn));

	if (count($_POST) > 0) {
		$result = mysqli_query($conn, "SELECT *from users WHERE username='" . $_SESSION["username"] . "'");
		$row = mysqli_fetch_array($result);
		if ($_POST["currentPassword"] == $row["password"]) {
			mysqli_query($conn, "UPDATE users set password='" . $_POST["newPassword"] . "' WHERE username='" . $_SESSION["username"] . "'");
			$message = "Password Changed";
		}
		else
			$message = "Current Password is not correct";
	}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title> Student | Account </title>
		
		<link rel="icon" href="../images/icon.png"> 
		
		<link rel="stylesheet" href="dashboard.css">
		<link 
			rel="stylesheet" 
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
		
		<script 
			src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" 
			charset="utf-8"> 
		</script>
		
		<script>
			function validatePassword() {
				var currentPassword,newPassword,confirmPassword,output = true;
				currentPassword = document.frmChange.currentPassword;
				newPassword = document.frmChange.newPassword;
				confirmPassword = document.frmChange.confirmPassword;

				if(!currentPassword.value) {
					currentPassword.focus();
					document.getElementById("currentPassword").innerHTML = "required";
					output = false;
				}
				else if(!newPassword.value) {
					newPassword.focus();
					document.getElementById("newPassword").innerHTML = "required";
					output = false;
				}
				else if(!confirmPassword.value) {
					confirmPassword.focus();
					document.getElementById("confirmPassword").innerHTML = "required";
					output = false;
				}

				if(newPassword.value != confirmPassword.value) {
					newPassword.value="";
					confirmPassword.value="";
					newPassword.focus();
					document.getElementById("confirmPassword").innerHTML = "not same";
					output = false;
				} 	
				
				return output;
			}
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
				
			<a href="cart.php"> 
				<i class="fas fa-shopping-cart"> </i> 
				<span> Cart / Whishlist </span> 
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
			<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
				<div style="width: 500px;">
					<div class="message">
						<?php if(isset($message)) { echo $message; } ?>
					</div>
            
					<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
						<tr class="tableheader">
							<td colspan="2"> Change Password </td>
						</tr>
						
						<tr>
							<td width="40%">
								<label> Current Password </label>
							</td>	
							<td width="60%">
								<input type="password" name="currentPassword" class="txtField" />
								<span id="currentPassword" class="required"> </span>
							</td>
						</tr>
                
						<tr>
							<td>
								<label> New Password </label>
							</td>
							<td>
								<input type="password" name="newPassword" class="txtField" />
								<span id="newPassword" class="required"> </span>
							</td>
						</tr>
                
						<tr>
							<td>
								<label> Confirm Password </label>
							</td>
							<td>
								<input type="password" name="confirmPassword" class="txtField" />
								<span id="confirmPassword" class="required"> </span>
							</td>
						</tr>
                
						<tr>
							<td colspan="2">
								<input type="submit" name="submit" value="Submit" class="btnSubmit">
							</td>
						</tr>
					</table>
				</div>
			</form>	
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