<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="admin_images/Favicon.ICO" type="image/x-icon">
    <title>Product Preview</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .product {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product-image {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }
        .product-image img {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
        }
        .thumbnails {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .thumbnails img {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            border: 2px solid #ddd;
            cursor: pointer;
        }
        .product-info {
            flex: 2;
        }
        .product-info h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .product-info select,
        .product-info button {
            width: 100%;
            max-width: 200px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .product-info .price {
            font-size: 20px;
            color: #333;
            margin-bottom: 20px;
        }
        .product-info .buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .tabs {
            margin-top: 30px;
            display: flex;
            gap: 10px;
        }
        .tabs button {
            padding: 10px 20px;
            background-color: #e0f7fa;
            color: #00796b;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .tabs-content {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

<?php
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

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Query to get product details
    $get_product = "SELECT * FROM products WHERE product_id='$product_id'";
    $run_product = mysqli_query($db, $get_product); // Use $db instead of $con

    if ($run_product) {
        $row_product = mysqli_fetch_array($run_product);

        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_quantity = $row_product['product_quantity'];
        $pro_desc = $row_product['product_desc'];
        $pro_features = $row_product['product_features'];
        $pro_video = $row_product['product_video'];
        $pro_img1 = $row_product['product_img1'];
        $pro_img2 = $row_product['product_img2'];
        $pro_img3 = $row_product['product_img3'];
?>

<div class="container">
    <div class="product">
        <!-- Product Image Section -->
        <div class="product-image">
            <img src="product_images/<?php echo $pro_img1; ?>" alt="Main Product Image">
        </div>

        <!-- Product Info Section -->
        <div class="product-info">
            <h1><?php echo $pro_title; ?></h1>
            <!-- Quantity and Size Dropdowns -->
            <label for="product-quantity">Product Quantity:</label>
            <select id="product-quantity" name="product_quantity">
                <option value="" disabled selected>Select quantity</option>
                <?php for ($i = 1; $i <= $pro_quantity; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>

            <label for="product-size">Product Size:</label>
            <select id="product-size" name="product_size">
                <option value="" disabled selected>Select a size</option>
                <option value="Small">Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
            </select>

         
            <div class="price">Product Price: R <?php echo $pro_price; ?></div>
            <div class="buttons">
                <button>Add to Cart</button>
                <button>Add to Wishlist</button>
            </div>

            <!-- Thumbnails moved here -->
            <div class="thumbnails">
                <img src="product_images/<?php echo $pro_img1; ?>" alt="Thumbnail 1">
                <img src="product_images/<?php echo $pro_img2; ?>" alt="Thumbnail 2">
                <img src="product_images/<?php echo $pro_img3; ?>" alt="Thumbnail 3">
            </div>
        </div>
    </div>

    <!-- Tabs Section -->
    <div class="tabs">
        <button>Details</button>
        <button>Policy</button>
        <button>Certificates</button>
    </div>

    <!-- Tabs Content -->
    <div class="tabs-content">
        <div id="details">
            <p><?php echo $pro_desc; ?></p>
        </div>
    </div>
</div>

<?php
    } else {
        echo "<p>Product not found.</p>";
    }
} else {
    echo "<p>No product selected.</p>";
}
?>

</body>
</html>
