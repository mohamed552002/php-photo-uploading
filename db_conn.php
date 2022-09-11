<?php  

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "test_db";

$connect = mysqli_connect($sname, $uname, $password, $db_name);

if (!$connect) {
	echo "Connection failed!";
	exit();
}
?>