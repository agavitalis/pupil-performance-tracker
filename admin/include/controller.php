<?php
include('../../controller/session.php');
include('../../controller/dbconnet.php');

//check if the delete was called
if($_POST['action']=='delete_teacher'){
    
    $user = $_POST['id'];
    // sql to delete a record
    $sql = "DELETE FROM users WHERE `username`='$user'";

    if (mysqli_query($conn, $sql)) {

    echo 1 ;

    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

//check if the update was triggered
if($_POST['action']=='update_teacher'){
    
    $user = $_POST['id'];
    // sql to delete a record
    $sql = "SELECT * FROM users WHERE `username`='$user'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
       $row = mysqli_fetch_assoc($result); 
       //encode it as json
       $encode = json_encode($row);
       echo $encode;
       

    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

//check if  update have been confirmed
if($_POST['action']=='confirm_update'){
    
    $teacher_id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $klass =strtoupper($_POST['class']);

    // sql to update a record
    $sql = "UPDATE users SET `first_name` = '$fname', `last_name` = '$lname',`email` = '$email',`gender` = '$gender',`class` = '$klass' WHERE id= '$teacher_id'";

    if (mysqli_query($conn, $sql)) {
        echo 1 ;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

?>