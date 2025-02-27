<?php
session_start();

$host = "ls-d452bc3b2fac1873a5428b4500f305c5409331ad.crs4yuum0kxf.us-east-1.rds.amazonaws.com";
$dbname = "ecom_store";
$username = "dbmasteruser";
$password = ")~*>:8pxt^cb+o6Ph(HmOXUM}gh=,d`.";
$db_port = 3306;

// Establishing the database connection using PDO (More secure)
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;port=$db_port", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if a product ID is passed in the URL
if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);

    // Fetch product details from the database using prepared statements for security
    $stmt = $db->prepare("SELECT * FROM trucks WHERE product_id = :product_id");
    $stmt->execute(['product_id' => $product_id]);
    $row_product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row_product) {
        $product_title = $row_product['product_title'];

        // Generate a unique reference number
        $reference_number = strtoupper(substr(uniqid('REQ'), -8));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process the form submission using prepared statements
            $contact_name = htmlspecialchars($_POST['contact_name']);
            $contact_email = htmlspecialchars($_POST['contact_email']);
            $contact_phone = htmlspecialchars($_POST['contact_phone']);
            $additional_info = htmlspecialchars($_POST['additional_info']);

            $insert_quote = $db->prepare("INSERT INTO quotes (reference_number, product_id, product_title, contact_name, contact_email, contact_phone, additional_info)
                                          VALUES (:reference_number, :product_id, :product_title, :contact_name, :contact_email, :contact_phone, :additional_info)");

            $insert_quote->execute([
                'reference_number' => $reference_number,
                'product_id' => $product_id,
                'product_title' => $product_title,
                'contact_name' => $contact_name,
                'contact_email' => $contact_email,
                'contact_phone' => $contact_phone,
                'additional_info' => $additional_info
            ]);

            echo "<p>Quote request submitted successfully! Your reference number is <strong>$reference_number</strong>.</p>";
        }
    } else {
        echo "<p>Product not found.</p>";
        exit;
    }
} else {
    echo "<p>No product ID provided.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Quote</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    color: #333;
}

.container {
    max-width: 800px;
    margin: 30px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

header {
    text-align: center;
    margin-bottom: 20px;
}

h1 {
    color: #2c3e50;
}

/* Form styling */
.quote-request {
    background-color: #fafafa;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

textarea {
    height: 120px;
    resize: vertical;
}

button.btn-submit {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

button.btn-submit:hover {
    background-color: #2980b9;
}

/* Success message */
p {
    text-align: center;
    font-size: 1.2em;
    margin-top: 20px;
    color: #27ae60;
}

strong {
    color: #2980b9;
}

/* Error message */
p.error {
    text-align: center;
    font-size: 1.2em;
    margin-top: 20px;
    color: #e74c3c;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 15px;
    }

    h1 {
        font-size: 24px;
    }

    .quote-request {
        padding: 15px;
    }

    input[type="text"],
    input[type="email"],
    textarea {
        font-size: 14px;
    }

    button.btn-submit {
        font-size: 14px;
    }
}

        </style>
</head>
<body>

    <div class="container">
        

        <section class="quote-request">
            <p><strong>Product:</strong> <?php echo $product_title; ?></p>

            <form action="" method="POST" class="quote-form">
                <div class="form-group">
                    <label for="contact_name">Your Name:</label>
                    <input type="text" id="contact_name" name="contact_name" required>
                </div>

                <div class="form-group">
                    <label for="contact_email">Your Email:</label>
                    <input type="email" id="contact_email" name="contact_email" required>
                </div>

                <div class="form-group">
                    <label for="contact_phone">Your Phone:</label>
                    <input type="text" id="contact_phone" name="contact_phone" required>
                </div>

                <div class="form-group">
                    <label for="additional_info">Additional Information:</label>
                    <textarea id="additional_info" name="additional_info"></textarea>
                </div>

                <button type="submit" class="btn-submit">Submit Request</button>
            </form>
        </section>
    </div>
</body>
</html>
