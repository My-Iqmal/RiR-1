<?php
include ("../inc/Check_Session.php");
include ("../inc/DataBaseConnection.php");
include ("../inc/Template.php");

if (isset($_POST['cancel'])) {
    header('location: ViewRecord.php');
}

// handle for delete
if(isset($_POST['delete'])){//button DELETE clicked

    $id = $_POST['id'];
    $Transaction_Date = $_POST['Transaction_Date'];

    $sql="delete from rir_expenses 
        where id=".$_GET['id'];//sql qery to delete

    $rs=mysqli_query($db, $sql);
        if($rs==true){//successfully executed
            addSuccessAlert('Record Dated : '.$Transaction_Date.' has been deleted <strong>successfully.</strong>');
            header('location: ViewRecord.php');
    }
}

//get deleted id
$id = $_GET['id'];
if (!$id) { header ("location: ViewRecord.php"); }

// get the record
$error = false;

$result = mysqli_query($db, "SELECT * FROM rir_expenses WHERE id=".$id." LIMIT 1");
if (!mysqli_num_rows($result)) {
    $error = true;
    // addDangerAlert('<strong>Error!</strong> record with id: '.$id.' not found');
    header('location: ViewRecord.php');
}
$record = mysqli_fetch_object($result);
?>

<nav class="main-nav-outer" id="test"><!--main-nav-start-->
    <div>
        <ul class="main-nav">  <!--  This is For Navigation Menu-->
            <li class="small-logo"><a href="#header"><img src="../img/small-logo.png" alt=""></a></li>
            <li><a href="HomePage.php" target="_parent">Home</a></li>
            <li><a href="InsertRecord.php" target="_parent">Insert Record</a></li>
            <!-- li><a href="DeleteRecord.php" target="_parent">Delete Record </a></li -->
            <li><a class="active" href="ViewRecord.php" target="_parent">View Record </a></li>
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
            <li>Delete Record <br> Remove your old record today?</li>
        </ul>
        <figure class="logo animated fadeInDown delay-07s">
            <a href="#"><img src="../img/logo.png" alt=""></a>
        <ul class="we-create animated fadeInUp delay-1s">
            <li class="RiR_Word">RiR</li>
        </ul>
        </figure>
    </div>
</header><!--header-end-->

<!-- Day='$Day', Category='$Category', Item=$Item, Quantity=$Quantity, Price=$Price -->

<section class="main-section" id="service"><!--main-section-start--> <!--  This is for Content  -->
    <div class="container">
        <h2>Delete Record</h2><br>
        <div class="form">
            <form class="contactForm" role="form" name="" action="" method="POST">
                

                <div class="form-group col-md-4">
                <h3> Data Entry Date</h3>
                    <input class="form-control input-text" name="Transaction_Date" value="<?php echo $record->Transaction_Date ?>" type="text" placeholder="Data Entry Date" id="Transaction_Date" disabled>
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group col-md-8">
                <h3> Purchase Date</h3>
                    <input class="form-control input-text" name="Day" type="text" value="<?php echo $record->Day ?>" placeholder="Purchase Date" maxlength="64" id="Day" disabled>

                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group col-md-4">
                <h3> Category</h3>
                    <input class="form-control input-text" name="Category" type="text"  placeholder="Category" value="<?php echo $record->Category ?>" maxlength="255" id="Category" disabled>
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group col-md-8">
                <h3> Item</h3>
                    <input class="form-control input-text" name="Item" type="text" value="<?php echo $record->Item ?>" placeholder="Item" maxlength="255" id="Item" disabled>
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group col-md-4">
                <h3> Quantity</h3>
                    <input class="form-control input-text" name="Quantity" type="text" value="<?php echo $record->Quantity ?>" placeholder="Quantity" id="Quantity" disabled>
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group col-md-2">
                <h3> Price(Expenses)</h3>
                    <input class="form-control input-text" name="Price" type="text" value="<?php echo $record->Price ?>" placeholder="Price" id="Price" disabled>
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group col-md-6">
                <h3> <br> </h3>
                    <input name="id" type="hidden" value="<?php echo $record->id ?>">
                    <button class="input-btn" name="cancel" type="submit"> Cancel</button>
                    <button class="input-btn" name="delete" type="submit"> Delete</button>
                </div>
            </form>

            <!-- <div class="form-group col-md-3 ">
                <h3> No edit required </h3>
                <form class="contactForm" role="form" name="" action="ViewRecord.php" method="POST">
                    <div class="text-center">
                        <button class="input-btn" type="submit"> Cancel </button>
                    </div> 
                </form>
            </div> -->

        </div>
    </div>
</section>


