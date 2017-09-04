<?php
$db=mysqli_connect("localhost","homestead","secret","rir_databases");
//Check connection
if (mysqli_connect_errno()) {
	echo "Connect failed: %s\n", mysqli_connect_error($db);
	exit();
}
?>