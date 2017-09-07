<?php
    include ("../inc/Check_Session.php");
    include ("../inc/DataBaseConnection.php");
    include ("../inc/Template.php");
    //
?>

<nav class="main-nav-outer" id="test"><!--main-nav-start-->
	<div>
        <ul class="main-nav">  <!--  This is For Navigation Menu-->
            <li class="small-logo"><a href="#header"><img src="../img/small-logo.png" alt=""></a></li>
            <li><a href="HomePage.php" target="_parent">Home</a></li>
            <!-- <li><a href="ViewProfile.php" target="_parent">My Profile</a></li> -->
            <li><a href="InsertRecord.php" target="_parent">Insert Record</a></li>
            <!-- li><a href="DeleteRecord.php" target="_parent">Delete Record </a></li -->
            <li><a href="ViewRecord.php" target="_parent">View Record </a></li>
            <!-- li><a href="EditRecord.php" target="_parent">Edit Record</a></li -->
            <li><a class="active" href="SummaryRecord.php" target="_parent">Summary Record </a></li>
            <li><a href="Log_Out_Comfirmation.php" target="_parent">Log Out </a></li>
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav><!--main-nav-end-->    

<header class="header" id="header"><!--header-start-->
    <div class="container">
        <ul class="we-create animated fadeInUp delay-1s">
            
        </ul>
        <figure class="logo animated fadeInDown delay-07s">
            <a href="#"><img src="../img/logo.png" alt=""></a>  
        </figure>   
        <h1 class="animated fadeInDown delay-07s">RiR</h1>
        <ul class="we-create animated fadeInUp delay-1s">
            <li>Summary Record <br> Get all your records up until today!</li>
            <!-- <li> <br> </li> -->
        </ul>
    </div>
</header><!--header-end-->
