<?php
// Retrieve data from URL parameters
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Truck Model';
$image = isset($_GET['image']) ? htmlspecialchars($_GET['image']) : 'images/default.png';
$description = isset($_GET['description']) ? htmlspecialchars($_GET['description']) : 'No description available.';
$price = isset($_GET['price']) ? htmlspecialchars($_GET['price']) : '0';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
    <title><?php echo $name; ?> Details</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/truckstyle.css">
</head>
<body>
    <header class="header">
        <div class="logo-container">
            <img src="images/logo13.jpg" alt="Company Logo" class="logo">
        </div>
        <nav class="nav-links">
            <a href="index.php">Home</a> |
            <a href="shopTruck.php">Shop</a> |
            <a href="#">Services</a>
        </nav>
        <div class="user-actions">
            <a href="login.php">Login</a> |
            <a href="#">Logout</a> |
            <a href="#">My Account</a>
            <a href="likedproducts.php">
                <button class="icon-btn"><i class="fas fa-heart"></i></button>
            </a>
            <a href="shopcart.php">
                <button class="icon-btn"><i class="fas fa-shopping-cart"></i></button>
            </a>
        </div>
    </header>

    <main>
        <section class="details-section">
            <h1><?php echo $name; ?> Details</h1>
            <div class="details-content">
                <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
                <div class="details-text">
                    <h2><?php echo $name; ?></h2>
                    <p><?php echo $description; ?></p>
                    <ul>
                        <li><strong>Price:</strong> $<?php echo $price; ?></li>
                    </ul>
                    <a href="shopTruck.php" class="buy-now-btn">Buy Now</a>
                </div>
            </div>
        </section>
    </main>

    <footer class="page-footer">
        <div class="footer-container">
            <div class="footer-nav">
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
    </footer>
</body>
</html>