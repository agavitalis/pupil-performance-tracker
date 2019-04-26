<?php
include('../controller/session.php');
include('../controller/dbconnet.php');
include('include/header.php');

if(!isset($_POST['sessionly']) ){
    header("location:view_pupils.php");
}

//read the form variables
$pupil_id = $_POST['session_id'];
$fname = $_POST['session_fname'];
$lname = $_POST['session_lname'];
$klass = $_POST['session_class'];
$level = $_POST['session_level'];
$session = $_POST['sessionly'];



//get the all my subjects,one by one 
//English First Term
 $english_sql1 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'English Language' AND `session` = '$session' AND `term` = 1 AND `pupil_id` = '$pupil_id'");
 $english_row1 = mysqli_fetch_assoc($english_sql1);

//English Second Term 
$english_sql2 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'English Language' AND `session` = '$session' AND `term` = 2 AND `pupil_id` = '$pupil_id'");
$english_row2 = mysqli_fetch_assoc($english_sql2);

//English Third Term
$english_sql3 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'English Language' AND `session` = '$session' AND `term` = 3 AND `pupil_id` = '$pupil_id'");
$english_row3 = mysqli_fetch_assoc($english_sql3);

//average of english
$english_average = mysqli_query($conn,"SELECT AVG(total) AS average FROM results  WHERE `subject` = 'English Language' AND `session` = '$session' AND `pupil_id` = '$pupil_id'");
$english_avg = mysqli_fetch_assoc($english_average);



 //Maths First Term
 $maths_sql1 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Mathematics' AND `session` = '$session' AND `term` = 1 AND `pupil_id` = '$pupil_id'");
 $maths_row1 = mysqli_fetch_assoc($maths_sql1);

 //Maths Second Term
 $maths_sql2 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Mathematics' AND `session` = '$session' AND `term` = 2 AND `pupil_id` = '$pupil_id'");
 $maths_row2 = mysqli_fetch_assoc($maths_sql2);

 //Maths Third Term
 $maths_sql3 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Mathematics' AND `session` = '$session' AND `term` = 3 AND `pupil_id` = '$pupil_id'");
 $maths_row3 = mysqli_fetch_assoc($maths_sql3);

//average of maths
$maths_average = mysqli_query($conn,"SELECT AVG(total) AS average FROM results  WHERE `subject` = 'Mathematics' AND `session` = '$session' AND `pupil_id` = '$pupil_id'");
$maths_avg = mysqli_fetch_assoc($maths_average);

 //Igbo First term
 $igbo_sql1 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Igbo Language' AND `session` = '$session' AND `term` = 1 AND `pupil_id` = '$pupil_id'");
 $igbo_row1 = mysqli_fetch_assoc($igbo_sql1);

 //Igbo second term
 $igbo_sql2 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Igbo Language' AND `session` = '$session' AND `term` = 2 AND `pupil_id` = '$pupil_id'");
 $igbo_row2 = mysqli_fetch_assoc($igbo_sql2);

 //Igbo third term
 $igbo_sql3 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Igbo Language' AND `session` = '$session' AND `term` = 3 AND `pupil_id` = '$pupil_id'");
 $igbo_row3 = mysqli_fetch_assoc($igbo_sql3);

 //average of igbo
$igbo_average = mysqli_query($conn,"SELECT AVG(total) AS average FROM results  WHERE `subject` = 'Igbo Language' AND `session` = '$session' AND `pupil_id` = '$pupil_id'");
$igbo_avg = mysqli_fetch_assoc($igbo_average);


//Computer First Term
 $computer_sql1 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Computer Science' AND `session` = '$session' AND `term` = 1 AND `pupil_id` = '$pupil_id'");
 $computer_row1 = mysqli_fetch_assoc($computer_sql1);

 //Computer Second Term
 $computer_sql2 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Computer Science' AND `session` = '$session' AND `term` = 2 AND `pupil_id` = '$pupil_id'");
 $computer_row2 = mysqli_fetch_assoc($computer_sql2);

 //Computer Third Term
 $computer_sql3 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Computer Science' AND `session` = '$session' AND `term` = 3 AND `pupil_id` = '$pupil_id'");
 $computer_row3 = mysqli_fetch_assoc($computer_sql3);

