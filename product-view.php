<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
<title>AEM-All Trucks</title>
<style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
    }

    /* Header */
    .header {
        background-color: #ffffff;
        padding: 10px 20px;
        border-bottom: 2px solid #e0e0e0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .logo {
        font-weight: bold;
        color: #000080;
    }
    .search-bar {
        display: flex;
        align-items: center;
        border: 2px solid #000080;
        padding: 5px;
    }
    .search-bar input[type="text"] {
        border: none;
        padding: 5px;
        outline: none;
    }
    .search-bar button {
        background-color: #000080;
        color: #ffffff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    /* Sidebar */
    .sidebar {
        width: 200px;
        background-color: #f1f1f1;
        padding: 10px;
        position: fixed;
        top: 60px;
        bottom: 0;
    }
    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }
    .sidebar ul li {
        padding: 10px;
        color: #000080;
        cursor: pointer;
    }
    .sidebar ul li:hover {
        background-color: #e0e0e0;
    }

    /* Main Content */
    .content {
        margin-left: 220px;
        padding: 20px;
    }

    /* Breadcrumb */
    .breadcrumb {
        font-size: 14px;
        color: #666;
    }

    /* Product List */
    .product-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .product-item {
    display: flex;
    border: 1px solid #e0e0e0;
    padding: 10px;
    background-color: #ffffff;
    }
    .product-image {
        flex: 1;
    }
    .product-image img {
        width: 150px;
        height: auto;
        border-radius: 5px;
    }
    .product-details {
    flex: 2;
    padding: 10px;
    display: flex;
    flex-direction: column;
}
    .product-title {
        font-size: 18px;
        font-weight: bold;
        color: #000080;
    }
    .product-price {
        font-size: 20px;
        font-weight: bold;
        color: #000080;
        margin-top: 10px;
    }
    .product-actions {
    display: flex;
    flex-direction: column;
    margin-top: 10px;
}

.product-actions button {
    background-color: #000080;
    color: #ffffff;
    border: none;
    padding: 10px;
    margin-top: 5px;
    cursor: pointer;
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

<!-- Main Content -->
<div class="content">
    <div class="breadcrumb">Home > Trucks > View All</div>
    
    <div class="product-list">
        <!-- Product 1 -->
        <div class="product-item">
            <div class="product-image">
                <img src="images/Products/15.png" alt="Product 1">
            </div>
            <div class="product-details">
                <div class="product-title">Heil 5000 - Used Compactor body part</div>
            </div>
            <div class="product-actions">
                <button onclick="window.location.href='quote_form.php'">Request Quote</button>
                <button  onclick="window.location.href='compactor-details.php'">View Details</button>
            </div>
        </div>
        
        <!-- Product 2 -->
        <div class="product-item">
            <div class="product-image">
                <img src="images/Products/1.png" alt="Product 2">
            </div>
            <div class="product-details">
                <div class="product-title">Cos.Eco</div>
            </div>
            <div class="product-actions">
                <button onclick="window.location.href='quote_form.php'">Get A Quote</button>
                <button  onclick="window.location.href='compactor-details.php'">View Details</button>
            </div>
        </div>
        
        <!-- Product 3 -->
        <div class="product-item">
            <div class="product-image">
                <img src="images/Products/6.png" alt="Product 3">
            </div>
            <div class="product-details">
                <div class="product-title">Oracki</div>
            </div>
            <div class="product-actions">
                <button onclick="window.location.href='quote_form.php'">Get A Quote</button>
                <button  onclick="window.location.href='compactor-details.php'">View Details</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
