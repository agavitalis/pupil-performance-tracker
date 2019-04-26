<?php
if(!isset($username)){
    header("location:../index.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Performance Tracker</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--//skycons-icons-->
</head>
<body>	
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
								<a href="index.html"> <h1>Performance Tracker</h1> 
								<!--<img id="logo" src="" alt="Logo"/>--> 
								 </a> 								
							</div>
							
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
<?php					
	//get the admin details
	$sql = ("SELECT * FROM users WHERE `username` = '$username'");
	$admin = mysqli_query($conn, $sql);

	//I converted everything to an associative array
  $admin_row = mysqli_fetch_assoc($admin);
?>					
							<div class="profile_details">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="uploads/<?php echo $admin_row['picture'];?>" width="50px" height="50px" alt=""> </span> 
												<div class="user-name">
													<p><?php echo $admin_row['first_name'];?> </p>
													<span>Admin</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="admin_profile.php"><i class="fa fa-user"></i> Profile</a> </li> 
											<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>				
						</div>
				    <div class="clearfix"> </div>	
				</div>