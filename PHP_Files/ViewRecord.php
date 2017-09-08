    <?php
$title = 'View Records';
include ("../inc/Check_Session.php");
include ("../inc/DataBaseConnection.php");
include ("../inc/Template.php");

require '../inc/Carbon.php';
use Carbon\Carbon;

redirectGuest();
$user = getUser();
$sql = "
SELECT e.*, u.User_Fullname 
FROM rir_expenses AS e 
LEFT JOIN rir_user AS u ON u.id = e.user_id
WHERE user_id = {$user->id};";
$rs = mysqli_query($db, $sql);
?>
<link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
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
    
<header class="header" id="header"><!--header-start-->
    <div class="container">
        <ul class="we-create animated fadeInUp delay-1s">
            
        </ul>
        <figure class="logo animated fadeInDown delay-07s">
            <a href="#"><img src="../img/logo.png" alt=""></a>  
        </figure>   
        <h1 class="animated fadeInDown delay-07s">RiR</h1>
        <ul class="we-create animated fadeInUp delay-1s">
            <li>View Record <br> See your records now!</li>
            <!-- <li> <br> </li> -->
        </ul>
    </div>
</header><!--header-end-->

<section class="main-section" id="service"><!--main-section-start--> <!--  This is for Content  -->
    <div class="container">
        <h2>Transaction Records</h2>
        <?php echo renderAlerts(); ?>
        <div class="row">
            <table id="transactions_table" class="table table-striped table-hover" data-page-length="25">
                <thead>
                    <tr>
                        <!--th data-orderable="false"></th-->
                        <th>#   </th>
                        <!-- <th>Username</th> -->
                        <th>Data Entry Date</th>
                        <th>Purchase Date</th>
                        <th>Category</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price(Expenses)</th>
                        <th data-orderable="false"></th>
                    </tr>
                </thead>
                <tfoot>

                </tfoot>
                <tbody>
                <?php
                $i = 1;
                while ($obj=mysqli_fetch_object($rs)):
                ?>
                <tr>
                    <!--td><input name="transaction_id" type="checkbox" value="<?php echo $obj->id; ?>" /></td-->
                    <td><?php echo $i; ?></td>
                    <!-- <td><?php echo $obj->User_Name; ?></td> -->
                    <td><?php echo $obj->Entry_Date ? Carbon::parse($obj->Entry_Date)->format('d F Y g:i A') : ''; ?></td>
                    <td><?php echo Carbon::parse($obj->Transaction_Date)->format('d F Y g:i A'); ?></td>
                    <td><?php echo $obj->Category; ?></td>
                    <td><?php echo $obj->Item; ?></td>
                    <td><?php echo $obj->Quantity; ?></td>
                    <td><?php echo $obj->Price; ?></td>
                    <td>
                        <a href="EditRecord.php?id=<?php echo $obj->id; ?>"><i class="fa fa-pencil" title="Edit transaction"></i></a>
                        <a href="DeleteRecord.php?id=<?php echo $obj->id; ?>"><i class="fa fa-trash text-danger" title="Delete transaction"></i></a>
                    </td>
                </tr>
                <?php $i++; endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script type="text/javascript" src="../DataTables/datatables.min.js"></script>
<script>
$(function(){
    $('table#transactions_table').DataTable({
        order: [[1, 'desc']]
    });
});
</script>