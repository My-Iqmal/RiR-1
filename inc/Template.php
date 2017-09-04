<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($title) ? $title : 'RiR' ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<link rel="icon" href="favicon.png" type="image/png">
<link rel="shortcut icon" href="favicon.ico" type="img/x-icon">

<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>

<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link href="../css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="../css/responsive.css" rel="stylesheet" type="text/css">
<link href="../css/animate.css" rel="stylesheet" type="text/css">

<!--[if IE]><style type="text/css">.pie {behavior:url(PIE.htc);}</style><![endif]-->

<script type="text/javascript" src="../js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../js/jquery.isotope.js"></script>
<script type="text/javascript" src="../js/wow.js"></script>
<script type="text/javascript" src="../js/classie.js"></script>
<script src="../contactform/contactform.js"></script>
</head>
<body>
</body>
</html>

<?php
/*if(mysqli_num_rows($rs)==1){  //found one user 
    $record=mysqli_fetch_array($rs);
    $DBPASSWORD=$record['PASSWORD'];    //password from database  
    $USERPASSWORD=md5($PASSWORD);   //MD5 password key-in by user 
    
    if($DBPASSWORD==$USERPASSWORD){ 
    //compare password from database against password entered by user 
    echo "Username and password match,<br>"; 
    echo "WELCOME $EMPNO !!!<br>"; 
    echo "<a href='menu.php?EMPNO=$EMPNO'> 
    Click to ADMIN Menu </a><br>"; 
    }

    else{     
        echo "Username found, but password NOT match,<br>";     
        echo "<a href='javascript:history.back()'>     "
        . "re-enter password</a><br>";  
    } 
} 

else{  
    echo "Username NOT found,<br>";  
    echo "<a href='javascript:history.back()'>re-login</a><br>"; 
} 
*/ 
?>
 