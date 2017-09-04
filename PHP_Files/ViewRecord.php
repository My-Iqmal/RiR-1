<?php
$title = 'View Records';
include ("../inc/Check_Session.php");
include ("../inc/DataBaseConnection.php");
include ("../inc/Template.php");

$sql = "SELECT e.*, u.User_Fullname FROM rir_expenses AS e LEFT JOIN rir_user AS u ON u.id = e.user_id;";
$rs = mysqli_query($db, $sql);
?>
<link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
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
    
<header class="header" id="header"><!--header-start-->
	<div class="container">
        <ul class="we-create animated fadeInUp delay-1s">
            <li>View Record <br> See your records now!</li>
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
        <h2>Transaction Records</h2>
        <?php echo renderAlerts(); ?>
        <div class="row">
            <table id="transactions_table" class="table table-striped table-hover" data-page-length="25">
                <thead>
                    <tr>
                        <th data-orderable="false"></th>
                        <th>#</th>
                        <th>Date/Time</th>
                        <th>User</th>
                        <th>Item</th>
                        <th>Amount</th>
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
                    <td><input name="transaction_id" type="checkbox" value="<?php echo $obj->id; ?>" /></td>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $obj->transaction_date; ?></td>
                    <td><?php echo $obj->User_Fullname; ?></td>
                    <td><?php echo $obj->item; ?></td>
                    <td><?php echo $obj->amount; ?></td>
                    <td>
                        <a href="EditRecord.php?id=<?php echo $obj->id; ?>"><i class="fa fa-pencil" title="Edit transaction"></i></a>
                        <a href="?delete=<?php echo $obj->id; ?>"><i class="fa fa-trash" title="Delete transaction"></i></a>
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
        order: [[2, 'desc']]
    });
});
</script>