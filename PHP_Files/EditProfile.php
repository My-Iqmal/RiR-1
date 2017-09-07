<?php
// handle for editing My Profile
if (isset($_POST['edit'])) {
    // TODO: security measures
    // get posted datas
    $id = $_POST['id'];
    $User_IC_Number=$_POST['User_IC_Number'];
    $User_FullName=$_POST['User_FullName'];
    $User_Name=$_POST['User_Name'];
    $User_Password=md5($_POST['User_Password']);
    $User_Birthdate=($_POST['User_Birthdate']);
    $User_Email=($_POST['User_Email']);

    // additional datas
    $user_id = getUser()->id;

    // check only owner can update the record
    $rs = mysqli_query($db, "SELECT * FROM rir_user WHERE id=$id LIMIT 1");
    $row = mysqli_fetch_object($rs);

    if ($row->user_id != $user_id) {
        addDangerAlert('<strong>Error!</strong> cannot edit record not belong to you.');
        header('location: ViewRecord.php');
    }

    // update
    $sql = "
    UPDATE rir_user SET User_IC_Number='$User_IC_Number', User_FullName='$User_FullName', User_Name='$User_Name', User_Password='$User_Password', User_Birthdate='$User_Birthdate', User_Email='$User_Email'
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

<nav class="main-nav-outer" id="test"><!--main-nav-start-->
    <div>
        <ul class="main-nav">  <!--  This is For Navigation Menu-->
            <li class="small-logo"><a href="#header"><img src="../img/small-logo.png" alt=""></a></li>
            <li><a href="HomePage.php" target="_parent">Home</a></li>
            <li><a class="active" href="ViewProfile.php" target="_parent">My Profile</a></li>
            <li><a href="InsertRecord.php" target="_parent">Insert Record</a></li>
            <!-- li><a href="DeleteRecord.php" target="_parent">Delete Record </a></li -->
            <li><a href="ViewRecord.php" target="_parent">View Record </a></li>
            <!-- li><a href="EditRecord.php" target="_parent">Edit Record</a></li -->
            <li><a href="PrintRecord.php" target="_parent">Print Record </a></li>
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
            <li>This is your Profile! <br> You can see your account's details below.</li>
        </ul>
            <a class="link animated fadeInUp delay-1s servicelink" href="#My_Profile">My Profile</a>
        <ul>
            <!-- <li> <br> </li> -->
        </ul>
    </div>
</header><!--header-end-->