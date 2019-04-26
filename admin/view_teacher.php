<?php
include('../controller/session.php');
include('../controller/dbconnet.php');
include('include/header.php');

	//get the all my teachers here using their role
	$sql = ("SELECT * FROM users WHERE `role` = 2");
	$teachers = mysqli_query($conn, $sql);


	
?> 
<!--heder end here-->

<!--inner block start here-->
<div class="inner-block">
  <div class="bread-crom">
		<p>
		  <i class="fa fa-user"></i>	Admin/My Teachers
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
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th> 
                    <th>Gender</th>                                                          
                    <th>Email</th>
                    <th>Edit </th>
                    <th>Delete</th>
                  </tr>                  
                </thead>

                <tbody>
                <?php
                  while($teacher_row = mysqli_fetch_assoc($teachers)){
                    
                   echo'
                          <tr>
                   
                              <td>'.$teacher_row["username"].'</td>
                              <td>'.$teacher_row["first_name"].'</td>
                              <td>'.$teacher_row["last_name"].'</td>
                              <td>'.$teacher_row["gender"].'</td>
                              <td>'.$teacher_row["email"].'</td>                                                           
                              <td><button class="btn update-teacher  btn-flat btn-warning" data-id="'.$teacher_row["username"].'"  data-toggle="modal" data-target="#myModal">Update</button>
                              
                              </td>

                              <td><button class="btn delete-teacher btn-flat btn-danger" data-id="'.$teacher_row["username"].'" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                
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
              <!--delete modal here-->
                      <div id="deleteModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete</h4>
                            </div>
                            <input type="hidden" name="delete-id" value="">
                            <div class="modal-body">
                              <p>Are you sure you want to delete this teacher? This action cannot be undone</p>
                            </div>
                            <div class="delete-message"></div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-flat btn-primary"  data-dismiss="modal">Cancel</button>
                              <button id="confirm-delete" type="button" class="btn btn-flat btn-danger" >Yes</button>
                            </div>
                          </div>
                        </div>
                      </div>

                 <!--delete modal here-->
                 <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Edit Teacher's Details</h4>
                            </div>

                            <div class="modal-body">
                              <form class="form-horizontal" role="form">
                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="">First Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="t_fname" class="form-control" id="" placeholder="Enter your first name">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="">Last Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="t_lname" class="form-control" id="" placeholder="Enter last name">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="">Gender</label>
                                  <div class="col-sm-9">
                                    <select id="" name="t_gender" class="form-control">
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                    </select>
                                  </div>
                                </div>

                                <input type="hidden" name="update_id" value="">
                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="">Email</label>
                                  <div class="col-sm-9">
                                    <input type="email" name="t_email" class="form-control" id="" placeholder="Enter teacher email">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="">Assigned Class</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="t_class" class="form-control" id="" placeholder="P1A as Primary 1A">
                                  </div>
                                </div>

                                <div class="update-message"></div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-flat btn-primary"  data-dismiss="modal">Cancel</button>
                          
                                  <button type="button" id="confirm-update" class="btn btn-default btn-warning">Update</button>
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


                      
            
