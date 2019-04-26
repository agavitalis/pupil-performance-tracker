<?php
include('../controller/session.php');
include('../controller/dbconnet.php');
include('include/header.php');

//get the all my pupils  
 $sql = ("SELECT * FROM results  WHERE `teacher` = '$username' GROUP BY subject");
 $pupils = mysqli_query($conn, $sql);

//get the distinct sessions avaliable from result table
$sql = ("SELECT DISTINCT `session` FROM results");
$sessions = mysqli_query($conn, $sql);

?> 
<!--heder end here-->

<!--inner block start here-->
<div class="inner-block">
  <div class="bread-crom">
		<p>
		  <i class="fa fa-user"></i>	Teacher/My Results
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
                    <th>Subject Name</th>
                    <th>Level</th>
                    <th>Class</th>
                    <th>Term</th> 
                    <th>Session</th>                                                          
                    <th>Delete Result</th>
                   
                  </tr>                  
                </thead>

                <tbody>
                <?php
                  while($pupil_row = mysqli_fetch_assoc($pupils)){
                    
                   echo'
                          <tr>
                   
                              <td>'.$pupil_row["subject"].'</td>
                              <td>'.$pupil_row["level"].'</td>
                              <td>'.$pupil_row["class"].'</td>
                              <td>'.$pupil_row["term"].'</td>
                              <td>'.$pupil_row["session"].'</td>
                              <td><button class="btn  delete_result  btn-flat btn-danger" data-subject="'.$pupil_row["subject"].'" data-level ="'.$pupil_row["level"].'" data-term ="'.$pupil_row["term"].'"  data-session ="'.$pupil_row["session"].'" data-klass ="'.$pupil_row["class"].'" data-termm ="'.$pupil_row["term"].'"  data-toggle="modal" data-target="#deleteResult">Delete Results</button>
                              
                              </td>
                                                                                     
                                                            
                          </tr>
                   
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
              
    <!-- Modal -->
                     <div id="deleteResult" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Results</h4>
                            </div>

                            <div class="modal-body">
                              <form class="form-horizontal" role="form" method="post" action="include/controller.php">

                               <input type="hidden" id="subject" name="subject" value="">
                               <input type="hidden" id="term" name="term" value="">                       
                               <input type="hidden" id="session" name="session" value="">
                               <input type="hidden" id="level" name="level" value="">
                               <input type="hidden" id="klass" name="klass" value="">
                               
                                
                                
                                <p>This action cannot be undone, do you wish to continue?</p>

                                
                                <div class="form-group">        
                                  <div class="col-sm-12">
                                    <button type="submit" name="delete_results" class="btn btn-default btn-danger pull-right">Delete Results</button>
                                  </div>
                                </div> 
                              </form>
                            </div>
                          </div>
                        </div>
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
    <!--scrolling js-->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!--//scrolling js-->
    <script src="js/bootstrap.js"> </script>
    <!-- mother grid end here-->
</body>
</html>


                      
            
