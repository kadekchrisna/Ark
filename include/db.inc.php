<?php  
	$dbServername="127.0.0.1";
	$dbUsername="root";
	$dbPassword="";
	$dbName="ark";

	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	/*if (!$conn) {
		echo "Fail";
	}else{
		echo "Succ";
	}*/
