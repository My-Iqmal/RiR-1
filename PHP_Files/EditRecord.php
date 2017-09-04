<?php
include ("../inc/Check_Session.php");
include ("../inc/DataBaseConnection.php");
include ("../inc/Template.php");

// handle form submit
if (isset($_POST['edit'])) {
    // TODO: security measures
    // get posted datas
    $id = $_POST['id'];
    $item = $_POST['item'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];

    // additional datas
    $user_id = $_SESSION['user_id'];

    // TODO: check who can update the record
    // update
    $sql = "
UPDATE rir_expenses SET item='$item', description='$description', amount=$amount 
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
$messages = [];

$result = mysqli_query($db, "SELECT * FROM rir_expenses WHERE id=".$id." LIMIT 1");
if (!mysqli_num_rows($result)) {
    $error = true;
    $messages[] = 'Record with id: '.$id.' not found';
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
            <li><a href="PrintRecord.php" target="_parent">Print Record </a></li>
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

<section class="main-section" id="service"><!--main-section-start--> <!--  This is for Content  -->
    <div class="container">
        <h2>Edit record ID:<?php echo $id ?></h2>
        <div class="form">
            <form class="contactForm" role="form" name="" action="" method="POST">
                <div class="form-group">
                    <input class="form-control input-text" name="item" type="text" value="<?php echo $record->item ?>" placeholder="Transaction item" maxlength="64" id="item">
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group">
                    <input class="form-control input-text" name="description" type="text" value="<?php echo $record->description ?>" placeholder="Transaction description" maxlength="255" id="description">
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="form-group">
                    <input class="form-control input-text" name="amount" type="number" value="<?php echo $record->amount ?>" step="0.01" placeholder="Amount" id="amount">
                    <br />
                    <div class="validation"></div>
                </div>

                <div class="text-center">
                    <input name="id" type="hidden" value="<?php echo $record->id ?>">
                    <button class="input-btn" type="reset"> Clear</button>
                    <button class="input-btn" name="edit" type="submit"> Save</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
else:
foreach ($messages as $message) {
    echo "<h3>$message</h3>";
}
?>
<?php endif; ?>