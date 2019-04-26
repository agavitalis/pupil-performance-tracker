
<?php
include('../controller/session.php');
include('../controller/dbconnet.php');
include('include/header.php');
if (!isset($_POST['manual_add'])) {
//my logic for upload begins
$message = $_POST['level']= $_POST['s_name']=$_POST['s_test']=$_POST['s_exam']=$_POST['klass']="";
$_POST['pupil_id']=$_POST['gender']=$_POST['f_name']=$_POST['l_name']=$_POST['term']=$_POST['session']="";
}
elseif (isset($_POST['manual_add'])) {

  $pupil_id = $_POST['pupil_id'];
  $gender = $_POST['gender'];
  $f_name = $_POST['f_name'];
  $l_name = $_POST['l_name'];
  $session = $_POST['session'];
  $level = $_POST['level'];
  $klass=$_POST['klass'];
  $term = $_POST['term'];
  $s_name = $_POST['s_name'];
  $s_test = $_POST['s_test'];
  $s_exam = $_POST['s_exam'];
  $total = $s_test + $s_exam;

  //$message = $_POST['s_exam'];
  if($s_test > 40){

    $message = "<p class='alert alert-info'>Sorry, Continous Assessment Score cannot be more than 40 percent</p>";
    

  }
  elseif($s_exam > 60){

    $message = "<p class='alert alert-info'>Sorry, Exam Score cannot be more than 60 percent</p>";
    

  }
  else{
        $sql = "INSERT INTO results ( `pupil_id`, `first_name`, `last_name`,`gender`,`class`,`level`,`session`, `subject`,`continous_assessment`,`exam`,`total`,`teacher`)
        VALUES ('$pupil_id', '$f_name', '$l_name','$gender','$klass', '$level', '$session', '$s_name', '$s_test', '$s_exam', '$total','$username')";

        if ($conn->query($sql) === TRUE) {
            $message = "<p class='alert alert-success'>Pupil record added successfully</p>";
    
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
  }
  
}


if (!isset($_POST['csv_add'])) {
  //my logic for upload begins
  $e_message="";

}
elseif(isset($_POST['csv_add'])){

   //this is what PHp sees what we iploaded as
 		$filename=$_FILES["result"]["tmp_name"];


        $file = fopen($filename, "r");
				//skip first line
         fgetcsv($file);

         while (($column = fgetcsv($file)) !== FALSE)
				  {
            
            $pupil_id = $column[0];
            $session = $column[6];
            $level = $column[5];
            $klass=$column[7];
            $term = $column[4];
            $s_name =$column[8];
           
            
						 //Now I want to check for duplicate record in the database
            $sql = ("SELECT * FROM results WHERE `pupil_id` = '$pupil_id' AND `session` = '$session'  AND `level` = '$level'  AND `class` = '$klass'  AND `term` = '$term' AND `subject` = '$s_name'  ");
            $result = mysqli_query($conn, $sql);

             if(mysqli_num_rows($result) == 0) {
                //Record does not exist                    
                $e_message = 1;
             
             } 
             

          }

    if($e_message == 1){

        // open the file again
        $file = fopen($filename, "r");
            //skip first line
            fgetcsv($file);  

        while (($line = fgetcsv($file)) !== FALSE)
        {
          $total =$line[9] + $line[10];
          //insert into the database, I skiped array 0 since our Id is auto increasing
          $insert_results = mysqli_query($conn,"INSERT INTO results (`pupil_id`,`first_name`,`last_name`,`gender`,`term`,`level`,`session`,`class`,`subject`,`continous_assessment`,`exam`,`total`,`teacher`) 
          VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."','".$line[8]."','".$line[9]."','".$line[10]."','$total','$username' )");

      
          if(!$insert_results)
          {
            $e_message = "Error: " . $sql . "<br>" . $conn->error;
              fclose($file);
                  
              break;
          }
      
        }
        
        if($insert_results){
          $e_message = "<p class='alert alert-success'>Results successfully recorded</p>";
        }

      
    } 
    else {
       $e_message = "<p class='alert alert-danger'>Some the Results already exist in the database</p>";
    }     
        
  
       
 

          
}
   

?> 
<!--heder end here-->

<!--inner block start here-->
<div class="inner-block">
  <div class="bread-crom">
		<p>
		<i class="fa fa-home"></i>	Teacher/Upload Results
		</p>
		<hr style="border: 1px solid #008000;"/>
	</div>
    <div class="blank">
      
      <div class="row">


          <div class="col col-md-6">
            <div class="panel panel-info text-center">
              <p>Fill all the fields to record a pupil result</p>
              <div class="panel-body">

                <form class="form-horizontal" role="form" method="POST" action="">
                  <div class="form-group">
              
                    <div class="col-sm-6">
                      <input  type="text" name="pupil_id" required="" class="form-control" id="" value="<?php echo $_POST['pupil_id']; ?>" placeholder="Pupil ID">
                    </div>

                     <div class="col-sm-6">
                      <select  required="" name="gender" value="<?php echo $_POST['gender']; ?>" class="form-control">
                        <option  selected="" disabled=""value="1">Pupil Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                   
                    <div class="col-sm-6">
                      <input type="text"  required="" name="f_name" value="<?php echo $_POST['f_name']; ?>" class="form-control" id="" placeholder="Pupil FIrst Name">
                    </div>
                    <div class="col-sm-6">
                      <input type="text"  required="" name="l_name" value="<?php echo $_POST['l_name']; ?>" class="form-control" id="" placeholder="Pupil Last Name">
                    </div>
                  </div>

                

                  <div class="form-group">
                     <div class="col-sm-6">
                       <select id=""  required=""  value="<?php echo $_POST['term']; ?>" name="term" class="form-control">
                        <option  selected="" disabled=""value="1">Select Term</option>
                        <option value="1">First Term</option>
                        <option value="2">Second Term</option>
                        <option value="3">Third Term</option>
                       
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <input type="text"  required=""  name="session" value="<?php echo $_POST['session']; ?>" class="form-control" id="" placeholder="Session Eg:2013/2014">
                    </div>
                  </div>

                 <div class="form-group">
                   

                    <div class="col-sm-6">
                      <select id=""  required=""  value="<?php echo $_POST['level']; ?>" name="level" class="form-control">
                        <option  selected="" disabled=""value="1">Select Level</option>
                        <option value="1">Primary One</option>
                        <option value="2">Primary Two</option>
                        <option value="3">Primary Three</option>
                        <option value="4">Primary Four</option>
                        <option value="5">Primary Five</option>
                        <option value="6">Primary Six</option>
                      </select>
                    </div>

                    <div class="col-sm-6">
                      <input type="text"  required="" name="klass" value="<?php echo $_POST['klass']; ?>" class="form-control" id="" placeholder="Pupil Class Eg:P1A">
                    </div>

                  </div>

                  <div class="form-group">
                     <div class="col-sm-12">
                      <input type="text"  required="" name="s_name" value="<?php echo $_POST['s_name']; ?>" class="form-control" id="" placeholder="Subject Name">
                    </div>
                    
                  </div>


                  <div class="form-group">
                    
                    <div class="col-sm-6">
                      <input type="number"  required="" name="s_test" value="<?php echo $_POST['s_test']; ?>" class="form-control" id="" placeholder="Test Score">
                    </div>
                    <div class="col-sm-6">
                      <input type="number"  required="" name="s_exam" value="<?php echo $_POST['s_exam']; ?>" class="form-control" id="" placeholder="Exam Score">
                    </div>

                  </div>

                 

                  <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="manual_add" class="btn btn-primary pull-right">Add Result</button>
                    </div>
                  </div> 
                  <div>
                    <?php echo $message; ?>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="col col-md-6">
            <div class="panel panel-default text-center">
              <p>Dowuload sample result templete, and upload result as an excel</p>
              <div class="panel-body">

                <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="control-label col-sm-4" for="">Download File</label>
                    <div class="col-sm-8">
                     
                     <button class="btn btn-info btn-block"><a href="uploads/pupil_result_templete.csv">Download Result Template</a></button>
                    </div>
                  </div>
                  <hr>
                <p class="upload-text"> Select File, to upload result as an excel</p>

                 <div class="form-group">
                    <label class="control-label col-sm-4" for="">Choose File</label>
                    <div class="col-sm-8">
                     
                      <input class="btn btn-block btn-info btn-flat" type="file" accept=".csv" name="result" id="">
                    </div>
                  </div>

                

                  <div class="form-group">        
                   <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="csv_add" class="btn btn-primary pull-right">Add Result</button>
                    </div>
                  </div> 
                   <div>
                    <?php echo $e_message; ?>
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


                      
            
