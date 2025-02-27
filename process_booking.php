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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $truck_type = htmlspecialchars(trim($_POST['truck_type']));
    $department = htmlspecialchars(trim($_POST['department']));
    $brand = htmlspecialchars(trim($_POST['brand']));
    $engine_power = htmlspecialchars(trim($_POST['engine_power']));
    $appointment_date = htmlspecialchars(trim($_POST['appointment_date']));
    $appointment_time = htmlspecialchars(trim($_POST['appointment_time']));
    $reason = htmlspecialchars(trim($_POST['reason']));
    $location = htmlspecialchars(trim($_POST['location']));

    // Handle the picture upload
    if ($_FILES['picture']['error'] == UPLOAD_ERR_OK) {
        $uploads_dir = 'uploads/';
        $tmp_name = $_FILES['picture']['tmp_name'];
        $file_name = basename($_FILES['picture']['name']);
        
        // Check if uploads directory exists and create it if not
        if (!is_dir($uploads_dir)) {
            mkdir($uploads_dir, 0777, true);
        }
        
        move_uploaded_file($tmp_name, "$uploads_dir/$file_name");
        $picture_url = "$uploads_dir/$file_name";
    } else {
        $picture_url = null;
    }

    // Prepare the SQL statement
    $stmt = $db->prepare("INSERT INTO appointments (name, email, phone, truck_type, department, brand, engine_power, 
                          appointment_date, appointment_time, reason, location, picture_url)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Bind the parameters
    $stmt->bind_param("ssssssssssss", $name, $email, $phone, $truck_type, $department, $brand, $engine_power, 
                      $appointment_date, $appointment_time, $reason, $location, $picture_url);

    // Execute the query
    if ($stmt->execute()) {
        // If data is inserted successfully, display confirmation
        echo "<h2>Thank you, $name!</h2>";
        echo "<p>Your booking for $department has been received.</p>";
        echo "<p>Appointment on $appointment_date at $appointment_time for $reason at $location.</p>";
        echo "<p>Truck Type: $truck_type | Brand: $brand | Engine Power: $engine_power</p>";
        if ($picture_url) {
            echo "<p>Picture uploaded: <a href='$picture_url'>View Picture</a></p>";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    mysqli_close($db);
} else {
    echo "Invalid request method.";
}
?>
