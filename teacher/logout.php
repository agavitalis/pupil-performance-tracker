<?php
include('../controller/session.php');
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();

//take to login page
header("location:../index.php");