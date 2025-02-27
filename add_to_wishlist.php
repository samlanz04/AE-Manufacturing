<?php
// add_to_wishlist.php - Add truck to wishlist
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
$product_id = $_GET['product_id']; // The product to add to wishlist

// Check if the product is already in the wishlist
$sql = "SELECT * FROM trucks_wishlist WHERE customer_id = ? AND product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $customer_id, $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    // Add to wishlist
    $insert_sql = "INSERT INTO trucks_wishlist (customer_id, product_id) VALUES (?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("ii", $customer_id, $product_id);
    $insert_stmt->execute();

    echo "Product added to your wishlist.";
} else {
    echo "This product is already in your wishlist.";
}
?>
