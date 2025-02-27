<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
    <title>AEM</title>
    <link rel="stylesheet" href="styles/truckstyle.css">
    <link rel="stylesheet" href="styles/style.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        // Wait for the DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
    // Get all filter dropdowns with the same ID
    const filterDropdowns = document.querySelectorAll('#truck-filter');
    const productTypeFilter = filterDropdowns[0];
    const availabilityFilter = filterDropdowns[1];
    const conditionFilter = filterDropdowns[2];
    
    // Get all product cards
    const productCards = document.querySelectorAll('.card');
    
    // Initialize product data with all relevant properties
    const productData = [
        {
            element: productCards[0],
            category: "heavy-duty",
            type: "Trucks",
            availability: "Today",
            condition: "New",
            price: 150000
        },
        {
            element: productCards[1],
            category: "medium-duty",
            type: "Trucks",
            availability: "Up to 7 days",
            condition: "New",
            price: 95000
        },
        {
            element: productCards[2],
            category: "light-duty",
            type: "Trucks", 
            availability: "Up to 14 days",
            condition: "Used",
            price: 75000
        },
        {
            element: productCards[3],
            category: "heavy-duty",
            type: "Parts & Spares",
            availability: "Today",
            condition: "New",
            price: 5000
        },
        {
            element: productCards[4],
            category: "medium-duty",
            type: "Parts & Spares",
            availability: "Up to 7 days",
            condition: "New",
            price: 3500
        },
        {
            element: productCards[5],
            category: "light-duty",
            type: "Parts & Spares",
            availability: "Today",
            condition: "Used",
            price: 2000
        },

        {
            element: productCards[6],
            category: "light-duty",
            type: "Parts & Spares",
            availability: "Today",
            condition: "Used",
            price: 2000
        },

        {
            element: productCards[7],
            category: "light-duty",
            type: "Parts & Spares",
            availability: "Today",
            condition: "Used",
            price: 2000
        },

        {
            element: productCards[8],
            category: "heavy-duty",
            type: "Parts & Spares",
            availability: "Today",
            condition: "Used",
            price: 2000
        },

        {
            element: productCards[9],
            category: "medium-duty",
            type: "Parts & Spares",
            availability: "Today",
            condition: "Used",
            price: 2000
        },

        {
            element: productCards[10],
            category: "light-duty",
            type: "Parts & Spares",
            availability: "Today",
            condition: "Used",
            price: 2000
        }
    ];
    
    // Display initial prices
    updatePrices();
    
    // Function to update prices on the page
    function updatePrices() {
        productData.forEach((product, index) => {
            const priceElement = product.element.querySelector('.price span');
            if (priceElement) {
                priceElement.textContent = product.price.toLocaleString();
            }
        });
    }
    
    // Function to apply all active filters
    function applyFilters() {
        const selectedProductType = productTypeFilter.value;
        const selectedAvailability = availabilityFilter.value;
        const selectedCondition = conditionFilter.value;
        
        productData.forEach(product => {
            let visible = true;
            
            // Filter by product type
            if (selectedProductType !== "all") {
                // Map filter values to product types
                const typeMapping = {
                    "all": "Trucks",
                    "heavy-duty": "Parts & Spares",
                    "medium-duty": "Services",
                    "light-duty": "Manufacture"
                };
                
                if (product.type !== typeMapping[selectedProductType]) {
                    visible = false;
                }
            }
            
            // Filter by availability
            if (selectedAvailability !== "all") {
                // Map filter values to availability options
                const availabilityMapping = {
                    "all": "Today",
                    "heavy-duty": "Up to 7 days",
                    "medium-duty": "Up to 14 days",
                    "light-duty": "Up to 21 days"
                };
                
                if (product.availability !== availabilityMapping[selectedAvailability]) {
                    visible = false;
                }
            }
            
            // Filter by condition
            if (selectedCondition !== "all") {
                // Map filter values to condition options
                const conditionMapping = {
                    "all": "New",
                    "heavy-duty": "Used"
                };
                
                if (product.condition !== conditionMapping[selectedCondition]) {
                    visible = false;
                }
            }
            
            // Apply visibility
            product.element.style.display = visible ? "block" : "none";
        });
        
        // Check if any products are visible, show a message if none
        checkVisibleProducts();
    }
    
    // Check if any products are visible after filtering
    function checkVisibleProducts() {
        const visibleProducts = Array.from(productCards).filter(card => 
            card.style.display !== "none"
        );
        
        // Get or create the "no results" message element
        let noResultsMsg = document.getElementById("no-results-message");
        if (!noResultsMsg) {
            noResultsMsg = document.createElement("div");
            noResultsMsg.id = "no-results-message";
            noResultsMsg.textContent = "No products match your selected filters.";
            noResultsMsg.style.textAlign = "center";
            noResultsMsg.style.padding = "20px";
            noResultsMsg.style.width = "100%";
            noResultsMsg.style.fontSize = "18px";
            noResultsMsg.style.color = "#666";
            noResultsMsg.style.fontWeight = "bold";
            document.querySelector(".card-container").appendChild(noResultsMsg);
        }
        
        // Show or hide the message based on visible products
        if (visibleProducts.length === 0) {
            noResultsMsg.style.display = "block";
        } else {
            noResultsMsg.style.display = "none";
        }
    }
    
    // Add event listeners to filter dropdowns
    productTypeFilter.addEventListener('change', applyFilters);
    availabilityFilter.addEventListener('change', applyFilters);
    conditionFilter.addEventListener('change', applyFilters);
    
    // Handle cart functionality
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            const product = productData[index];
            alert(`Added to cart: ${product.element.querySelector('h3').textContent} - $${product.price.toLocaleString()}`);
            // Add cart functionality here
        });
    });
    
    // Handle view details functionality
    const viewDetailsButtons = document.querySelectorAll('.view-details');
    viewDetailsButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            const product = productData[index];
            alert(`Viewing details for: ${product.element.querySelector('h3').textContent}`);
            // Add view details functionality here
        });
    });
    
    // Run initial filtering to set up the page
    applyFilters();
    });

    document.addEventListener('DOMContentLoaded', function () {
    // Function to toggle the heart icon and store liked products
    function toggleHeartIcon(button) {
        const productId = button.closest('.card').querySelector('h3').textContent; // Use product name as ID
        const isLiked = button.classList.toggle('active'); // Toggle the 'active' class

        // Get the current liked products from localStorage
        let likedProducts = JSON.parse(localStorage.getItem('likedProducts')) || [];

        if (isLiked) {
            // Add the product to the liked list if it's not already there
            if (!likedProducts.includes(productId)) {
                likedProducts.push(productId);
            }
        } else {
            // Remove the product from the liked list
            likedProducts = likedProducts.filter(id => id !== productId);
        }

        // Save the updated liked products to localStorage
        localStorage.setItem('likedProducts', JSON.stringify(likedProducts));
    }

    // Function to initialize heart icons based on localStorage
    function initializeHeartIcons() {
        const likedProducts = JSON.parse(localStorage.getItem('likedProducts')) || [];
        document.querySelectorAll('.heart-icon').forEach(button => {
            const productId = button.closest('.card').querySelector('h3').textContent;
            if (likedProducts.includes(productId)) {
                button.classList.add('active'); // Set heart icon to red if product is liked
            }
        });
    }

    // Add event listeners to heart icons
    document.querySelectorAll('.heart-icon').forEach(button => {
        button.addEventListener('click', () => {
            toggleHeartIcon(button);
        });
    });

    // Initialize heart icons on page load
    initializeHeartIcons();
    });

    document.addEventListener('DOMContentLoaded', function () {
    // Initialize cart from localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let total = 0;

    // Function to update the cart total
    function updateCartTotal() {
        total = cart.reduce((sum, item) => sum + item.price, 0);
        console.log(`Cart Total: $${total.toLocaleString()}`);
        // You can display the total on the page if needed
    }

    // Function to add an item to the cart
    function addToCart(productName, price) {
        const existingItem = cart.find(item => item.name === productName);
        if (existingItem) {
            alert(`${productName} is already in your cart.`);
        } else {
            cart.push({ name: productName, price: price });
            localStorage.setItem('cart', JSON.stringify(cart));
            alert(`Added to cart: ${productName} - $${price.toLocaleString()}`);
            updateCartTotal();
        }
    }

    // Add event listeners to "Add to Cart" buttons
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function () {
            const productName = button.closest('.card').querySelector('h3').textContent;
            const price = parseFloat(button.getAttribute('data-price'));
            addToCart(productName, price);
        });
    });

    // Initialize cart total on page load
    updateCartTotal();
    });
    </script>
