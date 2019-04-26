<?php
include('../controller/session.php');
include('../controller/dbconnet.php');
include('include/header.php');

//get the all my pupils  
 $sql = ("SELECT * FROM results  WHERE `teacher` = '$username' GROUP BY pupil_id");
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
		  <i class="fa fa-user"></i>	Teacher/My Pupils
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
                    <th>Session</th>                                                          
                    <th>Termly Performance</th>
                    <th>Session Performance </th>
                    <th>Overall Performance</th>
                  </tr>                  
                </thead>

                <tbody>
                <?php
                  while($pupil_row = mysqli_fetch_assoc($pupils)){
                    
                   echo'
                          <tr>
                   
                              <td>'.$pupil_row["pupil_id"].'</td>
                              <td>'.$pupil_row["first_name"].'</td>
                              <td>'.$pupil_row["last_name"].'</td>
                              <td>'.$pupil_row["session"].'</td>
                              <td><button class="btn  by_term  btn-flat btn-info" data-id="'.$pupil_row["pupil_id"].'" data-fname ="'.$pupil_row["first_name"].'" data-lname ="'.$pupil_row["last_name"].'" data-klass ="'.$pupil_row["class"].'" data-level ="'.$pupil_row["level"].'" data-toggle="modal" data-target="#showTerm">Summary by Term</button>
                              
                              </td>
                                                                                     
                              <td><button class="btn by_session  btn-flat btn-warning" data-id="'.$pupil_row["pupil_id"].'" data-fname ="'.$pupil_row["first_name"].'" data-lname ="'.$pupil_row["last_name"].'" data-klass ="'.$pupil_row["class"].'" data-level ="'.$pupil_row["level"].'" data-toggle="modal" data-target="#showSession">Summary by Session</button>
                              
                              </td>

                              <td>
                                <form method="post" action="overall.php">
                                  <input type="hidden" name="o_id" value="'.$pupil_row["pupil_id"].'"/>
                                  <input type="hidden" name="o_fname" value="'.$pupil_row["first_name"].'"/>
                                  <input type="hidden" name="o_lname" value="'.$pupil_row["last_name"].'"/>
                                  <button type="submit" class="btn by_overall  btn-flat btn-success" >Overall Performance</button>
                                </form> 
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
                    <div id="showTerm" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">View <span id="term_name"></span> Termly Performance</h4>
                            </div>

                            <div class="modal-body">
                              <form class="form-horizontal" role="form" method="post" action="termly.php">

                               <input type="hidden" id="term_id" name="term_id" value="">
                               <input type="hidden" id="term_fname" name="term_fname" value="">
                               
                               <input type="hidden" id="term_lname" name="term_lname" value="">
                               <input type="hidden" id="term_class" name="term_class" value="">
                               <input type="hidden" id="term_level" name="term_level" value="">
                                
                                
                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="">Select Session</label>
                                  <div class="col-sm-9">
                                    <select required id="" name="session"  class="form-control">
                                    <option selected="" disabled value="Male">Select Desired Session</option>
                                     <?php
                                        while($session_row = mysqli_fetch_assoc($sessions)){
                                        echo' <option value="'.$session_row["session"].'">'.$session_row["session"].'</option>';
                                          
                                        }
                                      ?> 
                                    </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="">Select Term</label>
                                  <div class="col-sm-9">
                                    <select required id="" name="term"  class="form-control">
                                    <option selected="" disabled value="Male">Select Desired Term</option>
                                      <option value="1">First Term</option>
                                      <option value="2">Second Term</option>
                                      <option value="3">Third Term</option>
                                    </select>
                                  </div>
                                </div>

                                
                                <div class="form-group">        
                                  <div class="col-sm-12">
                                    <button type="submit" name="termly" class="btn btn-default btn-warning pull-right">Show Performance</button>
                                  </div>
                                </div> 
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>


    <!--copy rights start here-->

      <div id="showSession" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Pupil Performance Based on Academic Sessions</h4>
              </div>

              <div class="modal-body">
                <form class="form-horizontal" role="form" method="post" action="sessionly.php">
                                        
                  <input type="hidden" id="session_id" name="session_id" value="">
                  <input type="hidden" id="session_fname" name="session_fname" value="">
                  
                  <input type="hidden" id="session_lname" name="session_lname" value="">
                  <input type="hidden" id="session_class" name="session_class" value="">
                  <input type="hidden" id="session_level" name="session_level" value="">    

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="">Select Session</label>
                    <div class="col-sm-9">
                      <select id="" name="sessionly" class="form-control">
                      <option selected="" disabled value="Male">Select Desired Session</option>
                       <?php
                           //get the distinct sessions avaliable from result table
                          $sql = ("SELECT DISTINCT `session` FROM results");
                          $sessions = mysqli_query($conn, $sql);

                          while($session_row = mysqli_fetch_assoc($sessions)){
                          echo' <option value="'.$session_row["session"].'">'.$session_row["session"].'</option>';
                            
                          }
                        ?> 
                      </select>
                    </div>
                  </div>
                  <div class="form-group">        
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-default btn-warning pull-right">Show Performance</button>
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


                      
            