//average of computer
$computer_average = mysqli_query($conn,"SELECT AVG(total) AS average FROM results  WHERE `subject` = 'Computer Science' AND `session` = '$session' AND `pupil_id` = '$pupil_id'");
$computer_avg = mysqli_fetch_assoc($computer_average);


 //Civic First term
 $civic_sql1 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Civic Education' AND `session` = '$session' AND `term` = 1 AND `pupil_id` = '$pupil_id'");
 $civic_row1 = mysqli_fetch_assoc($civic_sql1);

 //CivicSecond Term
 $civic_sql2 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Civic Education' AND `session` = '$session' AND `term` = 2 AND `pupil_id` = '$pupil_id'");
 $civic_row2 = mysqli_fetch_assoc($civic_sql2);

 //Civic Thir term
 $civic_sql3 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Civic Education' AND `session` = '$session' AND `term` = 3 AND `pupil_id` = '$pupil_id'");
 $civic_row3 = mysqli_fetch_assoc($civic_sql3);

//average of computer
$civic_average = mysqli_query($conn,"SELECT AVG(total) AS average FROM results  WHERE `subject` = 'Civic Education' AND `session` = '$session' AND `pupil_id` = '$pupil_id'");
$civic_avg = mysqli_fetch_assoc($civic_average);

 //Agric First  term
 $agric_sql1 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Agricultural Science' AND `session` = '$session' AND `term` = 1 AND `pupil_id` = '$pupil_id'");
 $agric_row1 = mysqli_fetch_assoc($agric_sql1);
 
 //Agric Second term
 $agric_sql2 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Agricultural Science' AND `session` = '$session' AND `term` = 2 AND `pupil_id` = '$pupil_id'");
 $agric_row2= mysqli_fetch_assoc($agric_sql2);
 
  //Agric Third term
 $agric_sql3 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Agricultural Science' AND `session` = '$session' AND `term` = 3 AND `pupil_id` = '$pupil_id'");
 $agric_row3 = mysqli_fetch_assoc($agric_sql3);
 
 //average of Agric
$agric_average = mysqli_query($conn,"SELECT AVG(total) AS average FROM results  WHERE `subject` = 'Agricultural Science' AND `session` = '$session' AND `pupil_id` = '$pupil_id'");
$agric_avg = mysqli_fetch_assoc($agric_average);


 //Social first term
 $social_sql1 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Social Studies' AND `session` = '$session' AND `term` = 1 AND `pupil_id` = '$pupil_id'");
 $social_row1 = mysqli_fetch_assoc($social_sql1);

 //Social second term
 $social_sql2 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Social Studies' AND `session` = '$session' AND `term` = 2 AND `pupil_id` = '$pupil_id'");
 $social_row2 = mysqli_fetch_assoc($social_sql2);

 //Social third term
 $social_sql3 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Social Studies' AND `session` = '$session' AND `term` = 3 AND `pupil_id` = '$pupil_id'");
 $social_row3 = mysqli_fetch_assoc($social_sql3);

 //average of social studeies
$social_average = mysqli_query($conn,"SELECT AVG(total) AS average FROM results  WHERE `subject` = 'Social Studies' AND `session` = '$session' AND `pupil_id` = '$pupil_id'");
$social_avg = mysqli_fetch_assoc($social_average);


 //Health First Semester
 $health_sql1 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Health Education' AND `session` = '$session' AND `term` = 1 AND `pupil_id` = '$pupil_id'");
 $health_row1 = mysqli_fetch_assoc($health_sql1);
 
 //Health Second Semester
 $health_sql2 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Health Education' AND `session` = '$session' AND `term` = 2 AND `pupil_id` = '$pupil_id'");
 $health_row2 = mysqli_fetch_assoc($health_sql2);
 
  //Health Third semseter
 $health_sql3 = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Health Education' AND `session` = '$session' AND `term` = 3 AND `pupil_id` = '$pupil_id'");
 $health_row3 = mysqli_fetch_assoc($health_sql3);

 //average of Health Education
$health_average = mysqli_query($conn,"SELECT AVG(total) AS average FROM results  WHERE `subject` = 'Health Education' AND `session` = '$session' AND `pupil_id` = '$pupil_id'");
$health_avg = mysqli_fetch_assoc($health_average);

   
?> 



