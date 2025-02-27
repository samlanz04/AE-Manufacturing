<?php
 
$host = "ls-d452bc3b2fac1873a5428b4500f305c5409331ad.crs4yuum0kxf.us-east-1.rds.amazonaws.com";
$dbname = "ecom_store";
$username = "dbmasteruser";
$password = ")~*>:8pxt^cb+o6Ph(HmOXUM}gh=,d`.";
$db_port = 3306;
 
// Use the correct variable names in the connection line
$con = new mysqli($host, $username, $password, $dbname, $db_port);
 
if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}
?>