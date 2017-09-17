<?php
$title = 'Insert transaction';
include ("../inc/Check_Session.php");
include ("../inc/DataBaseConnection.php");
include ("../inc/Template.php");

require '../inc/Carbon.php';
use Carbon\Carbon;

// handle form submit
if (isset($_POST['insert'])) {

    // get posted datas
    $Day = $_POST['Day'];
    $Category = $_POST['Category'];
    $Item = $_POST['Item'];
    $Quantity = $_POST['Quantity'];
    $Price = $_POST['Price'];
    $Transaction_Date = isset($_POST['Purchase_Date']) && ! empty($_POST['Purchase_Date'])
        ? "'".Carbon::parse($_POST['Purchase_Date'])->format('Y-m-d H:i')."'"
        : 'NOW()';

    // additional datas
    $user_id = $_SESSION['user_id'];

    $sql = "
INSERT INTO rir_expenses (Day, Category, Item, Quantity, Price, user_id, Transaction_Date, Entry_Date) 
VALUES ('$Day', '$Category', '$Item', $Quantity, $Price, $user_id, $Transaction_Date, NOW());
";

    $rs=mysqli_query($db, $sql);

    addSuccessAlert('Transaction '.$Transaction_Date.' has been saved <strong>successfully.</strong>');

    // redirect to view record page
    header ("location: ViewRecord.php");
}
?>
<link rel="stylesheet" type="text/css" href="../css/jquery.datetimepicker.min.css"/ >

<nav class="main-nav-outer" id="test"><!--main-nav-start-->
	<div>
        <ul class="main-nav">  <!--  This is For Navigation Menu-->
            <li class="small-logo"><a href="#header"><img src="../img/small-logo.png" alt=""></a></li>
            <li><a href="HomePage.php" target="_parent">Home</a></li>
            <!-- <li><a href="ViewProfile.php" target="_parent">My Profile</a></li> -->
            <li><a class="active" href="InsertRecord.php" target="_parent">Insert Record</a></li>
            <!-- li><a href="DeleteRecord.php" target="_parent">Delete Record </a></li -->
            <li><a href="ViewRecord.php" target="_parent">View Record </a></li>
            <!-- li><a href="EditRecord.php" target="_parent">Edit Record</a></li -->
            <li><a href="SummaryRecord.php" target="_parent">Summary Record </a></li>
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
            <li>Insert Record.<br>  Add your new record today!</li>
            <!-- <li> <br> </li> -->
        </ul>
    </div>
</header><!--header-end-->


<section class="main-section" id="InsertRecord"><!--main-section-start--> <!--  This is for Content  -->
    <div class="container">
        <h2>Insert record</h2> <br><br>
        <div class="form">
            <form class="contactForm" role="form" name="" action="" method="POST">

                <!-- <div class="form-group col-md-4">
                    <input class="form-control input-text" name="Transaction_Date" type="text" placeholder="Data Entry Date" id="Transaction_Date">
                    <br />
                    <div class="validation"></div>
                </div> -->

                <div class="form-group col-md-8">
                    <h3> Purchase Date</h3>
                    <input class="form-control input-text" name="Purchase_Date" type="text"  placeholder="Purchase Date" id="Purchase_Date">
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group col-md-4">
                    <h3> Day </h3>
                    <input class="form-control input-text" name="Day" type="text" id="Day" readonly>
                    <br />
                    <div class="validation"></div>
                </div>

                <!-- <div class="form-group col-md-8">
                <select required class="form-control input-text" name="Day" id="Day"> 
                    <option value=""> Day </option>
                    <option value="<php ?> Monday"> Monday </option>
                    <option value="Tuesday"> Tuesday </option>
                    <option value="Wednesday"> Wednesday  </option>
                    <option value="Thursday"> Thursday </option> 
                    <option value="Friday"> Friday </option>
                    <option value="Saturday"> Saturday </option>
                    <option value="Sunday"> Sunday </option>
                </select><br>
                </div> -->

                <div class="form-group col-md-4">
                <h3> Category</h3>
                <select required class="form-control input-text form-group col-md-8" name="Category" id="Category"> 
                    <option value=""> Category </option>
                    <option value="Toiletries"> Toiletries </option>
                    <option value="Stationary"> Stationary </option>
                    <option value="Study Materials"> Study Materials </option>
                    <option value="Food"> Food </option> 
                    <option value="Drinks"> Drinks </option> 
                    <option value="Appearance"> Appearance </option>
                    <option value="Petrol"> Petrol </option>
                    <option value="Charity"> Charity </option>
                    <option value="Telecomunication"> Telecomunication </option>
                    <option value="Transport"> Transport </option>
                    <option value="Fees"> Fees </option>
                    <option value="Others"> Others </option>
                </select><br>
                </div>

                <div class="form-group col-md-8">
                <h3> Item </h3>
                    <input class="form-control input-text" name="Item" type="text" placeholder="Item" maxlength="255" id="Item">
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group col-md-4">
                    <h3> Quantity </h3>
                    <input class="form-control input-text" name="Quantity" type="number" step="0" placeholder="Quantity" id="Quantity">
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group col-md-2">
                    <h3> Price </h3>
                    <input class="form-control input-text" name="Price" type="number" placeholder="Total Price(RM)" id="Price">
                    <br />
                    <div class="validation"></div>
                </div>
<!-- 
                <div class="form-group col-md-8">
                    <input class="form-control input-text" name="User_Id" type="text" placeholder="User_Id" maxlength="255" id="User_Id">
                    <br />
                    <div class="validation"></div>
                </div> -->

                <div class="text-center form-group col-md-6">
                    <button class="input-btn" type="reset"> Clear</button>
                    <button class="input-btn" name="insert" type="submit"> Save</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="../js/jquery.datetimepicker.full.min.js"></script>
<script src="../js/moment.min.js"></script>

<script>
$(function(){
    $('input#Transaction_Date').datetimepicker({
        format: 'Y/m/d H:i',
        step: 15,
        defaultDate:new Date()
    });
});
</script>

<script>
$(function(){
    $('input#Purchase_Date').datetimepicker({
        format: 'd F Y g:i A',
        step: 15
    });
    $('input#Purchase_Date').on('change', function(){
        var p_date = moment($(this).val());
        $('input#Day').val(p_date.format('dddd'));
    });
    $('input#Purchase_Date')
        // .val('<?php echo date('d F Y g:i A'); ?>')
        .trigger('change');
});
</script>