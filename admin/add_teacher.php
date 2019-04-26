<?php
include('../controller/session.php');
include('../controller/dbconnet.php');
include('include/header.php');
$response = '';

if(isset($_POST['register-teachers']))
{
  //basic validation
  if(empty($_POST['f_name'])||empty($_POST['l_name'])||empty($_POST['t_username'])||empty($_POST['gender'])||empty($_POST['t_email']))
  {
    $response ='<p class="alert alert-info">Please fill all rhe fields</p>';
  }
  else{

    //receeive the form values
    $t_username = $_POST['t_username'];
    $first_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $gender = $_POST['gender'];
    $t_email = $_POST['t_email'];

    $t_class = strtoupper($_POST['t_class']);

    //I gave teachers default passwords
    $pass = md5(md5(12345));
    $role = 2;


       //Now I want to check for the username in the database
        $sql = ("SELECT * FROM users WHERE `username` = '$t_username' ");
        $result = mysqli_query($conn, $sql);

        //i counted them
        if (mysqli_num_rows($result) > 0  ) {
            //user exits
            $response ='<p class="alert alert-info">Given username already exist, usernames must be unique</p>';
        } 
        else{
          $sql = "INSERT INTO users (`first_name`, `last_name`, `email`,`username`,`password`,`gender`,`role`,`class`)
            VALUES ( '$first_name', '$last_name','$t_email','$t_username','$pass','$gender','$role','$t_class')";

            if (mysqli_query($conn, $sql)) {

               $response ='<p class="alert alert-success">Teacher, successfully registered</p>';

            } 
            else {
                $response = "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

        }
   
  }
}


?> 
<!--heder end here-->

<!--inner block start here-->
<div class="inner-block">
  <div class="bread-crom">
		<p>
		  <i class="fa fa-pencil"></i>	Admin/Register Teachers
		</p>
		<hr style="border: 1px solid #008000;"/>
	</div>
    <div class="blank">
      <div class="row">
          <div class="col col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="">
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="">First Name</label>
                    <div class="col-sm-9">
                      <input type="text" required="" class="form-control" name="f_name" placeholder="Enter Teacher First Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="">Last Name</label>
                    <div class="col-sm-9">
                      <input type="text" required="" class="form-control" name="l_name" placeholder="Enter Teacher Last Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="">Username</label>
                    <div class="col-sm-9">
                      <input type="text" required="" class="form-control" name="t_username" placeholder="Enter Teacher Username">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="">Gender</label>
                    <div class="col-sm-9">
                      <select id="" name="gender" required="" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" name="t_email"  required="" placeholder="Enter Teacher email">
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="">Assign Class</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="t_class"  required="" placeholder="Eg: P1A as Primary 1A">
                    </div>
                  </div>

      

                  <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="register-teachers" class="btn btn-primary pull-right"><i class="fa fa-user-plus"></i>Register New Teacher</button>
                    </div>
                  </div> 
                  <div>
                    <?php echo $response ;?>
                  </div>
                </form>
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


                      
            
