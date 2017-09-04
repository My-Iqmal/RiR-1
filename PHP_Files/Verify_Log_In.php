<?php
session_start();

include ("../inc/DataBaseConnection.php");
include ("../inc/Template.php");

$User_IC_Number=$_POST['User_IC_Number'];
$User_Name=$_POST['User_Name'];
$User_Password=($_POST['User_Password']);

$sql="SELECT * FROM rir_user WHERE User_IC_Number='$User_IC_Number'";
$rs=mysqli_query($db, $sql);

$is_valid = false;
$messages = '';

if(mysqli_num_rows($rs)==1){ //found one user
    $record=mysqli_fetch_assoc($rs);
    $DBPassword=$record['User_Password'];//user password from database
    $USERPASSWORD=md5($User_Password);//MD5 password key-in by user

    $DB_User_IC_Number=$record['User_IC_Number'];//user IC Number from database
    $USERICNUMBER=($User_IC_Number);//user IC Number key-in by user

    $DBUser_Name=$record['User_Name'];//user Name from database
    $USERNAME=($User_Name);//user Name key-in by user

    if($DBPassword==$USERPASSWORD and $DBUser_Name==$USERNAME){   //compare password from database against password entered by user
        $is_valid = true;
        $_SESSION['user_id'] = $record['id'];
        $_SESSION['user'] = $record;
        //var_dump($_SESSION);
        $messages .= "IC Number, Username and Password matched!,<br>";
        $messages .= "WELCOME $User_Name!!!<br>";
        $messages .= "You will be redirected to <a href='HomePage.php? User_IC_Number=$User_IC_Number'>home page</a> in 5 seconds<br>";
    }

    if($DBPassword==$USERPASSWORD and $DBUser_Name!=$USERNAME){
        $messages .= "Invalid User Name!,<br>";
        $messages .= "<a href='javascript:history.back()'> re-enter User Name</a><br>";
    }

    if($DBPassword!=$USERPASSWORD and $DBUser_Name==$USERNAME){
        $messages .= "Invalid Password!,<br>";
        $messages .= "<a href='javascript:history.back()'> re-enter Password </a><br>";
    }
} else {
    $messages .= "Invalid IC Number!,<br>";
    $messages .= "<a href='javascript:history.back()'>re-enter IC Number</a><br>";
}
?>

<!DOCTYPE html>
<html>
<head>	
	<title></title>
    <?php if ($is_valid): ?>
        <meta http-equiv="refresh" content="5;url=HomePage.php">
    <?php endif; ?>
</head>
<body>
	<strong>User Log In Verification </strong><br>
    <?php echo $messages; ?>
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
 