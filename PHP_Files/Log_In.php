<?php
//include the database connectivity setting
include ("../inc/DataBaseConnection.php");
include ("../inc/Template.php");
//include the navigation bar
//include ("inc/header-navbar.php");
?>

<div class="container">
    <section class="main-section contact" id="Log_In">
        <div class="row">

                    <div class="form">

                        <h2>Log In</h2>
                        <div class="text-center">
                            <h3 >your account here.</h3>
                            <br>
                        </div>

                        <form class="contactForm" role="form" name="" action="Verify_Log_In.php" method="POST">
                        
                            <div class="form-group">
                                <input class="form-control input-text" name="User_IC_Number" type="password" placeholder="User IC Number" maxlength="14" id="User_IC_Number">
                                <br>
                                <div class="validation"></div>
                            </div>

                            <div class="form-group">
                                <input class="form-control input-text" name="User_Name" type="text" placeholder="User Name" maxlength="20" id="User_Name">
                                <br>
                                <div class="validation"></div>
                            </div>

                            <div class="form-group">
                                <input class="form-control input-text" name="User_Password" type="password" placeholder="Password" id="User_Password">
                            <br>
                                <div class="validation"></div>
                            </div>
                            
                            <div class="text-center">
                                <button class="input-btn" type="reset"> Clear</button> 
                                <button class="input-btn" name="Login" type="submit"> Login</button>
                            </div> 
                                <?php 
                                    if (isset($_POST['msg'])){
                                    echo "<span color='red'>".$_GET['msg'].
                                    "</span>";
                                    }
                                  ?>
                        </form>

                    </div>  
        </div>
    </section>
</div>
