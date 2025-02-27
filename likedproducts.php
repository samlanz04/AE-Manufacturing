<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
    <title>Liked Items - AEM</title>
    <!-- <link rel="stylesheet" href="styles/truckstyle.css"> -->
    <link rel="stylesheet" href="styles/style.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Reset body to prevent unwanted gaps */
body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Main container taking full width with responsive spacing */
.liked-items-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
    
   
    justify-content: center; /* Center items on larger screens */
}

/* Each liked item adjusts dynamically */
.liked-item {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 15px;
    
    width: calc(100% - 40px); /* Default: Full width with padding accounted */
    max-width: 300px; /* Prevents items from getting too large */
    text-align: center;
    
    /* Responsive box-shadow */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

/* Slight hover effect */
.liked-item:hover {
    transform: scale(1.05);
}

/* Image responsiveness */
.liked-item img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
}

/* Message when no items are liked */
.no-liked-items {
    text-align: center;
    font-size: 18px;
    color: #666;
    margin-top: 20px;
}

/* Make it fully responsive with media queries */
@media (min-width: 600px) {
    .liked-items-container {
        justify-content: flex-start; /* Align items to start on bigger screens */
    }
    
    .liked-item {
        width: calc(50% - 40px); /* Two items per row on medium screens */
    }
}

@media (min-width: 900px) {
    .liked-item {
        width: calc(33.33% - 40px); /* Three items per row on large screens */
    }
}

@media (min-width: 1200px) {
    .liked-item {
        width: calc(25% - 40px); /* Four items per row on extra-large screens */
    }
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
        <h1 style="color: #1a237e;">Your Liked Items</h1>
        <div class="liked-items-container" id="liked-items-container">
            <!-- Liked items will be dynamically inserted here -->
        </div>
        <div class="no-liked-items" id="no-liked-items" style="display: none; color: #1a237e;">
            You have no liked items.
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const likedItemsContainer = document.getElementById('liked-items-container');
            const noLikedItemsMessage = document.getElementById('no-liked-items');

            // Get the liked products from localStorage
            const likedProducts = JSON.parse(localStorage.getItem('likedProducts')) || [];

            if (likedProducts.length === 0) {
                // Show message if no liked items
                noLikedItemsMessage.style.display = 'block';
            } else {
                // Fetch product data (replace with your actual product data)
                const productData = [
                    { name: "Truck Model 1", image: "images/Products/1.png", description: "Description of Truck Model 1.", price: 150000 },
                    { name: "Truck Model 2", image: "images/Products/4.png", description: "Description of Truck Model 2.", price: 95000 },
                    { name: "Truck Model 3", image: "images/Products/6.png", description: "Description of Truck Model 3.", price: 75000 },
                    // Add more products as needed
                ];

                // Filter product data to only include liked items
                const likedItems = productData.filter(product => likedProducts.includes(product.name));

                // Display liked items
                likedItems.forEach(item => {
                    const likedItemDiv = document.createElement('div');
                    likedItemDiv.className = 'liked-item';

                    likedItemDiv.innerHTML = `
                        <h3>${item.name}</h3>
                        <img src="${item.image}" alt="${item.name}">
                        <p>${item.description}</p>
                        <p class="price">$${item.price.toLocaleString()}</p>
                    `;

                    likedItemsContainer.appendChild(likedItemDiv);
                });
            }
        });
    </script>
</body>
</html>