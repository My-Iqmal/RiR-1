<?php
    include ("../inc/Check_Session.php");
    include ("../inc/DataBaseConnection.php");
    include ("../inc/Template.php");
?>

<nav class="main-nav-outer" id="test"><!--main-nav-start-->
    <div>
        <ul class="main-nav">  <!--  This is For Navigation Menu-->
            <li class="small-logo"><a href="#header"><img src="../img/small-logo.png" alt=""></a></li>
            <li><a href="HomePage.php" target="_parent">Home</a></li>
            <li><a href="InsertRecord.php" target="_parent">Insert Record</a></li>
            <li><a href="DeleteRecord.php" target="_parent">Delete Record </a></li>
            <li><a href="ViewRecord.php" target="_parent">View Record </a></li>
            <li><a href="EditRecord.php" target="_parent">Edit Record</a></li>
            <li><a href="PrintRecord.php" target="_parent">Print Record </a></li>
            <li><a href="Log_Out_Comfirmation.php" target="_parent">Log Out </a></li>
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav><!--main-nav-end-->   

<header class="header" id="header"><!--header-start-->
    <div class="container">
        <ul class="we-create animated fadeInUp delay-1s">
            <li>Log Out <br> Are you leaving Now?</li>
        </ul>
        <figure class="logo animated fadeInDown delay-07s">
            <a href="#"><img src="../img/logo.png" alt=""></a>
        <ul class="we-create animated fadeInUp delay-1s">
            <li class="RiR_Word">RiR</li>
        </ul>
        </figure>
        <h1> Are you sure want to log out from your account? </h1>
            
            <div class="container">
                <section class="main-section contact" id="contact">
                    
                        <div class="row">
                            <div class="col-lg-6 col-sm-7 wow fadeInLeft">
                                <form class="contactForm" role="form" name="" action="Log_Out.php" method="POST">
                                    <div class="text-center">
                                        <button class="input-btn" type="submit">YES </button>
                                    </div> 
                                </form>
                            </div>

                            <div class="col-lg-6 col-sm-7 wow fadeInLeft">
                                <form class="contactForm" role="form" name="" action="HomePage.php" method="POST">
                                    <div class="text-center">
                                        <button class="input-btn" type="submit"> NO </button>
                                    </div> 
                                </form>
                            </div>

                        </div>
                </section>
            
    </div><br>
</header><!--header-end-->
</div>
<br>

