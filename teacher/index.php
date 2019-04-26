<?php
include('../controller/session.php');
include('../controller/dbconnet.php');
include('include/header.php');

	//get the teacher details
	$sql = ("SELECT * FROM users WHERE `username` = '$username'");
	$admin = mysqli_query($conn, $sql);

	//I converted everything to an associative array
	$admin_row = mysqli_fetch_assoc($admin);

//get the all my pupils,and count them 
 $sql = ("SELECT * FROM results  WHERE `teacher` = '$username' GROUP BY pupil_id");
 $pupils = mysqli_query($conn, $sql);

 //get the all my results,and count them 
 $sql = ("SELECT * FROM results  WHERE `teacher` = '$username'");
 $results = mysqli_query($conn, $sql);
?> 
<!--heder end here-->
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
<!--market updates updates-->
	 <div class="market-updates">
			<div class="col-md-6 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-8 market-update-left">
						<h3><?php echo mysqli_num_rows($pupils)?></h3>
						<h4>My Pupils</h4>
						<p>No of Pupils I am Tracking</p>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			
			<div class="col-md-6 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-8 market-update-left">
						<h3><?php echo mysqli_num_rows($results)?></h3>
						<h4>Results</h4>
						<p>Total No of Results I Uploaded</p>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-file-text-o"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
<!--market updates end here-->
		<div class="col-md-8 col-md-offset-2 chart-layer1-right"> 
			<div class="user-marorm">
			<div class="malorum-top">				
			</div>
			<div class="malorm-bottom">
				<span class="malorum-pro"> 
                    <img src="uploads/<?php echo $teacher_row['picture'];?>" class="img-circle " width="140px" height="140px">
                </span>
			     <h4>Welcome!</h4>
				 <h2><?php echo $teacher_row['last_name'] .' '. $teacher_row['first_name'];?></h2>
				<p>We are excited to have you back, Hope you are doing great.</p>
				<ul class="malorum-icons">
					<li><a href="#"><i class="fa fa-facebook"> </i>
						<div class="tooltip"><span>Facebook</span></div>
					</a></li>
					<li><a href="#"><i class="fa fa-twitter"> </i>
						<div class="tooltip"><span>Twitter</span></div>
					</a></li>
					<li><a href="#"><i class="fa fa-google-plus"> </i>
						<div class="tooltip"><span>Google</span></div>
					</a></li>
				</ul>
			</div>
		   </div>
		</div>


	
	<div class="clearfix"> </div>

<!--climate end here-->
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2018. All Rights Reserved</p>
</div>	
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
<!--slider menu-->
<?php
	include('include/side_nav.php');
?> 
    
	
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>                     