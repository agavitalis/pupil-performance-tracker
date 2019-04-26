<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "judith";

//connection for heroku
    $servername_live = "us-cdbr-iron-east-02.cleardb.net";
    $user_live = "baa9c44a654512";
    $password_live = "c1daa00b";
    $dbname_live = "heroku_026a3952fc42287";
    // Create connection
    
    //$conn = mysqli_connect($servername, $user, $password,$dbname);
    $conn = mysqli_connect($servername_live, $user_live, $password_live,$dbname_live);



// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//mysql://baa9c44a654512:c1daa00b@us-cdbr-iron-east-02.cleardb.net/heroku_026a3952fc42287?reconnect=true
?> 