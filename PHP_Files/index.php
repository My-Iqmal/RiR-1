<?php
// check if logged-in, redirect to logged-in homepage
session_start();
if (isset($_SESSION['user_id'])) {
    header ("location: HomePage.php");
}

include ("../inc/DataBaseConnection.php");
include ("../inc/Template.php");
?>

</head>
<body>
<div class="text-center">   
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
        <!-- </ul> -->
            <!-- <a class="link animated fadeInUp delay-1s servicelink" href="#service">Get Started</a> -->
        <!-- <ul> -->
            <!-- <li> <br> </li> -->

        </ul>

    </div>
</header><!--header-end-->   

<nav class="main-nav-outer" id="test"><!--main-nav-start-->
   

</nav><!--main-nav-end-->  

<nav class="main-nav-outer" id="test"><!--main-nav-start-->
    <div>
        <ul class="main-nav">  <!--  This is For Navigation Menu-->
                <li><a href="HomePageBeforeLogIn.html" target="_parent"> Home </a></li>
                <li><a href="AboutUsBeforeLogIn.html" target="_parent"> About Us </a></li>
                <li class="small-logo"><a href="#header"><img src="../img/small-logo.png" alt=""></a></li>
                <li><a href="LogInBeforeLogIn.html" target="_parent"> Log In </a></li>
                <li><a href="RegisterBeforeLogIn.html" target="_parent"> Register </a></li>
            </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav><!--main-nav-end-->   


<?php
    include ("About_Us.php");
?>
        <div class="row">
            <!-- <div class="col-lg-4 col-sm-6 wow fadeInLeft delay-05s"> -->
                    <div class="text-center">
                    <?php

                        include ("Log_In.php");
                        include ("Register_Now.php");
                    ?>
                    </div>
        </div>
</div>
</body>
</html>

