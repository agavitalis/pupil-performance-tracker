<?php
include('../controller/session.php');
include('../controller/dbconnet.php');
include('include/header.php');

if(!isset($_POST['session']) || !isset($_POST['term']) ){
    header("location:view_pupils.php");
}

//read the form variables
$pupil_id = $_POST['term_id'];
$fname = $_POST['term_fname'];
$lname = $_POST['term_lname'];
$klass = $_POST['term_class'];
$level = $_POST['term_level'];
$session = $_POST['session'];
$term = $_POST['term'];

if($term == 1)
{
    $term_s = "First";
}
elseif ($term == 2) {
    $term_s = "Second";
}
else{
     $term_s = "Third";
}


//get the all my subjects,one by one 
//English
 $english_sql = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'English Language' AND `class` = '$klass' AND `term` = '$term' AND `pupil_id` = '$pupil_id'");
 $english_row = mysqli_fetch_assoc($english_sql);

 //Maths
 $maths_sql = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Mathematics' AND `class` = '$klass' AND `term` = '$term' AND `pupil_id` = '$pupil_id'");
 $maths_row = mysqli_fetch_assoc($maths_sql);

 //Igbo
 $igbo_sql = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Igbo Language' AND `class` = '$klass' AND `term` = '$term' AND `pupil_id` = '$pupil_id'");
 $igbo_row = mysqli_fetch_assoc($igbo_sql);

//Computer
 $computer_sql = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Computer Science' AND `class` = '$klass' AND `term` = '$term' AND `pupil_id` = '$pupil_id'");
 $computer_row = mysqli_fetch_assoc($computer_sql);

 //Civic
 $civic_sql = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Civic Education' AND `class` = '$klass' AND `term` = '$term' AND `pupil_id` = '$pupil_id'");
 $civic_row = mysqli_fetch_assoc($civic_sql);

 //Agric
 $agric_sql = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Agricultural Science' AND `class` = '$klass' AND `term` = '$term' AND `pupil_id` = '$pupil_id'");
 $agric_row = mysqli_fetch_assoc($agric_sql);
 
 //Social
 $social_sql = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Social Studies' AND `class` = '$klass' AND `term` = '$term' AND `pupil_id` = '$pupil_id'");
 $social_row = mysqli_fetch_assoc($social_sql);

 //Health
 $health_sql = mysqli_query($conn,"SELECT total FROM results  WHERE `subject` = 'Health Education' AND `class` = '$klass' AND `term` = '$term' AND `pupil_id` = '$pupil_id'");
 $health_row = mysqli_fetch_assoc($health_sql);
 
   
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
              <p><?php echo $fname .' '.$lname.' '.$term_s.' Term Performance';?></p>
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
                                <?php echo $english_row['total'];?>,
                                <?php echo $maths_row['total'];?>,
                                <?php echo $civic_row['total'];?>,
                                <?php echo $agric_row['total'];?>,
                                <?php echo $igbo_row['total'];?>,
                                <?php echo $social_row['total'];?>,
                                <?php echo $computer_row['total'];?>,
                                <?php echo $health_row['total'];?>
                            ]
                        },
                    
                        {
                            type: 'line',
                            label: 'Average',
                            fill:false,
                            backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                            borderColor: window.chartColors.blue,
                            data: [
                                <?php echo $english_row['total'];?>,
                                <?php echo $maths_row['total'];?>,
                                <?php echo $civic_row['total'];?>,
                                <?php echo $agric_row['total'];?>,
                                <?php echo $igbo_row['total'];?>,
                                <?php echo $social_row['total'];?>,
                                 <?php echo $computer_row['total'];?>,
                                <?php echo $health_row['total'];?>
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