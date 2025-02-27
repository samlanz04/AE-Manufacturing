<?php
// Include database connection
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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pdf'])) {
    // Get the uploaded file details
    $file = $_FILES['pdf'];
    $quote_id = $_POST['quote_id'];

    // Validate the file type
    $allowed_types = ['application/pdf'];
    if (!in_array($file['type'], $allowed_types)) {
        echo "<script>alert('Only PDF files are allowed!');</script>";
        echo "<script>window.open('index.php?trucks_quotes=1','_self');</script>";
        exit;
    }

    // Specify the directory to save the uploaded file
    $upload_dir = 'uploads/pdf/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);  // Create the directory if it doesn't exist
    }

    // Generate a unique file name
    $file_name = $quote_id . '-' . time() . '.pdf';
    $file_path = $upload_dir . $file_name;

    // Move the file to the destination directory
    if (move_uploaded_file($file['tmp_name'], $file_path)) {
        // Update the database with the file path
        $query = "UPDATE quotes SET pdf = '$file_path' WHERE quote_id = '$quote_id'";
        $result = mysqli_query($con, $query); // Corrected variable name from $db to $con

        if ($result) {
            // Redirect to index.php?trucks_quotes after success
            header("Location: index.php?trucks_quotes=1");
            exit;
        } else {
            echo "<script>alert('Error uploading PDF: " . mysqli_error($con) . "');</script>"; // Corrected $db to $con
            echo "<script>window.open('index.php?trucks_quotes=1','_self');</script>";
        }
    } else {
        echo "<script>alert('Error uploading the file.');</script>";
        echo "<script>window.open('index.php?trucks_quotes=1','_self');</script>";
    }
} else {
    echo "<script>alert('No file uploaded.');</script>";
    echo "<script>window.open('index.php?trucks_quotes=1','_self');</script>";
}
?>
