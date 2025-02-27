<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
    <title>AEM-Compactor Bodies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .page-container {
            display: flex;
            gap: 20px;
            padding: 20px;
        }
        .thumbnail-sidebar {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .thumbnail-sidebar img {
            width: 80px;
            border: 2px solid #000080;
            border-radius: 5px;
            cursor: pointer; /* Add cursor to indicate clickability */
        }
        .primary-image-section {
            flex: 1;
            text-align: center;
        }
        .primary-image-section img {
            width: 100%;
            max-width: 500px;
            border-radius: 5px;
        }
        .product-details {
            flex: 1;
            padding-left: 20px;
        }
        .product-details h1,
        .product-details h2 {
            color: #000080;
        }
        .product-details p {
            color: #666;
        }
        .availability-status {
            font-size: 18px;
            color: #000080;
            font-weight: bold;
            margin-top: 10px;
        }
        .navigation-tabs {
            display: flex;
            gap: 20px;
            margin-top: 10px;
            font-size: 18px;
        }
        .navigation-tabs a {
            color: #000080;
            text-decoration: none;
            font-weight: bold;
        }
        .navigation-tabs a:hover {
            text-decoration: underline;
        }
        .description-text {
            margin-top: 10px;
            color: #666;
            line-height: 1.5;
        }
        .product-price {
            font-size: 24px;
            color: #000080;
            font-weight: bold;
            margin-top: 10px;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .primary-button {
            padding: 10px 20px;
            background-color: #000080;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .primary-button:hover {
            background-color: #333399;
        }
    </style>
</head>
<body>
<?php
session_start();
include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php"); 
?>
<div class="page-container">
    <!-- Sidebar with Thumbnail Images -->
    <div class="thumbnail-sidebar">
        <img src="images/Products/15.png" alt="Thumbnail 1" onclick="changeMainImage(this)">
        <img src="images/Products/16.png" alt="Thumbnail 2" onclick="changeMainImage(this)">
        <img src="images/Products/13.png" alt="Thumbnail 3" onclick="changeMainImage(this)">
        <img src="images/Products/14.png" alt="Thumbnail 4" onclick="changeMainImage(this)">
        <img src="images/Products/18.png" alt="Thumbnail 5" onclick="changeMainImage(this)">
    </div>

    <!-- Main Product Image and Details -->
    <div class="primary-image-section">
        <img id="mainProductImage" src="images/Products/15.png" alt="Main Product Image">
    </div>

    <!-- Product Details Section -->
    <div class="product-details">
        <h1>Compactor Bodies</h1>
        <h2>Heil 5000 - Used Compactor body part</h2>
        <p>waste management and transportation</p>

        <!-- Rating and Reviews -->
        <div class="product-rating">
            <span>⭐⭐⭐⭐⭐</span>
            <a href="#" style="color: #000080; font-weight: bold; text-decoration: none;">Reviews</a>
        </div>

        <!-- Availability Status -->
        <div class="availability-status">
            In Stock - Get in 3 Weeks! <span style="background-color: #666; color: #fff; padding: 5px; border-radius: 3px;">JHB</span> <span style="background-color: #666; color: #fff; padding: 5px; border-radius: 3px;">CPT</span>
        </div>

        <!-- Tabs for Details, Policy, Certifications -->
        <div class="navigation-tabs">
            <a href="#details">Details</a>
            <a href="#policy">Policy</a>
            <a href="#certifications">Certifications</a>
        </div>

        <!-- Product Description -->
        <div class="description-text">
            <p>The Heil 5000 is a robust used compactor body designed for efficient waste management, featuring a capacity of 20 to 30 cubic yards and a durable heavy-duty steel construction. It utilizes a powerful hydraulic compaction system, achieving a compaction ratio of approximately 3:1 to 5:1, which maximizes waste density. Available in both rear and side loading configurations, the Heil 5000 is ideal for municipal and commercial applications, offering reliability and ease of maintenance for optimal operational efficiency.</p>
        </div>

        <!-- Price and Action Buttons -->
        <div class="action-buttons">
            <button class="primary-button" onclick="window.location.href='quote_form.php'">Request Quote</button>
        </div>
    </div>
</div>
<!-- Product Information Section -->
<div class="navigation-links">
    <h1>Compactor Bodies | Heil 5000 - Used Compactor body part</h1>
        <a href="index.php">Home</a> | <a href="#services">Parts & Spares</a>
    </div>
<div class="product-info">
    <h2>Product Information</h2>
    <table>
        <tr><td><strong>Categories</strong></td><td>Parts & Spares/Compactor Bodies</td></tr>
        <tr><td><strong>Brand</strong></td><td>Heil</td></tr>
        <tr><td><strong>New/Old</strong></td><td>Used</td></tr>
        <tr><td><strong>Safety</strong></td><td>Information</td></tr>
        <tr><td><strong>Warranty</strong></td><td>Information</td></tr>
        <tr><td><strong>Liters</strong></td><td>20L</td></tr>
    </table>
</div>

<!-- Related Products Section -->
<div class="related-products">
    <h2>Related Products</h2>
    <div class="related-product-images">
        <div class="related-product">
            <a href="shop.php">
                <img src="images/Products/A.jpg" alt="Related Product 1">
            </a>
        </div>
        <div class="related-product">
            <a href="shop.php">
                <img src="images/Products/B.jpg" alt="Related Product 2">
            </a>
        </div>
        <div class="related-product">
            <a href="shop.php">
                <img src="images/Products/C.jpg" alt="Related Product 3">
            </a>
        </div>
        <div class="related-product">
            <a href="shop.php">
                <img src="images/Products/7.7.png" alt="Related Product 4">
            </a>
        </div>
    </div>
</div>


<style>
    .related-products{
        margin-left:1%;
    }
    .product-info h2{
        margin-left:1%;
    }
     .navigation-links h1 {
            font-size: 30px;
            font-weight: bold;
            color: #000080
        }
     .navigation-links {
            font-size: 16px;
            font-weight: bold;
            margin-left:1%;
        }
    body {
        font-family: Arial, sans-serif;
    }

    .product-info h2, .related-products h2 {
        color: #000080;
        font-weight: bold;
        font-size: 1.2em;
    }

    .product-info table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        background-color: #f8f8f8;
    }

    .product-info td {
        padding: 8px 15px;
        border-bottom: 1px solid #ddd;
    }

    .product-info td:first-child {
        color: #000080;
        font-weight: bold;
    }

    .related-products {
        margin-top: 20px;
    }

    .related-product-images {
        display: flex;
        gap: -10px;
        justify-content: space-around;
        margin-top: 10px;
    }

    .related-product img {
        width: 230px; /* Increased size */
        height: 150px; /* Increased size */
        cursor: pointer;
        transition: transform 0.3s;
        object-fit: cover;
    }

    .related-product img:hover {
        transform: scale(1.05);
    }

    .hover-text {
        color: red;
        text-align: center;
        margin-top: 10px;
        font-weight: bold;
        font-size: 0.9em;
    }
</style>

<script>
    function changeMainImage(thumbnail) {
        const mainImage = document.getElementById('mainProductImage');
        mainImage.src = thumbnail.src;
    }
</script>
</body>
</html>
