<?php
// Start output buffering to prevent "headers already sent" error
ob_start();

// Start the session
session_start();


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
    // Redirect to login if not logged in
    header("Location: login.php");
    exit;
}

$customer_id = $_SESSION['customer_id'];

// Fetch trucks in the wishlist
$sql = "SELECT p.product_id, p.product_title, p.product_price, p.product_img1 
        FROM trucks_wishlist tw 
        JOIN products p ON tw.product_id = p.product_id
        WHERE tw.customer_id = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wishlist</title>
</head>
<body>
    <h1>Your Wishlist</h1>
    <?php if ($result->num_rows > 0): ?>
        <form action="RequestMultipleQuotes.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Truck</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><input type="checkbox" name="selected_trucks[]" value="<?php echo $row['product_id']; ?>"></td>
                            <td><?php echo $row['product_title']; ?></td>
                            <td>$<?php echo $row['product_price']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <button type="submit">Request Quote</button>
        </form>
    <?php else: ?>
        <p>Your wishlist is empty.</p>
    <?php endif; ?>
</body>
</html>

<?php
// End output buffering and flush any output
ob_end_flush();
?>
