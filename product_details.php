<?php
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

// Fetch product details if a valid product ID is provided
if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);
    $get_product = "SELECT * FROM trucks WHERE product_id = '$product_id'";
    $run_product = mysqli_query($db, $get_product);

    if (mysqli_num_rows($run_product) > 0) {
        $row_product = mysqli_fetch_array($run_product);

        // Assigning product details to variables
        $product_title = $row_product['product_title'];
        $product_url = $row_product['product_url'];
        $product_images = [
            $row_product['product_img1'],
            $row_product['product_img2'],
            $row_product['product_img3'],
            $row_product['product_img4'],
            $row_product['product_img5'],
            $row_product['product_img6']
        ];
        $product_features = $row_product['product_features'];
        $product_quantity = $row_product['product_quantity'];
        $product_label = $row_product['product_label'];
        $warranty = $row_product['warranty'];
        $liters = $row_product['liters'];

        // Output product details
        echo "
        <div class='product-details'>
            <h1 class='product-title'>$product_title</h1>
            <div class='product-main-image'>
                <img id='main-image' src='admin_area/product_images/{$product_images[0]}' alt='$product_title' class='img-responsive'>
            </div>
            <div class='product-thumbnails'>
                " . implode('', array_map(function($img) use ($product_title) {
                    return "<img src='admin_area/product_images/$img' alt='$product_title Thumbnail' class='thumbnail' onclick='changeMainImage(\"$img\")'>";
                }, $product_images)) . "
            </div>
            <div class='product-info'>
                <p><strong>Details:</strong> $product_features</p>
                <p><strong>Quantity:</strong> $product_quantity</p>
                <p><strong>Warranty:</strong> $warranty months</p>
                <p><strong>Capacity:</strong> $liters Liters</p>
                <p><strong>Label:</strong> $product_label</p>
            </div>
            <div class='product-actions'>
                <a href='index.php' class='btn btn-primary'>Back to Products</a>
                <a href='RequestAQuote.php?product_id=$product_id' class='btn btn-secondary'>Request Quote</a>
                 <a href='truck_wishlist.php?add_to_wishlist=true&product_id=$product_id' class='btn btn-success'>Add to Wishlist</a>
            </div>
        </div>";
    } else {
        echo "<p class='error-message'>Product not found.</p>";
    }
} else {
    echo "<p class='error-message'>No product ID provided.</p>";
}
?>

<script>
    // Function to change the main image when a thumbnail is clicked
    function changeMainImage(imageSrc) {
        document.getElementById('main-image').src = 'admin_area/product_images/' + imageSrc;
    }
</script>

<style>
    /* General product details container */
    .product-details {
        max-width: 900px;
        margin: 30px auto;
        font-family: 'Arial', sans-serif;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .product-title {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 20px;
        color: #333;
    }

    .product-main-image img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }

    .product-main-image img:hover {
        transform: scale(1.05);
    }

    .product-thumbnails {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 30px;
    }

    .product-thumbnails .thumbnail {
        width: 80px;
        height: 80px;
        object-fit: cover;
        cursor: pointer;
        border-radius: 8px;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .product-thumbnails .thumbnail:hover {
        border-color: #007bff;
        transform: scale(1.1);
    }

    .product-info {
        margin-bottom: 30px;
        font-size: 1.1rem;
        color: #555;
    }

    .product-info p {
        margin: 10px 0;
    }

    .product-actions {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .btn {
        padding: 12px 20px;
        color: #fff;
        background-color: #007bff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 1rem;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .error-message {
        color: red;
        font-size: 1.2rem;
        text-align: center;
    }
</style>
