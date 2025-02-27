<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
    <title>Your Cart - AEM</title>
    <!-- <link rel="stylesheet" href="styles/truckstyle.css"> -->
    <link rel="stylesheet" href="styles/style.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .cart-container {
            padding: 20px;
        }
        .cart-item {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .cart-total {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header class="header">
        <!-- Left: Logo -->
        <div class="logo-container">
            <img src="images/logo13.jpg" alt="Company Logo" class="logo">
        </div>

        <!-- Center: Navigation Links -->
        <nav class="nav-links">
            <a href="index.php">Home</a> |
            <a href="shopTruck.php">Shop</a> |
            <a href="#">Services</a>
        </nav>

        <!-- Right: User Options & Icons -->
        <div class="user-actions">
            <a href="#">Login</a> |
            <a href="#">Logout</a> |
            <a href="#">My Account</a>
            <button class="icon-btn">
                <i class="fas fa-heart"></i>
            </button>
            <button class="icon-btn">
                <i class="fas fa-shopping-cart"></i>
            </button>
        </div>
    </header>

    <main class="main-content">
        <h1>Your Cart</h1>
        <div class="cart-container" id="cart-container">
            <!-- Cart items will be dynamically inserted here -->
        </div>
        <div class="cart-total">
            <p>Total: $<span id="cart-total">0</span></p>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cartContainer = document.getElementById('cart-container');
            const cartTotalElement = document.getElementById('cart-total');

            // Get the cart from localStorage
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            let total = 0;

            // Display cart items
            cart.forEach(item => {
                const cartItemDiv = document.createElement('div');
                cartItemDiv.className = 'cart-item';
                cartItemDiv.innerHTML = `
                    <span>${item.name}</span>
                    <span>$${item.price.toLocaleString()}</span>
                `;
                cartContainer.appendChild(cartItemDiv);
                total += item.price;
            });

            // Display total
            if (cartTotalElement) {
                cartTotalElement.textContent = total.toLocaleString();
            }
        });
    </script>
</body>
</html>