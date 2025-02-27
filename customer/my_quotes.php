<?php
// Ensure session is started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database connection
$host = "ls-d452bc3b2fac1873a5428b4500f305c5409331ad.crs4yuum0kxf.us-east-1.rds.amazonaws.com";
$dbname = "ecom_store";
$username = "dbmasteruser";
$password = ")~*>:8pxt^cb+o6Ph(HmOXUM}gh=,d`.";
$db_port = 3306;

// Establishing the database connection
$db = mysqli_connect($host, $username, $password, $dbname, $db_port);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get customer email from session
$customer_session = $_SESSION['customer_email'];

// Fetch the customer ID based on the session email
$get_customer = "SELECT customer_id FROM customers WHERE customer_email='$customer_session'";
$run_customer = mysqli_query($db, $get_customer);

if ($run_customer && $row_customer = mysqli_fetch_array($run_customer)) {
    $customer_id = $row_customer['customer_id'];
} else {
    die("Customer not found. Please log in.");
}

// Fetch quotes for the specific customer
$get_quotes = "SELECT * FROM quotes WHERE customer_id='$customer_id'";
$run_quotes = mysqli_query($db, $get_quotes);

if (!$run_quotes) {
    die("Query failed: " . mysqli_error($db));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truck Quotes</title>
    <link rel="stylesheet" href="path/to/bootstrap.css"> <!-- Include Bootstrap -->
    <style>
        .btn-pending {
            background-color: orange;
            color: white;
            border: none;
        }
        .btn-accepted {
            background-color: green;
            color: white;
            border: none;
        }
        .btn2 {
            cursor: none;
        }
    </style>
</head>
<body>

<center>
    <h1>Truck Quotes</h1>
    <p class="lead">Your truck quotes in one place.</p>
    <p class="text-muted">
        If you have any questions, please feel free to <a href="../contact.php">contact us,</a> our customer service center is working for you 24/7.
    </p>
</center>

<hr>

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Quote No:</th>
                <th>Reference No:</th>
                <th>Customer Name:</th>
                <th>Email:</th>
                <th>Phone:</th>
                <th>Truck Model:</th>
                <th>Comments:</th>
                <th>Status:</th>
                <th>Request Date:</th>
                <th>Download Quote</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($row_quotes = mysqli_fetch_array($run_quotes)) {
                $i++;

                // Check the status value and set the status text and button class
                $status = $row_quotes['status'] == 0 ? 'Pending' : 'Accepted';
                $status_class = $row_quotes['status'] == 0 ? 'btn-pending' : 'btn-accepted';

                // Get the PDF file path from the 'pdf' column
                $pdf_link = $row_quotes['pdf'];
                ?>
                <tr>
                    <th><?php echo $i; ?></th>
                    <td><?php echo $row_quotes['reference_number']; ?></td>
                    <td><?php echo $row_quotes['contact_name']; ?></td>
                    <td><?php echo $row_quotes['contact_email']; ?></td>
                    <td><?php echo $row_quotes['contact_phone'] ?? 'N/A'; ?></td>
                    <td><?php echo $row_quotes['product_title']; ?></td>
                    <td><?php echo $row_quotes['additional_info'] ?? 'N/A'; ?></td>
                    <td>
                        <button class="btn2 <?php echo $status_class; ?>"><?php echo $status; ?></button>
                    </td>
                    <td><?php echo $row_quotes['created_at']; ?></td>
                    <td>
                        <?php if ($pdf_link): ?>
                            <a href="../admin_area/<?php echo $pdf_link; ?>" target="_blank" class="btn btn-primary">View PDF</a>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