<!-- /script-for chart- -->
<script src="js/chart.js"></script>
<script src="js/utils.js"></script>
<!--inner block start here-->
<div class="inner-block">
  <div class="bread-crom">
		<p>
		<i class="fa fa-home"></i>	Teacher/Pupil Performance
		</p>
		<hr style="border: 1px solid #008000;"/>
	</div>
    <div class="blank">
      
      <div class="row">


          <div class="col col-md-12">
            <div class="panel panel-info text-center">
              <p><?php echo $fname .' '.$lname.' '.$session.' Academic Session Performance';?></p>
              <div class="panel-body">

                <div style="width: 100%">
                    <canvas id="canvas"></canvas>
                </div>
                <button id="randomizeData">Pupil's Performance Tracker</button>
                <script>
                    var color = Chart.helpers.color;
                    var barChartData = {
                        labels: ['English Language', 'Mathematics','Civic Education', 'Agricultural Science', 'Igbo Language', 'Social Studies', 'Computer Science', 'Health Education'],
                        datasets: [{
                            type: 'bar',
                            label: 'First Term',
                            backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                            borderColor: window.chartColors.red,
                            data: [
                                <?php echo $english_row1['total'];?>,
                                <?php echo $maths_row1['total'];?>,
                                <?php echo $civic_row1['total'];?>,
                                <?php echo $agric_row1['total'];?>,
                                <?php echo $igbo_row1['total'];?>,
                                <?php echo $social_row1['total'];?>,
                                <?php echo $computer_row1['total'];?>,
                                <?php echo $health_row1['total'];?>
                            ]
                        },
                        
                        {
                            type: 'bar',
                            label: 'Second Term',
                            backgroundColor: color(window.chartColors.green).alpha(0.2).rgbString(),
                            borderColor: window.chartColors.green,
                            data: [
                                <?php echo $english_row2['total'];?>,
                                <?php echo $maths_row2['total'];?>,
                                <?php echo $civic_row2['total'];?>,
                                <?php echo $agric_row2['total'];?>,
                                <?php echo $igbo_row2['total'];?>,
                                <?php echo $social_row2['total'];?>,
                                <?php echo $computer_row2['total'];?>,
                                <?php echo $health_row2['total'];?>
                            ]
                        },

                        {
                            type: 'bar',
                            label: 'Third Term',
                            backgroundColor: color(window.chartColors.yellow).alpha(0.2).rgbString(),
                            borderColor: window.chartColors.green,
                            data: [
                                <?php echo $english_row3['total'];?>,
                                <?php echo $maths_row3['total'];?>,
                                <?php echo $civic_row3['total'];?>,
                                <?php echo $agric_row3['total'];?>,
                                <?php echo $igbo_row3['total'];?>,
                                <?php echo $social_row3['total'];?>,
                                <?php echo $computer_row3['total'];?>,
                                <?php echo $health_row3['total'];?>
                            ]
                        },
                    
                        {
                            type: 'line',
                            label: 'Average',
                            fill:false,
                            backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                            borderColor: window.chartColors.blue,
                            data: [
                                <?php echo $english_avg['average'];?>,
                                <?php echo $maths_avg['average'];?>,
                                <?php echo $civic_avg['average'];?>,
                                <?php echo $agric_avg['average'];?>,
                                <?php echo $igbo_avg['average'];?>,
                                <?php echo $social_avg['average'];?>,
                                 <?php echo $computer_avg['average'];?>,
                                <?php echo $health_avg['average'];?>
                            ]
                        }
                        
                        ]
                    };

                    // Define a plugin to provide data labels
                    Chart.plugins.register({
                        afterDatasetsDraw: function(chart) {
                            var ctx = chart.ctx;

                            chart.data.datasets.forEach(function(dataset, i) {
                                var meta = chart.getDatasetMeta(i);
                                if (!meta.hidden) {
                                    meta.data.forEach(function(element, index) {
                                        // Draw the text in black, with the specified font
                                        ctx.fillStyle = 'rgb(0, 0, 0)';

                                        var fontSize = 16;
                                        var fontStyle = 'normal';
                                        var fontFamily = 'Helvetica Neue';
                                        ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

                                        // Just naively convert to string for now
                                        var dataString = dataset.data[index].toString();

                                        // Make sure alignment settings are correct
                                        ctx.textAlign = 'center';
                                        ctx.textBaseline = 'middle';

                                        var padding = 5;
                                        var position = element.tooltipPosition();
                                        ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);
                                    });
                                }
                            });
                        }
                    });

                    window.onload = function() {
                        var ctx = document.getElementById('canvas').getContext('2d');
                        window.myBar = new Chart(ctx, {
                            type: 'bar',
                            data: barChartData,
                            options: {
                                responsive: true,
                                legend: {
                                    position: 'bottom',
                                },
                                title: {
                                    display: true,
                                    text: ''
                                },
                            }
                        });
                    };

                    document.getElementById('randomizeData').addEventListener('click', function() {
                        barChartData.datasets.forEach(function(dataset) {
                            dataset.data = dataset.data.map(function() {
                                return randomScalingFactor();
                            });
                        });
                        window.myBar.update();
                    });
                </script>


              </div>
            </div>
          </div>

        

      </div>

    </div>
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