<?php
    include ("../inc/Check_Session.php");
    include ("../inc/DataBaseConnection.php");
    include ("../inc/Template.php");
?>

<!DOCTYPE html>
<html>

<head>

    <title>Record It Right!</title>

</head>

<body>

<nav class="main-nav-outer" id="test"><!--main-nav-start-->
    <div>
        <ul class="main-nav">  <!--  This is For Navigation Menu-->
            <li class="small-logo"><a href="#header"><img src="../img/small-logo.png" alt=""></a></li>
            <li><a class="active" href="HomePage.php" target="_parent">Home</a></li>
            <li><a href="InsertRecord.php" target="_parent">Insert Record</a></li>
            <!-- li><a href="DeleteRecord.php" target="_parent">Delete Record </a></li -->
            <li><a href="ViewRecord.php" target="_parent">View Record </a></li>
            <!-- li><a href="EditRecord.php" target="_parent">Edit Record</a></li -->
            <li><a href="PrintRecord.php" target="_parent">Print Record </a></li>
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
            <li>Welcome to Record It Right! <br> I am a system that had been created to serve you.</li>
        </ul>
            <a class="link animated fadeInUp delay-1s servicelink" href="#service">Get Started</a>
        <ul>
            <!-- <li> <br> </li> -->
        </ul>
    </div>
</header><!--header-end-->

</body>
</html>    


