<?php
include ("../inc/Check_Session.php");
include ("../inc/DataBaseConnection.php");
include ("../inc/Template.php");
//

// current year
$year = date('Y');

// selected year from dropdown
$selected_year = isset($_GET['year']) ? $_GET['year'] : $year;
$selected_month = isset($_GET['month']) ? $_GET['month'] : null;

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

$_month_query = $selected_month
    ? "AND MONTH(e.Transaction_Date) = $selected_month"
    : '';
$sql = "
SELECT  
    e.Category AS category,
    SUM(e.Price) AS total_transactions,
    COUNT(e.id) AS no_of_transactions 
FROM rir_expenses AS e
WHERE e.user_id = $user->id 
    AND YEAR(e.Transaction_Date) = $selected_year
    $_month_query
GROUP BY e.Category
ORDER BY e.Category ASC
";
$rs_category = mysqli_query($db, $sql);

if ($selected_month) {
    $sql = "
    SELECT * FROM rir_expenses AS e 
    WHERE e.user_id = $user->id 
        AND YEAR(e.Transaction_Date) = $selected_year
        AND MONTH(e.Transaction_Date) = $selected_month
    ORDER BY e.Transaction_Date ASC
    ";
    $rs_monthly = mysqli_query($db, $sql);
}

$total=0;
$count=0;
$category_total=0;
$category_count=0;
$month_total=0;
?>

<style>
    tr.selected { background-color: ghostwhite; }
    tfoot tr {
        border-top: 2px solid #dddddd;
        border-bottom: 2px solid #dddddd;
        background-color: whitesmoke;
    }
</style>

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
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
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
                </div>
                <div class="panel-body">
                    <table id="yearly" class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <th>#</th>
                            <th>Month</th>
                            <th class="text-center"># of transactions</th>
                            <th class="text-right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (mysqli_num_rows($rs_yearly)): ?>
                            <?php
                            $i=1;
                            while ($obj=mysqli_fetch_object($rs_yearly)):
                                ?>
                                <tr class="<?php echo $selected_month == $obj->month ? 'selected' : ''; ?>">
                                    <td>
                                        <input type="radio" name="month" id="month"
                                               value="<?php echo $obj->month; ?>" <?php echo $selected_month == $obj->month ? 'checked' : ''; ?> />
                                    </td>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date('F', mktime(0, 0, 0, $obj->month, 10)); ?></td>
                                    <td class="text-center"><?php echo $obj->no_of_transactions; ?></td>
                                    <td class="text-right"><?php echo number_format($obj->total_transactions, 2); ?></td>
                                </tr>
                                <?php
                                $count += $obj->no_of_transactions;
                                $total += $obj->total_transactions;
                                $i++;
                            endwhile;
                            ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-small">No transaction</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="3" class="text-center">GRAND TOTAL</th>
                            <th class="text-center"><?php echo $count; ?></th>
                            <th class="text-right"><?php echo number_format($total,2); ?></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <?php if ($selected_month): ?>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Spending details for:
                        <?php echo $selected_month
                            ? date('F', mktime(0, 0, 0, $selected_month, 10))
                            : '';
                        ?>
                        <?php echo $selected_year
                            ? $selected_year
                            : '';
                        ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <table id="monthly_detail" class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th>Purchase Date</th>
                            <th>Category</th>
                            <th>Item</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-right">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($month_count = mysqli_num_rows($rs_monthly)): ?>
                            <?php
                            while ($obj=mysqli_fetch_object($rs_monthly)):
                                ?>
                                <tr>
                                    <td><?php echo $obj->Transaction_Date; ?></td>
                                    <td><?php echo $obj->Category; ?></td>
                                    <td><?php echo $obj->Item; ?></td>
                                    <td class="text-center"><?php echo $obj->Quantity; ?></td>
                                    <td class="text-right"><?php echo number_format($obj->Price,2); ?></td>
                                </tr>
                                <?php
                                $month_total += $obj->Price;
                            endwhile;
                            ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-small">No transaction</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="3" class="text-center">TOTAL</th>
                            <th class="text-center"><?php echo $month_count; ?></th>
                            <th class="text-right"><?php echo number_format($month_total,2); ?></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Spending by Category:
                        <?php echo $selected_month
                            ? date('F', mktime(0, 0, 0, $selected_month, 10))
                            : '';
                        ?>
                        <?php echo $selected_year
                            ? $selected_year
                            : '';
                        ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <table id="category" class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th class="text-center"># of transactions</th>
                            <th class="text-right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (mysqli_num_rows($rs_category)): ?>
                            <?php
                            $i=1;
                            while ($obj=mysqli_fetch_object($rs_category)):
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $obj->category; ?></td>
                                    <td class="text-center"><?php echo $obj->no_of_transactions; ?></td>
                                    <td class="text-right"><?php echo number_format($obj->total_transactions,2); ?></td>
                                </tr>
                                <?php
                                $category_total += $obj->total_transactions;
                                $category_count += $obj->no_of_transactions;
                                $i++;
                            endwhile;
                            ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-small">No transaction</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="2" class="text-center">GRAND TOTAL</th>
                            <th class="text-center"><?php echo $category_count; ?></th>
                            <th class="text-right"><?php echo number_format($category_total,2); ?></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(function(){
    // year dropdown change event
    $('select#year').on('change', function(){
        window.location = '?year='+$(this).val();
    });

    // table#yearly row click
    var table_yearly = $('table#yearly');
    table_yearly.find('tr').on('click', function(){
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            $(this).find('input#month').removeAttr('checked').trigger('change');
        } else {
            table_yearly.find('tr').removeClass('selected');
            $(this).addClass('selected');
            $(this).find('input#month').attr('checked','checked').trigger('change');
        }
    });

    // month radio change event
    $('input#month').on('change', function(){
        if ($('input#month:checked').length < 1) {
            window.location = '?year='+$('select#year').val();
        } else {
            window.location = '?year='+$('select#year').val()+'&month='+$('input#month:checked').val();
        }
    });
});
</script>