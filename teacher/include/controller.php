<?php
include('../../controller/session.php');
include('../../controller/dbconnet.php');

if(isset($_POST['delete_results'])){
   
  $subject= $_POST['subject'];
  $session= $_POST['session'];
  $term= $_POST['term'];
   
   $klass= $_POST['klass'];
   $level= $_POST['level'];

    //$sql = "DELETE FROM results WHERE `subject`='$subject' AND `session` = '$session' ";
    $sql = "DELETE FROM results WHERE subject = '$subject' AND session = '$session' AND term = '$term' AND level ='$level'  AND class =  '$klass' AND `teacher` ='$username'";

    if (mysqli_query($conn, $sql)) {

        //take to to where he came from
       header("location:../manage_result.php");
       
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
        header("location:../manage_result.php");
    }
}
?>