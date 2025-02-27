<?php
require('fpdf/fpdf.php'); 

// Fetch appointment details (Assuming last inserted record)
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
$result = mysqli_query($db, "SELECT * FROM services_appointments ORDER BY id DESC LIMIT 1");
$appointment = mysqli_fetch_assoc($result);

// Generate PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Appointment Details', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Name: " . $appointment['name'], 0, 1);
$pdf->Cell(0, 10, "Surname: " . $appointment['surname'], 0, 1);
$pdf->Cell(0, 10, "Mobile Number: " . $appointment['mobile_number'], 0, 1);
$pdf->Cell(0, 10, "Email Address: " . $appointment['email_address'], 0, 1);
$pdf->Cell(0, 10, "Company Name: " . $appointment['company_name'], 0, 1);
$pdf->Cell(0, 10, "Registration No: " . $appointment['registration_no'], 0, 1);
$pdf->Cell(0, 10, "VIN No: " . $appointment['vin_no'], 0, 1);
$pdf->Cell(0, 10, "Insert Text: " . $appointment['insert_text'], 0, 1);
$pdf->Output('F', 'appointment.pdf');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Confirmation</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    color: #333;
    background-color: #f9f9f9;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Header */
header {
    text-align: center;
    padding: 20px;
}

header h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

/* Progress Bar */
.progress-bar {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin: 20px 0;
}
.progress-bar p{
    color: #000080;
}
.progress-bar .step {
    width: 25px;
    height: 25px;
    background-color: green;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-weight: bold;
}

/* Confirmation Message */
.confirmation-message {
    text-align: center;
    padding: 20px;
    background-color: #e6f4e8;
    color: green;
    font-size: 18px;
    border: 1px solid #b6dfc4;
    border-radius: 5px;
    margin: 20px 0;
}

/* Footer */
footer {
    text-align: center;
    margin-top: 40px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
}

footer a {
    display: inline-block;
    text-decoration: none;
    color: green;
    font-weight: bold;
    margin-top: 10px;
}

footer a:hover {
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 768px) {
    header h1 {
        font-size: 20px;
    }

    .confirmation-message {
        font-size: 16px;
    }
}
/* Company Logo */
.company-logo {
    text-align: center;
    margin: 20px 0;
}

.company-logo img {
    max-width: 150px; /* Adjust as needed */
    height: auto;
}

        </style>
        <link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
</head>
<body>

    <header>
        <h1>Appointment Details</h1>
        <div class="progress-bar">
            <div class="step">✓</div>
            <p>Reason & LocationTime-</p>
            <div class="step">✓</div>
            <p>Time Slots-</p>
            <div class="step">✓</div>
            <p>Appointment Details-</p>
            <div class="step">✓</div>
            <p>Done-</p>
        </div>
    </header>
    
    <div class="confirmation-message">
        Thank you! Your booking has been successfully confirmed!
    </div>
    <div class="company-logo">
        <a href="index.php">
            <img src="images/Full_LOGO.png" alt="Africa Engineering & Manufacturing Logo">
        </a>
    </div>

    <footer>
        <p>If you have any questions or need further assistance, feel free to reach out. We will contact you shortly.</p>
        <a href="appointment.pdf" download>Download PDF Document</a>
    </footer>
</body>
</html>

