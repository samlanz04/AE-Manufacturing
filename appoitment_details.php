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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $mobile_number = $_POST['mobile_number'];
    $email_address = $_POST['email_address'];
    $company_name = $_POST['company_name'];
    $registration_no = $_POST['registration_no'];
    $vin_no = $_POST['vin_no'];
    $insert_text = $_POST['insert_text'];

    // Handle file upload
    $image_path = "";
    if (isset($_FILES['upload_picture']) && $_FILES['upload_picture']['error'] == 0) {
        $upload_dir = "uploads/";
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $image_path = $upload_dir . basename($_FILES['upload_picture']['name']);
        move_uploaded_file($_FILES['upload_picture']['tmp_name'], $image_path);
    }

    // Insert data into the database
    $sql = "INSERT INTO services_appointments (name, surname, mobile_number, email_address, company_name, registration_no, vin_no, insert_text, image_path)
            VALUES ('$name', '$surname', '$mobile_number', '$email_address', '$company_name', '$registration_no', '$vin_no', '$insert_text', '$image_path')";

    if (mysqli_query($db, $sql)) {
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AEM - Appointment Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f7f7f7;
        }
        
        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: left;
        }

        .progress-indicator {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            padding: 10px 0;
            border-bottom: 2px solid #e0e0e0;
        }

        .progress-step {
            display: flex;
            align-items: center;
            color: #4caf50; /* Green color for completed steps */
            font-weight: bold;
        }

        .progress-step:before {
            content: "✓";
            display: inline-block;
            margin-right: 5px;
            color: #4caf50;
            font-size: 20px;
        }

        form {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-section h2 {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .form-row label {
            font-weight: bold;
            font-size: 14px;
        }

        .form-row input[type="text"],
        .form-row input[type="email"],
        .form-row textarea {
            width: calc(50% - 10px);
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            width: 100%;
            height: 80px;
        }

        .upload-section {
            text-align: center;
            margin: 20px 0;
        }

        .upload-picture {
            width: 100px;
            height: 100px;
            background-color: #eaeaea;
            border: 2px dashed #ccc;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: #777;
            cursor: pointer;
        }

        .upload-text {
            font-size: 14px;
            margin-top: 8px;
            color: #555;
        }

        .submit-button {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            background-color: #4caf50;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
        }

        .submit-button:hover {
            background-color: #388e3c;
        }
    </style>
    <link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
</head>
<body>

<?php
session_start();
include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>

<h1>Appointment Details</h1>

<div class="progress-indicator">
    <div class="progress-step">1. Reason & Location</div>
    <div class="progress-step">2. Time Slot</div>
    <div class="progress-step">3. Appointment Details</div>
    <div class="progress-step">4. Done</div>
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <!-- Personal Information Section -->
    <div class="form-section">
        <h2>Personal Information</h2>
        <div class="form-row">
            <label>Name</label><input type="text" name="name" required>
            <label>Surname</label><input type="text" name="surname" required>
        </div>
        <div class="form-row">
            <label>Mobile number</label><input type="text" name="mobile_number" required>
            <label>Email Address</label><input type="email" name="email_address" required>
        </div>
    </div>

    <!-- Company Information Section -->
    <div class="form-section">
        <h2>Company Information</h2>
        <div class="form-row">
            <label>Company Name</label><input type="text" name="company_name">
            <label>Registration No.</label><input type="text" name="registration_no">
        </div>
        <div class="form-row">
            <label>VIN No.</label><input type="text" name="vin_no">
        </div>
    </div>

    <!-- Additional Information Section -->
    <div class="form-section">
        <h2>Additional Information</h2>
        <label for="insert_text">Insert Text</label>
        <textarea name="insert_text" id="insert_text" placeholder="Text Here"></textarea>
    </div>

    <!-- Image Upload Section -->
    <div class="form-section upload-section">
        <label for="upload_picture" class="upload-picture">+</label>
        <input type="file" name="upload_picture" id="upload_picture" style="display:none;">
        <div class="upload-text">Upload Picture</div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="submit-button">Submit Here</button>
</form>

</body>
</html>