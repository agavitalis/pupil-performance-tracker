<?php
include('session.php');
include('dbconnet.php');

//check if these fields are avaliable
if(isset($_POST['login'])){
   
    if(isset($_POST['username']) && isset($_POST['password']) ){
       
        //a function to validate user input
        function validation($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        //i called the functions here
        $username = validation($_POST["username"]);
        $password = validation($_POST["password"]);
        $password = md5(md5($password));
              
        //Now I want tocheck for th user in the database
        $sql = ("SELECT * FROM users WHERE `username` = '$username' AND `password` = '$password' ");
        $result = mysqli_query($conn, $sql);

        //I converted everything to an associative array
        $row = mysqli_fetch_assoc($result);
        //print_r($row);
        
        if (mysqli_num_rows($result) > 0 && $row['role'] == 1 ) {
            //user exits
            $_SESSION["username"] = $username;
            header ('location:../admin/index.php');
        } 
        elseif (mysqli_num_rows($result) > 0 && $row['role'] == 2 ) {
            //user exits
            $_SESSION["username"] = $username;
            header ('location:../teacher/index.php');
           
        }
        else{
             //user does not exist
             $_SESSION["error"] = "Invalid username or password";
             header ('location:../index.php');
        }
      
    }
}
?>