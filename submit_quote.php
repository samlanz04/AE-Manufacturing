<?php
//require 'path/to/PHPMailer.php';
require('fpdf/fpdf.php'); 

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

// Capture form data
$customer_name = $_POST['customer_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$truck_model = $_POST['truck_model'];
$quantity = $_POST['quantity'];
$comments = $_POST['comments'];

// Insert data into the database
$query = "INSERT INTO truck_quotes (customer_name, email, phone, truck_model, quantity, comments) 
          VALUES ('$customer_name', '$email', '$phone', '$truck_model', '$quantity', '$comments')";

if (mysqli_query($db, $query)) {
    // Generate PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Truck Quote Request', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Ln(10);
    $pdf->Cell(0, 10, "Customer Name: $customer_name", 0, 1);
    $pdf->Cell(0, 10, "Email: $email", 0, 1);
    $pdf->Cell(0, 10, "Phone: $phone", 0, 1);
    $pdf->Cell(0, 10, "Truck Model: $truck_model", 0, 1);
    $pdf->Cell(0, 10, "Quantity: $quantity", 0, 1);
    $pdf->Cell(0, 10, "Comments: $comments", 0, 1);
    $pdf->Output('F', 'quote_request.pdf');

    // Display success message and download link with exit button
    echo "
    <div style='max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; text-align: center; font-family: Arial, sans-serif;'>
        <h2 style='color: #000080;'>Thank you! Your quote request has been submitted.</h2>
        <p>Your request details have been successfully saved, and a PDF has been generated with your information.</p>
        <a href='quote_request.pdf' download style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #000080; color: #ffffff; text-decoration: none; border-radius: 4px;'>Download your quote as PDF</a>
        <br><br>
        <a href='index.php' style='display: inline-block; padding: 10px 20px; background-color: #ff0000; color: #ffffff; text-decoration: none; border-radius: 4px;'>Exit</a>
    </div>";
} else {
    // Display error message with exit button
    echo "
    <div style='max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ffcccc; border-radius: 8px; text-align: center; font-family: Arial, sans-serif;'>
        <h2 style='color: #ff0000;'>Error</h2>
        <p>There was an issue processing your request: " . mysqli_error($db) . "</p>
        <br>
        <a href='index.php' style='display: inline-block; padding: 10px 20px; background-color: #ff0000; color: #ffffff; text-decoration: none; border-radius: 4px;'>Exit</a>
    </div>";
}

// Close the database connection
mysqli_close($db);
?>
