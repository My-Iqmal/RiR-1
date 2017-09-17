<?php
include ("../inc/Check_Session.php");
include ("../inc/DataBaseConnection.php");
include ("../inc/Template.php");

require '../inc/Carbon.php';
use Carbon\Carbon;

if (isset($_POST['cancel'])) {
    header('location: ViewRecord.php');
}

// handle form submit
if (isset($_POST['edit'])) {
    // TODO: security measures
    // get posted datas
    $id = $_POST['id'];
    $Transaction_Date = isset($_POST['Purchase_Date']) && ! empty($_POST['Purchase_Date'])
        ? "'".Carbon::parse($_POST['Purchase_Date'])->format('Y-m-d H:i')."'"
        : NULL;
    $Category = $_POST['Category'];
    $Item = $_POST['Item'];
    $Quantity = $_POST['Quantity'];
    $Price = $_POST['Price'];

    // additional datas
    $user_id = getUser()->id;

    // check only owner can update the record
    $rs = mysqli_query($db, "SELECT * FROM rir_expenses WHERE id=$id LIMIT 1");
    $row = mysqli_fetch_object($rs);

    if ($row->user_id != $user_id) {
        addDangerAlert('<strong>Error!</strong> cannot edit record not belong to you.');
        header('location: ViewRecord.php');
    }

    // update
    $sql = "
UPDATE rir_expenses SET Transaction_Date=$Transaction_Date, Category='$Category', Item='$Item', Quantity=$Quantity, Price=$Price
WHERE id = $id
";

    $rs=mysqli_query($db, $sql);

    addSuccessAlert('<strong>Success!</strong> Transaction ID:'.$id.' has been updated successfully.');

    // redirect to view record page
    header ("location: ViewRecord.php");

}

// get edited id
$id = $_GET['id'];
if (!$id) { header ("location: ViewRecord.php"); }

// get the record
$error = false;

$result = mysqli_query($db, "SELECT * FROM rir_expenses WHERE id=".$id." LIMIT 1");
if (!mysqli_num_rows($result)) {
    $error = true;
    addDangerAlert('<strong>Error!</strong> record with id: '.$id.' not found');
    header('location: ViewRecord.php');
}
$record = mysqli_fetch_object($result);
?>

<link rel="stylesheet" type="text/css" href="../css/jquery.datetimepicker.min.css"/ >

<nav class="main-nav-outer" id="test"><!--main-nav-start-->
	<div>
        <ul class="main-nav">  <!--  This is For Navigation Menu-->
            <li class="small-logo"><a href="#header"><img src="../img/small-logo.png" alt=""></a></li>
            <li><a href="HomePage.php" target="_parent">Home</a></li>
            <!-- <li><a href="ViewProfile.php" target="_parent">My Profile</a></li> -->
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

<?php if (! $error): ?>
<header class="header" id="header"><!--header-start-->
	<div class="container">
        <ul class="we-create animated fadeInUp delay-1s">
            <li>Edit Record <br> Update your records now!</li>
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
        <h2>Edit Record </h2><br>
        <div class="form">
            <form class="contactForm" role="form" name="" action="" method="POST">
                

                <div class="form-group col-md-4">
                <h3> Data Entry Date</h3>
                    <input class="form-control input-text" name="Entry_Date" type="text"
                           value="<?php echo $record->Entry_Date ?>"
                           placeholder="" id="Entry_Date" disabled>
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group col-md-8">
                <h3> Purchase Date</h3>
                    <input class="form-control input-text" name="Purchase_Date" type="text"
                           value="<?php echo $record->Transaction_Date
                               ? Carbon::parse($record->Transaction_Date)->format('d F Y g:i A')
                               : '' ?>"
                           placeholder="Purchase Date" maxlength="64" id="Purchase_Date">
                    <br />
                    <div class="validation"></div>
                </div>

                <!-- <div class="form-group col-md-8">
                <h3> Day</h3> -->
                <!-- <select required class="form-control input-text" name="Day" type="text"  placeholder="Day" maxlength="64" id="Day"> 
                    <!-- <option value="<?php echo $record->Day ?>"> $id </option> -->
                    <!-- <option value="<?php echo $record->Day ?>"> <?php echo $record->Day ?>  </option>
                    <option value="Monday"> Monday </option>
                    <option value="Tuesday"> Tuesday </option>
                    <option value="Wednesday"> Wednesday  </option>
                    <option value="Thursday"> Thursday </option> 
                    <option value="Friday"> Friday </option>
                    <option value="Saturday"> Saturday </option>
                    <option value="Sunday"> Sunday </option> -->
                <!-- </select><br> -->
                <!-- </div> --> 

                <!-- <div class="form-group">
                    <input class="form-control input-text" name="Category" type="text"  placeholder="Category" maxlength="255" id="Category">
                    <br />
                    <div class="validation"></div>
                </div> -->

                <div class="form-group col-md-4">
                <h3> Category</h3>
                <select required class="form-control input-text form-group col-md-8" name="Category"> 
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
                <h3> Item</h3>
                    <input class="form-control input-text" name="Item" type="text" value="<?php echo $record->Item ?>" placeholder="Item" maxlength="255" id="Item">
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group col-md-4">
                <h3> Quantity</h3>
                    <input class="form-control input-text" name="Quantity" type="number" value="<?php echo $record->Quantity ?>" step="0" placeholder="Quantity" id="Quantity">
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group col-md-2">
                <h3> Price(Expenses)</h3>
                    <input class="form-control input-text" name="Price" type="number" value="<?php echo $record->Price ?>" step="0.01" placeholder="Price" id="Price">
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group col-md-6">
                <h3> <br> </h3>
                    <input name="id" type="hidden" value="<?php echo $record->id ?>">
                    <button class="input-btn" name="cancel" type="submit"> Cancel</button>
                    <button class="input-btn" name="edit" type="submit"> Save</button>
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

<script src="../js/jquery.datetimepicker.full.min.js"></script>
<!-- <script>
$(function(){
    $('input#Transaction_Date').datetimepicker({
        format: 'Y/m/d H:i',
        step: 15,
        defaultDate:new Date()
    });
});
</script> -->

<script>
$(function(){
    $('input#Purchase_Date').datetimepicker({
        format: 'd F Y g:i A',
        step: 15
        //defaultDate:new Date()
    });
});
</script>

<?php
else:
echo renderAlerts();
?>
<?php endif; ?>

