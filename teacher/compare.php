<?php
include('../controller/session.php');
include('../controller/dbconnet.php');
include('include/header.php');

if(isset($_POST['compare_results'])){

    //welcome all the variables
    $subject= $_POST['subject'];
    $session= $_POST['session'];
    $term= $_POST['term'];
    
    $klass= $_POST['klass'];

  //get the all my pupils stuffs
 $sql = ("SELECT * FROM results  WHERE `subject` = '$subject' AND `session` = '$session' AND `term` = '$term' AND `class` = '$klass' GROUP BY pupil_id ORDER BY total DESC");
 $pupils = mysqli_query($conn, $sql); 

}else{
   header("location:compare_dialog.php");
}


?> 
<!--heder end here-->

<!--inner block start here-->
<div class="inner-block">
  <div class="bread-crom">
		<p>
		  <i class="fa fa-user"></i>	Teacher/Pupils results Compared
		</p>
		<hr style="border: 1px solid #008000;"/>
	</div>
  <div class="blank">
      <div class="col-md-12 chit-chat-layer1-left">
        <div class="work-progres">
          <div class="chit-chat-heading">  </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Pupil ID</th>
                    <th>First Name</th>
                    <th>Last Name</th> 
                    <th>Subject</th>                                                          
                    <th>Class</th>
                    <th>Session</th>
                    <th>Term</th>
                    <th>Score in Subject</th>
                    <th>Position</th>
          
                  </tr>                  
                </thead>

                <tbody>
                <?php
                    $position = 0;
                  while($pupil_row = mysqli_fetch_assoc($pupils)){
                    $position = $position + 1; 
                   echo'
                          <tr>
                   
                              <td>'.$pupil_row["pupil_id"].'</td>
                              <td>'.$pupil_row["first_name"].'</td>
                              <td>'.$pupil_row["last_name"].'</td>
                              <td>'.$pupil_row["subject"].'</td>
                              <td>'.$pupil_row["class"].'</td>
                              <td>'.$pupil_row["session"].'</td>
                              <td>'.$pupil_row["term"].'</td>
                              <td>'.$pupil_row["total"].'</td>
                              <td>'.$position.'</td>
                              
                   
                      ';
                  }
                  ?>
           
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--inner block end here-->
              
          
        </div>


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

   
    <script src="js/sidebar.js"></script>
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!--//scrolling js-->
    <script src="js/bootstrap.js"> </script>
    <!-- mother grid end here-->
</body>
</html>


                      
            
