<?php
include('../controller/session.php');
include('../controller/dbconnet.php');
include('include/header.php');
$response = '';

//get the distinct sessions avaliable from result table
$sql = ("SELECT DISTINCT `session` FROM results");
$sessions = mysqli_query($conn, $sql);

//get the distinct sessions avaliable from result table
$sql_term = ("SELECT DISTINCT `term` FROM results");
$term = mysqli_query($conn, $sql_term);

//get the distinct sessions avaliable from result table
$sql_subject = ("SELECT DISTINCT `subject` FROM results");
$subject = mysqli_query($conn, $sql_subject);

//get the distinct sessions avaliable from result table
$sql_class = ("SELECT DISTINCT `class` FROM results");
$klass = mysqli_query($conn, $sql_class);

?> 
<!--heder end here-->

<!--inner block start here-->
<div class="inner-block">
  <div class="bread-crom">
		<p>
		  <i class="fa fa-ok"></i>	Teacher/Compare Pupil Performance
		</p>
		<hr style="border: 1px solid #008000;"/>
	</div>
    <div class="blank">
      <div class="row">
          <div class="col col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="compare.php">
                  

                 

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="">Select Subject</label>
                    <div class="col-sm-9">
                      <select id="" name="subject" required="" class="form-control">
                       <?php
                          while($subject_row = mysqli_fetch_assoc($subject))
                          {
                            echo'<option value="'.$subject_row['subject'].'">'.$subject_row['subject'].'</option>';
                          }
                        ?>
                        
                      </select>
                    </div>
                  </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="">Select Class</label>
                    <div class="col-sm-9">
                      <select id="" name="klass" required="" class="form-control">
                       <?php
                          while($klass_row = mysqli_fetch_assoc($klass))
                          {
                            echo'<option value="'.$klass_row['class'].'">'.$klass_row['class'].'</option>';
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="">Select Term</label>
                    <div class="col-sm-9">
                      <select id="" name="term" required="" class="form-control">
                        <?php
                          while($term_row = mysqli_fetch_assoc($term))
                          {
                            echo'<option value="'.$term_row['term'].'">'.$term_row['term'].'</option>';
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-sm-3" for="">Select Session</label>
                    <div class="col-sm-9">
                      <select id="" name="session" required="" class="form-control">
                       <?php
                          while($sessions_row = mysqli_fetch_assoc($sessions))
                          {
                            echo'<option value="'.$sessions_row['session'].'">'.$sessions_row['session'].'</option>';
                          }
                        ?>
                      </select>
                    </div>
                  </div>

                 

                  

                  <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="compare_results" class="btn btn-info pull-right"><i class="fa fa-ok"></i>Compare Pupil Performance</button>
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



<!--scrolling js-->
    <script src="js/sidebar.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>


                      
            
