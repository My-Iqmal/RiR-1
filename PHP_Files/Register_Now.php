<?php 
//include the database connectivity setting
    include ("../inc/DataBaseConnection.php");
    include ("../inc/Template.php");
//include the navigation bar
//include ("inc/header-navbar.php");?>

<div class="container">
    <section class="main-section contact" id="contact">
        <div class="row">
                    <div class="form">
                        
                        <div class="text-center">
                            <h2>Register</h2>
                            <h3>your account here.</h3>
                            <br>
                        </div>
                        <form class="contactForm" role="form" name="" action="Registration_Veryfication.php" method="POST">
                             
                            <div class="form-group">
                                <!-- <h2>IC Number : </h2> -->
                                <input class="form-control input-text" name="User_IC_Number" type="password" placeholder="IC Number" maxlength="14" size="" id="User_IC_Number">
                                <br><br>
                                <div class="validation"></div>
                            </div>

                            <div class="form-group">
                                <!-- <h2>Full Name :</h2> -->
                                <input class="form-control input-text" name="User_FullName" type="text" placeholder="Full Name" maxlength="50" size="" id="User_FullName">
                                <br><br>
                                <div class="validation"></div>
                            </div>

                            <div class="form-group">
                                <!-- <h2>Username : </h2> -->
                                <input class="form-control input-text" name="User_Name" type="text" placeholder="Username" maxlength="20" size="" id="User_Name">
                                <br><br>
                                <div class="validation"></div>
                            </div>

                            <div class="form-group">
                                <!-- <h2>Password : </h2> -->
                                <input class="form-control input-text" name="User_Password" type="password" placeholder="Password" size="" id="User_Password">
                                <br><br>
                                <div class="validation"></div>
                            </div>

                            <div class="form-group">
                                <!-- <h2>Birthdate : </h2> -->
                                <input class="form-control input-text" name="User_Birthdate" type="text" placeholder="Birthdate" maxlength="10" size="" id="User_Birthdate">
                                <br><br>
                                <div class="validation"></div>
                            </div>

                            <div class="form-group">
                                <!-- <h2>Email : </h2> -->
                                <input class="form-control input-text" name="User_Email" type="text" placeholder="Email" maxlength="50" size="" id="User_Email">
                                <br><br> 
                                <div class="validation"></div>
                            </div>

                            <div class="text-center">
                                <button class="input-btn" type="reset"> Clear</button> 
                                <button class="input-btn" type="submit"> Register</button>
                            </div> 
                        </form>

                    </div>  
            </div>
    </section>
</div>


<?php 
//include the footer
//include ("inc/footer.php");?>
