<?php
include ("../inc/Check_Session.php");

// logout
session_start();
logout();
/*
if (isset($_SESSION['user_id'])){
    session_destroy();//this to destroy all session info
}
*/
// redirect to public index.php
header("location: index.php");

//include ("../inc/Check_Session.php");
include ("../inc/DataBaseConnection.php");
include ("../inc/Template.php");

