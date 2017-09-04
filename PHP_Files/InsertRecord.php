<?php
$title = 'Insert transaction';
include ("../inc/Check_Session.php");
include ("../inc/DataBaseConnection.php");
include ("../inc/Template.php");

// handle form submit
if (isset($_POST['insert'])) {
    // get posted datas
    $item = $_POST['item'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $transaction_date = $_POST['transaction_date'] ? "'".$_POST['transaction_date']."'" : 'NOW()';

    // additional datas
    $user_id = $_SESSION['user_id'];
    $sql = "
INSERT INTO rir_expenses (item, description, amount, user_id, transaction_date) 
VALUES ('$item', '$description', $amount, $user_id, $transaction_date);
";
    $rs=mysqli_query($db, $sql);

    addSuccessAlert('<strong>Success!</strong> Transaction has been saved successfully.');

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
            <li><a class="active" href="InsertRecord.php" target="_parent">Insert Record</a></li>
            <!-- li><a href="DeleteRecord.php" target="_parent">Delete Record </a></li -->
            <li><a href="ViewRecord.php" target="_parent">View Records </a></li>
            <!-- li><a href="EditRecord.php" target="_parent">Edit Record</a></li -->
            <li><a href="PrintRecord.php" target="_parent">Print Record </a></li>
            <li><a href="Log_Out_Comfirmation.php" target="_parent">Log Out </a></li>
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav><!--main-nav-end-->    
    
<header class="header" id="header"><!--header-start--> <!--  This is for RiR  -->
	<div class="container">    
        <ul class="we-create animated fadeInUp delay-1s">
            <li>Insert Record <br> Add your new record today!</li>
        </ul>
    	<figure class="logo animated fadeInDown delay-07s">
        	<a href="#"><img src="../img/logo.png" alt=""></a>
        <ul class="we-create animated fadeInUp delay-1s">
            <li class="RiR_Word">RiR</li>
        </ul>
        </figure>
    </div>
</header><!--header-end--> <!--  This is for RiR  -->


<section class="main-section" id="service"><!--main-section-start--> <!--  This is for Content  -->
    <div class="container">
        <h2>Insert record</h2>
        <div class="form">
            <form class="contactForm" role="form" name="" action="" method="POST">
                <div class="form-group col-md-8">
                    <input class="form-control input-text" name="item" type="text" placeholder="Transaction item" maxlength="64" id="item">
                    <br />
                    <div class="validation"></div>
                </div>
                <div class="form-group col-md-4">
                    <input class="form-control input-text" name="amount" type="number" step="0.01" placeholder="Amount" id="amount">
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group col-md-8">
                    <input class="form-control input-text" name="description" type="text" placeholder="Transaction description" maxlength="255" id="description">
                    <br />
                    <div class="validation"></div>
                </div>
                <div class="form-group col-md-4">
                    <input class="form-control input-text" name="transaction_date" type="text" placeholder="Transaction Date" id="transaction_date">
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="text-center">
                    <button class="input-btn" type="reset"> Clear</button>
                    <button class="input-btn" name="insert" type="submit"> Save</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="../js/jquery.datetimepicker.full.min.js"></script>
<script>
$(function(){
    $('input#transaction_date').datetimepicker({
        format: 'Y/m/d H:i',
        step: 15,
        defaultDate:new Date()
    });
});
</script>