</head>
<body>
<header class="header">
        <!-- Left: Logo -->
        <div class="logo-container">
            <img src="images\logo13.jpg" alt="Company Logo" class="logo">
        </div>

        <!-- Center: Navigation Links -->
        <nav class="nav-links">
            <a href="index.php">Home</a> |
            <a href="#">Shop</a> |
            <a href="#">Services</a> 
            <!-- <a href="#">About Us</a> |
            <a href="#">Promotions</a> -->
        </nav>

        <!-- Right: User Options & Icons -->
        <div class="user-actions">
            <a href="#">Login</a> |
            <a href="#">Logout</a> |
            <a href="#">My Account</a>
            <a href="likedproducts.php">
            <button class="icon-btn">
                <i class="fas fa-heart"></i>
            </button>
            </a>
            <a href="shopcart.php">
                <button class="icon-btn">
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </a>
        </div>
        </header>

    <!-- Sidebar with Navbar Items and Dropdowns -->
    <aside class="sidebar">


        <!-- Truck Filter Dropdown -->
        <div class="filter-section">
            <h3>Filter Products</h3>
            <select id="truck-filter">
                <option value="all">All Trucks</option>
                <option value="heavy-duty">Heavy Duty Trucks</option>
                <option value="medium-duty">Medium Duty Trucks</option>
                <option value="light-duty">Light Duty Trucks</option>
                <option value="electric">Electric Trucks</option>
                <option value="used">Used Trucks</option>
                <option value="all">Trucks</option>
                <option value="heavy-duty">Parts & Spares</option>
                <option value="medium-duty">Services</option>
                <option value="light-duty">Manufacture</option>
            </select>
        </div>
        <div class="filter-section">
            <h3>Availability</h3>
            <select id="truck-filter">
                
                <option value="all">Today</option>
                <option value="heavy-duty">Up to 7 days</option>
                <option value="medium-duty">Up to 14 days</option>
                <option value="light-duty">Up to 21 days</option>
            </select>
        </div>
        <div class="filter-section">
            <h3>type</h3>
            <select id="truck-filter">
                <option value="all">New</option>
                <option value="heavy-duty">Used</option>
                
            </select>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
    
        <div class="card-container">
            
            <div class="card" data-category="heavy-duty">
                
                <h3>Truck Model 1</h3>
                <img src="images\Products\1.png" alt="Truck 1">
                <p>Description of Truck Model 1.</p>
                <div class="price-container">
                    <button class="heart-icon" aria-label="Add to favorites">
                        <i class="fas fa-heart"></i> <!-- Font Awesome heart icon -->
                    </button>
                    <p class="price">$<span id="price1">0</span></p>
                    
                </div>
                
                <button class="add-to-cart" data-price="2000">Add to Cart</button>
                <button class="view-details">View Details</button>
            </div>
            <div class="card" data-category="medium-duty">
                
                <h3>Truck Model 2</h3>
                <img src="images\Products\4.png" alt="Truck 2">
                <p>Description of Truck Model 2.</p>
                <div class="price-container">
                    <button class="heart-icon" aria-label="Add to favorites">
                        <i class="fas fa-heart"></i> <!-- Font Awesome heart icon -->
                    </button>
                    <p class="price">$<span id="price1">0</span></p>
                    
                </div>
                <button class="add-to-cart" data-price="">Add to Cart</button>
                <button class="view-details">View Details</button>
            </div>
            <div class="card" data-category="light-duty">
                
                <h3>Truck Model 3</h3>
                <img src="images\Products\6.png" alt="Truck 3">
                <p>Description of Truck Model 3.</p>
                <div class="price-container">
                    <button class="heart-icon" aria-label="Add to favorites">
                        <i class="fas fa-heart"></i> <!-- Font Awesome heart icon -->
                    </button>
                    <p class="price">$<span id="price1">0</span></p>
                    
                </div>
                <button class="add-to-cart" data-price="">Add to Cart</button>
                <button class="view-details">View Details</button>
            </div>
            <div class="card" data-category="light-duty">
                
                <h3>Truck Model 4</h3>
                <img src="images\Products\7.png" alt="Truck 3">
                <p>Description of Truck Model 4.</p>
                <div class="price-container">
                    <button class="heart-icon" aria-label="Add to favorites">
                        <i class="fas fa-heart"></i> <!-- Font Awesome heart icon -->
                    </button>
                    <p class="price">$<span id="price1">0</span></p>
                    
                </div>
                <button class="add-to-cart" data-price="">Add to Cart</button>
                <button class="view-details">View Details</button>
            </div>
            <div class="card" data-category="medium-duty">
                
                <h3>Truck Model 5</h3>
                <img src="images\Products\8.png" alt="Truck 3">
                <p>Description of Truck Model 5.</p>
                <div class="price-container">
                    <button class="heart-icon" aria-label="Add to favorites">
                        <i class="fas fa-heart"></i> <!-- Font Awesome heart icon -->
                    </button>
                    <p class="price">$<span id="price1">0</span></p>
                    
                </div>
                <button class="add-to-cart" data-price="">Add to Cart</button>
                <button class="view-details">View Details</button>
            </div>
            <div class="card" data-category="heavy-duty">
                
                <h3>Truck Model 6</h3>
                <img src="images\Products\9.png" alt="Truck 3">
                <p>Description of Truck Model 6.</p>
                <div class="price-container">
                    <button class="heart-icon" aria-label="Add to favorites">
                        <i class="fas fa-heart"></i> <!-- Font Awesome heart icon -->
                    </button>
                    <p class="price">$<span id="price1">0</span></p>
                    
                </div>
                <!-- data-price="150000" -->
                <button class="add-to-cart" data-price="">Add to Cart</button>
                <button class="view-details">View Details</button>
            </div>
            <div class="card" data-category="light-duty">
                
                <h3>Truck Model 7</h3>
                <img src="images\Products\10.png" alt="Truck 3">
                <p>Description of Truck Model 7.</p>
                <div class="price-container">
                    <button class="heart-icon" aria-label="Add to favorites">
                        <i class="fas fa-heart"></i> <!-- Font Awesome heart icon -->
                    </button>
                    <p class="price">$<span id="price1">0</span></p>
                    
                </div>
                <button class="add-to-cart" data-price="">Add to Cart</button>
                <button class="view-details">View Details</button>
            </div>
            <div class="card" data-category="medium-duty">
                
                <h3>Truck Model 8</h3>
                <img src="images\Products\11.png" alt="Truck 3">
                <p>Description of Truck Model 8.</p>
                <div class="price-container">
                    <button class="heart-icon" aria-label="Add to favorites">
                        <i class="fas fa-heart"></i> <!-- Font Awesome heart icon -->
                    </button>
                    <p class="price">$<span id="price1">0</span></p>
                    
                </div>
                <button class="add-to-cart" data-price="">Add to Cart</button>
                <button class="view-details">View Details</button>
            </div>
            <div class="card" data-category="light-duty">
                
                <h3>Truck Model 9</h3>
                <img src="images\Products\17.png" alt="Truck 3">
                <p>Description of Truck Model 9.</p>
                <div class="price-container">
                    <button class="heart-icon" aria-label="Add to favorites">
                        <i class="fas fa-heart"></i> <!-- Font Awesome heart icon -->
                    </button>
                    <p class="price">$<span id="price1">0</span></p>
                    
                </div>
                <button class="add-to-cart" data-price="">Add to Cart</button>
                <button class="view-details">View Details</button>
            </div>
            <div class="card" data-category="heavy-duty">
                
                <h3>Truck Model 10</h3>
                <img src="images\Products\19.png" alt="Truck 3">
                <p>Description of Truck Model 10.</p>
                <div class="price-container">
                    <button class="heart-icon" aria-label="Add to favorites">
                        <i class="fas fa-heart"></i> <!-- Font Awesome heart icon -->
                    </button>
                    <p class="price">$<span id="price1">0</span></p>
                    
                </div>
                <button class="add-to-cart" data-price="">Add to Cart</button>
                <button class="view-details">View Details</button>
            </div>
            <div class="card" data-category="medium-duty">
                
                <h3>Truck Model 11</h3>
                <img src="images\Products\20.png" alt="Truck 3">
                <p>Description of Truck Model 11.</p>
                <div class="price-container">
                    <button class="heart-icon" aria-label="Add to favorites">
                        <i class="fas fa-heart"></i> <!-- Font Awesome heart icon -->
                    </button>
                    <p class="price">$<span id="price1">0</span></p>
                    
                </div>
                <button class="add-to-cart" data-price="">Add to Cart</button>
                <button class="view-details">View Details</button>
            </div>
            <br>
            
            <div class="card" data-category="heavy-duty">
                
                <h3>Spare Part</h3>
                <img src="images\E.jpg" alt="Truck 1">
                <p>Description of spare part.</p>
                <div class="price-container">
                    <button class="heart-icon" aria-label="Add to favorites">
                        <i class="fas fa-heart"></i> <!-- Font Awesome heart icon -->
                    </button>
                    <p class="price">$<span id="price1">0</span></p>
                    
                </div>
                <button class="add-to-cart" data-price="">Add to Cart</button>
                <button class="view-details">View Details</button>
            </div>
            <div class="card" data-category="medium-duty">
                
                <h3>Spare Part </h3>
                <img src="images\B.png" alt="Truck 1">
                <p>Description of spare part.</p>
                <div class="price-container">
                    <button class="heart-icon" aria-label="Add to favorites">
                        <i class="fas fa-heart"></i> <!-- Font Awesome heart icon -->
                    </button>
                    <p class="price">$<span id="price1">0</span></p>
                    
                </div>
                <button class="add-to-cart" data-price="">Add to Cart</button>
                <button class="view-details">View Details</button>
            </div>
            <div class="card" data-category="light-duty">
                
                <h3>Spare Part</h3>
                <img src="images\A.jpg" alt="Truck 1">
                <p>Description of spare part.</p>
                <div class="price-container">
                    <button class="heart-icon" aria-label="Add to favorites">
                        <i class="fas fa-heart"></i> <!-- Font Awesome heart icon -->
                    </button>
                    <p class="price">$<span id="price1">0</span></p>
                    
                </div>
                <button class="add-to-cart" data-price="">Add to Cart</button>
                <button class="view-details">View Details</button>
            </div>
            <!-- Add more cards with appropriate data-category attributes -->
        </div>
        <footer class="page-footer">
            <div class="footer-nav">
                <div class="container">
                    <div class="footer-nav__col footer-nav__col--info">
                        <div class="footer-nav__heading">Information</div>
                        <ul class="footer-nav__list">
                            <li class="footer-nav__item"><a href="#" class="footer-nav__link">Contact us</a></li>
                            <li class="footer-nav__item"><a href="#" class="footer-nav__link">Privacy</a></li>
                            <li class="footer-nav__item"><a href="#" class="footer-nav__link">Online Payment</a></li>
                            <li class="footer-nav__item"><a href="#" class="footer-nav__link">Privacy &amp; cookies</a></li>
                            <li class="footer-nav__item"><a href="#" class="footer-nav__link">FAQ’s</a></li>
                        </ul>
                    </div>
                    <div class="footer-nav__col footer-nav__col--account">
                        <div class="footer-nav__heading">Your account</div>
                        <ul class="footer-nav__list">
                            <li class="footer-nav__item"><a href="#" class="footer-nav__link">Shipping Returns</a></li>
                            <li class="footer-nav__item"><a href="#" class="footer-nav__link">Quality Assurance</a></li>
                            <li class="footer-nav__item"><a href="#" class="footer-nav__link">Track an order</a></li>
                            <li class="footer-nav__item"><a href="#" class="footer-nav__link">Industry New</a></li>
                        </ul>
                    </div>
                    <div class="footer-nav__col footer-nav__col--whybuy">
                        <div class="footer-nav__heading">Why buy from us</div>
                        <ul class="footer-nav__list">
                            <li class="footer-nav__item"><a href="#" class="footer-nav__link">Sign In</a></li>
                            <li class="footer-nav__item"><a href="#" class="footer-nav__link">Register</a></li>
                            <li class="footer-nav__item"><a href="#" class="footer-nav__link">View Cart</a></li>
                        </ul>
                    </div>
                    <div class="footer-nav__col footer-nav__col--contacts">
                        <div class="footer-nav__heading">Contact details</div>
                        <address class="address">
                            Head Office: AEM<br>
                            290 3rd Ave, Bredell AH, Kempton Park, 1459
                        </address>
                        <div class="phone">
                            Telephone:
                            <a class="phone__number" href="tel:0118920400">011 892 0400</a>
                        </div>
                        <div class="email">
                            Email:
                            <a href="mailto:support@clowdy.co.za" class="email__addr">support@clowdy.co.za</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="banners">
                <div class="container clearfix">
                    <div class="banner">
                        <img src="images/Full_LOGO.png" alt="Best Trucks Seller" />
                    </div>
                    <div class="banner_media">
                        <a href="https://www.instagram.com/waste_truck_repairs/" class="banner-social__link"><i class="icon-instagram"></i></a>
                        <a href="https://www.facebook.com/share/18c9Xcw52i/?mibextid=LQQJ4d" class="banner-social__link"><i class="icon-facebook"></i></a>
                    </div>
                </div>
            </div>

            <div class="page-footer__subline">
                <div class="container clearfix">
                    <div class="copyright">&copy; 2024 AEM&trade;</div>
                    <div class="developer">Powered By Clowdy</div>
                    <div class="designby">Design by Clowdy</div>
                </div>
            </div>
        </footer>
    </main>

    <script src="scripts/script.js"></script>
</body>
</html>