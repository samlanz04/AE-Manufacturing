<?php
// request_quote.php - Request a quote for the selected trucks
session_start();
include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>

<?php
// Database connection setup
$host = "ls-d452bc3b2fac1873a5428b4500f305c5409331ad.crs4yuum0kxf.us-east-1.rds.amazonaws.com";
$dbname = "ecom_store";
$username = "dbmasteruser";
$password = ")~*>:8pxt^cb+o6Ph(HmOXUM}gh=,d`.";
$db_port = 3306;

// Establish connection to the database
$db = mysqli_connect($host, $username, $password, $dbname, $db_port);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if user is logged in
if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit;
}

$customer_id = $_SESSION['customer_id'];
$selected_trucks = isset($_POST['selected_trucks']) ? $_POST['selected_trucks'] : [];

if (empty($selected_trucks)) {
    echo "No trucks selected.";
    exit;
}

// Collect truck details and prepare the quote request
foreach ($selected_trucks as $product_id) {
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $truck = $result->fetch_assoc();

    // Insert quote request into the database
    $insert_sql = "INSERT INTO quote_requests (truck_type, brand, features, vehicle_size, body_volume, engine_power) 
                   VALUES (?, ?, ?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("ssssss", $truck['product_title'], $truck['manufacturer_id'], $truck['product_features'], $truck['product_size'], $truck['body_volume'], $truck['engine_power']);
    $insert_stmt->execute();
}

// Notify the user
echo "Quote request submitted successfully.";
?>
