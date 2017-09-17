<?php

include ("../inc/Check_Session.php");
// check if logged-in, redirect to logged-in homepage
if (getUser()) {
    header ("location: HomePage.php");
}
/*
session_start();
if (isset($_SESSION['user_id'])) {
    header ("location: HomePage.php");
}
*/

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
                <li><a href="#header" target="_parent"> Home </a></li>
                <li><a href="#About_Us" target="_parent"> About Us </a></li>
                <li class="small-logo"><a href="#header"><img src="../img/small-logo.png" alt=""></a></li>
                <li><a href="#Log_In" target="_parent"> Log In </a></li>
                <li><a href="#Register_Now" target="_parent"> Register </a></li>
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

<script type="text/javascript">
    $(document).ready(function(e) {
        $('#test').scrollToFixed();
        $('.res-nav_click').click(function(){
            $('.main-nav').slideToggle();
            return false    
            
        });
        
    });
</script>

  <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100
      }
    );
    wow.init();
  </script>


<script type="text/javascript">
    $(window).load(function(){
        
        $('.main-nav li a, .servicelink').bind('click',function(event){
            var $anchor = $(this);
            
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 102
            }, 1500,'easeInOutExpo');
            /*
            if you don't want to use the easing effects:
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1000);
            */
      if ($(window).width() < 768 ) { 
        $('.main-nav').hide(); 
      }
            event.preventDefault();
        });
    })
</script>

<script type="text/javascript">

$(window).load(function(){
  
  
  var $container = $('.portfolioContainer'),
      $body = $('body'),
      colW = 375,
      columns = null;

  
  $container.isotope({
    // disable window resizing
    resizable: true,
    masonry: {
      columnWidth: colW
    }
  });
  
  $(window).smartresize(function(){
    // check if columns has changed
    var currentColumns = Math.floor( ( $body.width() -30 ) / colW );
    if ( currentColumns !== columns ) {
      // set new column count
      columns = currentColumns;
      // apply width to container manually, then trigger relayout
      $container.width( columns * colW )
        .isotope('reLayout');
    }
    
  }).smartresize(); // trigger resize to set container width
  $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
            
            filter: selector,
         });
         return false;
    });
  
});

</script>

</body>
</html>

