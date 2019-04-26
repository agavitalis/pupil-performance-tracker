<?php
include('../controller/session.php');
include('../controller/dbconnet.php');
include('include/header.php');
$response  = "";
$upload_response= array();

	//get the teacher details
	$sql = ("SELECT * FROM users WHERE `username` = '$username'");
	$teacher = mysqli_query($conn, $sql);

	//I converted everything to an associative array
  $teacher_row = mysqli_fetch_assoc($teacher);
  
  //i took care of the form update
  if(isset($_POST['update'])){

    if(isset($_POST['f_name'])&& isset($_POST['l_name']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['gender']) && isset($_POST['phone']) && isset($_POST['password']) ){
       
        //a function to validate user input
        function validation($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        //i called the functions here
        $f_name = validation($_POST["f_name"]);
        $l_name = validation($_POST["l_name"]);
        $address = validation($_POST["address"]);
        $email = validation($_POST["email"]);
        $phone = validation($_POST["phone"]);
        $gender = validation($_POST["gender"]);
        $password = validation($_POST["password"]);
        $password=md5(md5($password));

        //update the profile
       

        $sql = "UPDATE users SET `first_name`='$f_name',`last_name`='$l_name',`address`='$address',`phone`='$phone',`gender`='$gender',`password`='$password' WHERE username='$username'";
            if (mysqli_query($conn, $sql)) {

               $response ='<p class="alert alert-success">Your profile was successfully updated</p>';

            } 
            else {
                $response = "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

       
      }
        else{
        $response="<div class='alert alert-danger'> <p>Please fill all fields</p> </div>";
    }
  }

  //file upload here 
   if(isset($_FILES['image'])){
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      @$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $upload_response[]='<p class="alert alert-danger">extension not allowed, please choose a JPEG or PNG file.</p>';
      }
      
      if($file_size > 2097152){
         $upload_response[]='<p class="alert alert-danger">File size must be more than 2 MB</p>';
      }
      if(file_exists("uploads/".$file_name)){

         $upload_response[]='<p class="alert alert-success">File already exist</p>';
      }
      if(empty($upload_response)==true){
          //remove the previous pictures
          unlink("uploads/".$teacher_row['picture']);

          //update the database
          $sql = "UPDATE users SET `picture`='$file_name' WHERE username='$username'";
          if (mysqli_query($conn, $sql)) {
              
            move_uploaded_file($file_tmp,"uploads/".$file_name);
            $upload_response[] = '<p class="alert alert-success">Update Success</p>';
             
          } 
         
      }
   }

?> 

<!--inner block start here-->
<div class="inner-block">
   <div class="bread-crom">
		<p>
		  <i class="fa fa-user"></i>	Teacher/Update Profile
		</p>
		<hr style="border: 1px solid #008000;"/>
	</div>
    <div class="blank">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              <div class="panel-body">

                <div class="col-md-3 profile-pix">
                  <img src="uploads/<?php echo $teacher_row['picture']; ?>" class="img-circle " width="140px" height="140px">
                  <hr>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="file" required name="image"/><hr>
                        <button class="btn btn-block btn-success" type="submit">Upload</button>
                    </form>
                    <div>
                      <?php
                      if(isset($upload_response[0])){
                        print_r($upload_response[0]);
                      }
                      ?>
                    </div>
                </div>

                <div class="col-md-9 ">
                  <form class="form-horizontal" role="form" method="POST" action="" >
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">First Name</label>
                      <div class="col-sm-9">
                        <input  name="f_name" required="" type="name" class="form-control"  placeholder="Enter your name" value="<?php echo $teacher_row['first_name']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">Last Name</label>
                      <div class="col-sm-9">
                        <input  name="l_name" required="" type="name" class="form-control"  placeholder="Enter your name" value="<?php echo $teacher_row['last_name']; ?>">
                      </d<div class="form-group">
                      <label class="control-label col-sm-3" for="">Gender</label>
                      <div class="col-sm-9">
                        <select   name="gender" required="" class="form-control">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                    </div>iv>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">Phone</label>
                      <div class="col-sm-9">
                        <input  name="phone" required=""type="name" class="form-control"  placeholder="Enter your Phone Number" value="<?php echo $teacher_row['phone']; ?>">
                      </div>
                    </div>

                    

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">Email</label>
                      <div class="col-sm-9">
                        <input name="email" required="" type="email" class="form-control"  placeholder="Enter your email" value="<?php echo $teacher_row['email']; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">Address</label>
                      <div class="col-sm-9">
                        <input  name="address" required=""type="name" class="form-control"  placeholder="Enter your address" value="<?php echo $teacher_row['address']; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">Password</label>
                      <div class="col-sm-9">          
                        <input  name="password" required="" type="password" class="form-control"  placeholder="Enter your password" >
                      </div>
                    </div>

                    <div class="form-group">        
                      <div class="col-sm-offset-2 col-sm-10">
                        <button name="update" value="update" type="submit" class="btn btn-default btn-primary pull-right">Update</button>
                      </div>
                      

                    </div> 
                    <div>
                      <?php
                        echo $response;
                      ?>
                    </div>
                  </form>
                </div>  
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


                      
            
