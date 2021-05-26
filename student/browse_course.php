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
		
		<title> Student | Browse Courses </title>
		
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
			<div>
				<h2 style="margin-top: 10px"> Web Technology </h2>
				<hr>
				<a style="float:left; margin:20px;" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="html tutorial" src="https://static.javatpoint.com/images/logo/html-tutorial.png">
						<p> HTML </p>
					</div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="css tutorial" src="https://static.javatpoint.com/images/logo/css3.jpg">
						<p> CSS </p>
					</div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="JavaScript tutorial" src="https://static.javatpoint.com/images/logo/javascripthome.png">
						<p> JavaScript </p>
					</div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="jquery tutorial" src="https://static.javatpoint.com/images/logo/jquery.png">
						<p> jQuery </p>
					</div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="php tutorial" src="https://static.javatpoint.com/images/logo/php-logo.png">
						<p> PHP </p>
					</div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="html tutorial" src="https://static.javatpoint.com/images/logo/xml-home.png">
						<p> XML </p>
					</div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="json tutorial" src="https://static.javatpoint.com/images/logo/json.png">
						<p> JSON </p>
					</div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="AJAX tutorial" src="https://static.javatpoint.com/images/logo/ajaxhome.png">
						<p> AJAX </p>
					</div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="Web Services tutorial" src="https://static.javatpoint.com/images/logo/web-services.png">
						<p> Web Services </p>
					</div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="CodeIgniter tutorial" src="https://static.javatpoint.com/codeigniter/images/codeigniter-home.png">
						<p> CodeIgniter </p>
					</div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="bootstrap tutorial" src="https://static.javatpoint.com/bootstrappages/images/bootstrap-logo.jpg">
						<p> Bootstrap </p>
					</div>
				</a>
			</div> 
			
			<br> <br> <br>
			
			<div>
				<h2 style="margin-top: 100px"> Database Tutorials </h2>
				<hr>
				<a style="float:left; margin:20px" href="dashboard.php">
                    <div class="homecontent">
						<img class=" lazyloaded" alt="SQL tutorial" src="https://static.javatpoint.com/images/logo/sqlhome.png">
                        <p> SQL </p>
                    </div>
                </a>
				<a style="float:left; margin:20px" href="dashboard.php">
                    <div class="homecontent">
						<img class=" lazyloaded" alt="Oracle tutorial" src="https://static.javatpoint.com/images/logo/oracle_logo.png">
                        <p> Oracle </p>
                    </div>
                </a>
				<a style="float:left; margin:20px" href="dashboard.php">
                    <div class="homecontent">
						<img class=" lazyloaded" alt="mysql tutorial" src="https://static.javatpoint.com/images/logo/mysql.png">
                        <p> MySQL </p>
                    </div>
                </a>
				<a style="float:left; margin:20px" href="dashboard.php">
                    <div class="homecontent">
						<img class=" lazyloaded" alt="MongoDB tutorial" src="https://static.javatpoint.com/images/logo/mongodb.png">
                        <p> MongoDB </p>
                    </div>
                </a>
				<a style="float:left; margin:20px" href="dashboard.php">
                    <div class="homecontent">
						<img class=" lazyloaded" alt="Cassandra tutorial" src="https://static.javatpoint.com/cassandra/images/cassandra-home.jpg">
                        <p> Cassandra </p>
					</div>
                </a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="SQL Server tutorial" src="https://static.javatpoint.com/sqlserver/images/sql-server-home.jpg">
                        <p> SQL Server </p>
                    </div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="CouchDB tutorial" src="https://static.javatpoint.com/couchdb/images/couchdb-home.png">
                        <p> CouchDB </p>
                    </div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="SQLite tutorial" src="https://static.javatpoint.com/sqlite/images/sqlite-home.png">
                        <p> SQLite </p>
                    </div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="MariaDB tutorial" src="https://static.javatpoint.com/mariadb/images/mariadb-home.png">
                        <p> MariaDB </p>
                    </div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="PL/SQL tutorial" src="https://static.javatpoint.com/images/logo/plsql.png">
                        <p> PL/SQL </p>
                    </div>
				</a>
			</div>
			
			<br> <br> <br>
			
			<div>
				<h2 style="margin-top: 100px"> Trending Technologies </h2>
				<hr>
				<a style="float:left; margin:20px;" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="Artificial Intelligence Tutorial" src="https://static.javatpoint.com/tutorial/ai/images/ai-home.png">
                        <p> AI </p>
                    </div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="AWS Tutorial" src="https://static.javatpoint.com/tutorial/aws/images/aws-home.png">
                        <p> AWS </p>
                    </div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="Selenium tutorial" src="https://static.javatpoint.com/tutorial/selenium/images/selenium-home.jpg">
                        <p> Selenium </p>
                    </div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="Cloud tutorial" src="https://static.javatpoint.com/images/logo/cloudhome.png">
                        <p> Cloud </p>
                    </div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="Hadoop tutorial" src="https://static.javatpoint.com/images/logo/hadoop.jpg">
                        <p> Hadoop </p>
                    </div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="ReactJS Tutorial" src="https://static.javatpoint.com/tutorial/reactjs/images/reactjs-home.png">
                        <p> ReactJS </p>
                    </div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="Data Science Tutorial" src="https://static.javatpoint.com/tutorial/data-science/images/data-science-home.png">
                        <p> Data Science </p>
                    </div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="Angular 7 Tutorial" src="https://static.javatpoint.com/tutorial/angular7/images/angular-7-home.png">
                        <p> Angular 7 </p>
                    </div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="Blockchain Tutorial" src="https://static.javatpoint.com/tutorial/blockchain/images/blockchain-home.png">
                        <p> Blockchain </p>
                    </div>
				</a>
				<a style="float:left; margin:20px" href="dashboard.php">
					<div class="homecontent">
						<img class=" lazyloaded" alt="Git Tutorial" src="https://static.javatpoint.com/tutorial/git/images/git-home.png">
                        <p> Git </p>
                    </div>
				</a>
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