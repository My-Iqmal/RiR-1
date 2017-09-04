<?php
// logout
session_start();
//if (isset($_SESSION['user_id'])){
    session_destroy();//this to destroy all session info
//}
// redirect to public index.php
header("location: ../PHP_Files/index.php?msg=You have been logged out");

//include ("../inc/Check_Session.php");
include ("../inc/DataBaseConnection.php");
include ("../inc/Template.php");

