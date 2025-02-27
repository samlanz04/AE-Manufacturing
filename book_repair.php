<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEM</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h2, h3 {
    text-align: center;
    color: #333;
}

.appointment-booking {
    max-width: 600px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

.form-label {
    font-size: 1rem;
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
    color: #333;
}

.form-input, .form-select {
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    font-size: 1rem;
    box-sizing: border-box;
}

.form-input:focus, .form-select:focus {
    outline: none;
    border-color: #5b9bd5;
}

.submit-button {
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    color: white;
    border: none;
    font-size: 1rem;
    cursor: pointer;
    border-radius: 4px;
}

.submit-button:hover {
    background-color: #45a049;
}

.back-link {
    display: inline-block;
    margin-top: 10px;
    text-align: center;
    color: #007BFF;
    text-decoration: none;
}

.back-link:hover {
    text-decoration: underline;
}

.appointment-details {
    margin-top: 30px;
    font-size: 1.2rem;
    font-weight: bold;
    text-align: center;
    color: #333;
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
    <div class="appointment-booking">
        <h2 class="form-title">Book an Appointment</h2>
        <form class="booking-form" action="process_booking.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name" class="form-label">Full Name:</label>
                <input type="text" id="name" name="name" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email Address:</label>
                <input type="email" id="email" name="email" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">Phone Number:</label>
                <input type="tel" id="phone" name="phone" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="truck_type" class="form-label">Truck Type:</label>
                <input type="text" id="truck_type" name="truck_type" class="form-input" placeholder="e.g., Pickup, Semi-Truck" required>
            </div>

            <div class="form-group">
                <label for="department" class="form-label">Shop by Department:</label>
                <select id="department" name="department" class="form-select" required>
                    <option value="">Choose a Department</option>
                    <option value="engine-repair">Engine Repair</option>
                    <option value="transmission">Transmission</option>
                    <option value="brakes">Brakes</option>
                </select>
            </div>

            <div class="form-group">
                <label for="brand" class="form-label">Brand:</label>
                <input type="text" id="brand" name="brand" class="form-input" placeholder="e.g., Ford, Toyota">
            </div>

            <div class="form-group">
                <label for="engine_power" class="form-label">Engine Power Specs:</label>
                <input type="text" id="engine_power" name="engine_power" class="form-input" placeholder="e.g., 300 HP, 500 HP">
            </div>

            <div class="form-group">
                <label for="picture" class="form-label">Upload Picture:</label>
                <input type="file" id="picture" name="picture" class="form-input" accept="image/*">
            </div>

            <h3 class="appointment-details">Appointment Details</h3>

            <div class="form-group">
                <label for="appointment_date" class="form-label">Select Date:</label>
                <input type="date" id="appointment_date" name="appointment_date" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="appointment_time" class="form-label">Select Time Slot:</label>
                <select id="appointment_time" name="appointment_time" class="form-select" required>
                    <option value="">Choose a Time Slot</option>
                    <option value="9am">9:00 AM</option>
                    <option value="11am">11:00 AM</option>
                    <option value="1pm">1:00 PM</option>
                    <option value="3pm">3:00 PM</option>
                </select>
            </div>

            <div class="form-group">
                <label for="reason" class="form-label">Reason for Appointment:</label>
                <input type="text" id="reason" name="reason" class="form-input" placeholder="e.g., Repair, Maintenance" required>
            </div>

            <div class="form-group">
                <label for="location" class="form-label">Location:</label>
                <input type="text" id="location" name="location" class="form-input" placeholder="e.g., On-Site Service, Repair Shop" required>
            </div>

            <button type="submit" class="submit-button">Submit Booking</button>
            <a href="index.php" class="back-link">Back</a>
        </form>
    </div>

</body>
</html>
