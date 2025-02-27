<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
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
            max-width: 300px;
            border-radius: 10px;
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
        .tabs {
            margin-top: 20px;
        }
        .tabs button {
            background: #e0f7fa;
            color: #00796b;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .tabs-content {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
        .thumbnails {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .thumbnails img {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            border: 2px solid #ddd;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="product">
        <!-- Product Image Section -->
        <div class="product-image">
            <img src="images/Products/15.png" alt="Hydraulic Hose">
        </div>

        <!-- Product Info Section -->
        <div class="product-info">
            <h1>Hydraulic Hose</h1>
            <label for="quantity">Product Quantity</label>
            <select id="quantity">
                <option>Select quantity</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            <label for="size">Product Size</label>
            <select id="size">
                <option>Select a Size</option>
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
            </select>
            <div class="price">Product Price: R95000</div>
            <button>Add to Cart</button>
            <button>Add to Wishlist</button>

            <!-- Thumbnails Section moved here -->
            <div class="thumbnails">
                <img src="images/Products/15.png" alt="Thumbnail 1">
                <img src="images/Products/15.png" alt="Thumbnail 2">
                <img src="images/Products/15.png" alt="Thumbnail 3">
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
        Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
    </div>
</div>

</body>
</html>
