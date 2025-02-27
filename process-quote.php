<?php
// Database connection
$host = "ls-d452bc3b2fac1873a5428b4500f305c5409331ad.crs4yuum0kxf.us-east-1.rds.amazonaws.com";
$dbname = "ecom_store";
$username = "dbmasteruser";
$password = ")~*>:8pxt^cb+o6Ph(HmOXUM}gh=,d`.";
$db_port = 3306;
 
// Use the correct variable names in the connection line
$db = new mysqli($host, $username, $password, $dbname, $db_port);
 
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Check if the connection was successful
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize inputs
    $truck_type = mysqli_real_escape_string($db, trim($_POST["truck_type"]));
    $brand = mysqli_real_escape_string($db, trim($_POST["brand"]));
    $features = mysqli_real_escape_string($db, trim($_POST["features"]));
    $vehicle_size = mysqli_real_escape_string($db, trim($_POST["vehicle_size"]));
    $body_volume = mysqli_real_escape_string($db, trim($_POST["body_volume"]));
    $engine_power = mysqli_real_escape_string($db, trim($_POST["engine_power"]));

    // Insert data into the database
    $sql = "INSERT INTO quote_requests (truck_type, brand, features, vehicle_size, body_volume, engine_power) VALUES ('$truck_type', '$brand', '$features', '$vehicle_size', '$body_volume', '$engine_power')";

    if (mysqli_query($db, $sql)) {
        echo "Thank you! Your quote request has been submitted.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}

// Close the connection
mysqli_close($db);
?>
