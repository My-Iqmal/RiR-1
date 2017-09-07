<?php
	// session_start();//to utilize server session
	$User_IC_Number=$_POST['User_IC_Number'];
	$User_FullName=$_POST['User_FullName'];
	$User_Name=$_POST['User_Name'];
	$User_Password=md5($_POST['User_Password']);
	$User_Birthdate=($_POST['User_Birthdate']);
	$User_Email=($_POST['User_Email']);
	
 include ("../inc/DataBaseConnection.php");
 include ("../inc/Template.php");

	$sql="insert into rir_user   (User_IC_Number, User_FullName, User_Name, User_Password, User_Birthdate, User_Email)  
		  values ('$User_IC_Number', '$User_FullName', '$User_Name', '$User_Password', '$User_Birthdate', '$User_Email')";
    $rs=mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html>
<head>	
	<title></title>	
</head>
<body>
	<strong>User Log In Verification </strong><br> 
	<?php 
		if($rs==true){  
			// echo "$User_IC_Number, $User_FullName, $User_Name, $User_Password, $User_Birthdate, $User_Email is SAVED<br>";  
			header('location: HomePage.php');
		} 

		else{  
			// echo "Invalid input! The record CANNOT be SAVED<br>"; 
			header('location: index.php');
		} 
	?>
</body>
</html>
