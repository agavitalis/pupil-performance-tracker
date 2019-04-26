<?php
include('../controller/session.php');
include('../controller/dbconnet.php');
include('include/header.php');

	//get the admin details
	$sql = ("SELECT * FROM users WHERE `username` = '$username'");
	$admin = mysqli_query($conn, $sql);

	//I converted everything to an associative array
	$admin_row = mysqli_fetch_assoc($admin);
?> 
<!--heder end here-->

<!--inner block start here-->


<div class="inner-block">
	<div class="bread-crom">
		<p>
		<i class="fa fa-home"></i>	Admin/Profile
		</p>
		<hr style="border: 1px solid #008000;"/>
	</div>
    <div class="blank">
    	<div class="panel">
   					<div class="panel-body admin-panel-body text-center">
    					<div class="col-md-3 profile-pix">
							<img src="uploads/<?php echo $admin_row['picture']; ?>" class="img-circle " width="140px" height="140px">
							 <p> Welcome <?php echo $admin_row['first_name'];?> !</p>
    				
						</div>
			
						<div class="col-md-9 ">
							<table class="table table-bordered table-striped">
								<tbody>
									<tr>
										<td class="col-md-4">Full Name</td>
										<td><?php echo $admin_row['first_name'] .'	'. $admin_row['last_name']; ?></td>
									</tr>
									<tr>
										<td>Username</td>
										<td id="address"><?php echo $admin_row['username']; ?></td>
									</tr>
									<tr>
										<td>Email</td>
										<td id="email"><?php echo $admin_row['email']; ?></td>
									</tr>
									<tr>
										<td>Phone Number</td>
										<td id="phone"><?php echo $admin_row['phone']; ?></td>
									</tr>
									<tr>
										<td>Gender</td>
										<td id="gender"><?php echo $admin_row['gender']; ?> </td>
									</tr>
									<tr>
										<td>Address</td>
										<td id="address"><?php echo $admin_row['address']; ?></td>
									</tr>
                        				
                      				
									<tr>
										<td>Role:</td>
										<td id="username">Admin </td>
									</tr>        	
								</tbody>	
							</table>
							<div>
								
								<button class="btn btn-flat btn-success pull-right"> <a href="update_profile.php"><i class="fa fa-ok"></i>Update Profile</a></button>
								
							</div>
						</div>
    				</div>
    			
  			</div>
    </div>
</div>
<!--inner block end here-->


<!--copy rights start here-->
<?php
include('include/footer.php');
?> 
<!--COPY rights end here-->
</div>
</div>

<!--slider menu-->
<?php
include('include/side_nav.php');
?> 

</div>


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


                      
						
