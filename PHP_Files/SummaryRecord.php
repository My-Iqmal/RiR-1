<?php
include ("../inc/Check_Session.php");
include ("../inc/DataBaseConnection.php");
include ("../inc/Template.php");
//

// current year
$year = date('Y');

// selected year from dropdown
$selected_year = isset($_GET['year']) ? $_GET['year'] : $year;

// current user object
$user = getUser();

// query the data
$sql = "
SELECT  
    MONTH(e.Transaction_Date) AS month,
    SUM(e.Price) AS total_transactions,
    COUNT(e.id) AS no_of_transactions 
FROM rir_expenses AS e
WHERE e.user_id = $user->id AND YEAR(e.Transaction_Date) = $selected_year
GROUP BY MONTH(e.Transaction_Date)
ORDER BY MONTH(e.Transaction_Date) ASC
";
$rs_yearly = mysqli_query($db, $sql);

$sql = "
SELECT  
    e.Category AS category,
    SUM(e.Price) AS total_transactions,
    COUNT(e.id) AS no_of_transactions 
FROM rir_expenses AS e
WHERE e.user_id = $user->id AND YEAR(e.Transaction_Date) = $selected_year
GROUP BY e.Category
ORDER BY e.Category ASC
";
$rs_category = mysqli_query($db, $sql);
?>

<nav class="main-nav-outer" id="test"><!--main-nav-start-->
	<div>
        <ul class="main-nav">  <!--  This is For Navigation Menu-->
            <li class="small-logo"><a href="#header"><img src="../img/small-logo.png" alt=""></a></li>
            <li><a href="HomePage.php" target="_parent">Home</a></li>
            <!-- <li><a href="ViewProfile.php" target="_parent">My Profile</a></li> -->
            <li><a href="InsertRecord.php" target="_parent">Insert Record</a></li>
            <!-- li><a href="DeleteRecord.php" target="_parent">Delete Record </a></li -->
            <li><a href="ViewRecord.php" target="_parent">View Record </a></li>
            <!-- li><a href="EditRecord.php" target="_parent">Edit Record</a></li -->
            <li><a class="active" href="SummaryRecord.php" target="_parent">Summary Record </a></li>
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
            <li>Summary Record <br> Get all your records up until today!</li>
            <!-- <li> <br> </li> -->
        </ul>
    </div>
</header><!--header-end-->

<section class="main-section" id="service"><!--main-section-start--> <!--  This is for Content  -->
    <div class="container">
        <h2>Summary record</h2> <br><br>
        <div class="row table-responsive">
            <h3>
                Yearly Spending:
                <select id="year" name="year">
                    <?php
                    for ($i=0;$i<=5;$i++) {
                        $_year = $year - $i;
                        $_selected = ($year - $i == $selected_year) ? 'selected' : '';
                        echo "<option $_selected>$_year</option>";
                    }
                    ?>
                </select>
            </h3>
            <table class="table table-condensed table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Month</th>
                    <th># of transactions</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tfoot></tfoot>
                <tbody>
                <?php if (mysqli_num_rows($rs_yearly)): ?>
                <?php $i=1; while ($obj=mysqli_fetch_object($rs_yearly)): ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo date('F', mktime(0, 0, 0, $obj->month, 10)); ?></td>
                    <td><?php echo $obj->no_of_transactions; ?></td>
                    <td><?php echo $obj->total_transactions; ?></td>
                </tr>
                <?php $i++; endwhile;?>
                <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center text-small">No transaction</td>
                </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="row table-responsive">
            <h3>Spending by Category</h3>
            <table class="table table-condensed table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th># of transactions</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tfoot></tfoot>
                <tbody>
                <?php if (mysqli_num_rows($rs_category)): ?>
                    <?php $i=1; while ($obj=mysqli_fetch_object($rs_category)): ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $obj->category; ?></td>
                            <td><?php echo $obj->no_of_transactions; ?></td>
                            <td><?php echo $obj->total_transactions; ?></td>
                        </tr>
                        <?php $i++; endwhile;?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center text-small">No transaction</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
$(function(){
    $('select#year').on('change', function(){
        window.location = '?year='+$(this).val();
    });
});
</script>