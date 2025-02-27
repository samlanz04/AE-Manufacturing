<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEM-Services</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
    <style>
        /* Basic styling for the page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Header styling */
        .header {
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navigation-links {
            font-size: 16px;
            margin-left: 20%; 
            font-weight: bold;
        }

        .sorting-controls {
            display: flex;
            align-items: center;
            margin-left: auto; /* Push to the right */
        }

        .sorting-controls select {
            padding: 5px;
            margin-right: 10px;
        }

        .view-mode-icons {
            display: flex;
            gap: 10px;
            cursor: pointer;
        }

        .view-mode-icons i {
            font-size: 18px;
        }

        /* Main content styling */
        .service-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
            margin-left: 20%; 
        }

        .service-item img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #eee;
            border-top-left-radius: 90px;  /* Top-left corner */
            border-top-right-radius: 90px; /* Top-right corner */
        }

        .service-item {
            width: 30%; /* Three cards per row */
            margin-bottom: 20px;
            background-color: whitesmoke;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .service-item img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #eee;
        }

        .service-item-title {
            margin: 10px 0;
            color: #000080;
        }

        .service-item-description {
            color: #777;
            padding: 0 10px 20px;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .service-item {
                width: 45%; /* Two cards per row */
            }
        }

        @media (max-width: 480px) {
            .service-item {
                width: 100%; /* One card per row */
            }
        }
        .header {
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navigation-links {
            font-size: 16px;
            margin-left: 20%; 
            font-weight: bold;
        }
        .sorting-controls {
            display: flex;
            align-items: center;
            margin-left: auto; /* Push to the right */
        }

        .sorting-controls select {
            padding: 5px;
            margin-right: 10px;
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

<!-- Header Section -->
<header class="header">
    <!-- Navigation Links -->
    <div class="navigation-links">
        <a href="index.php">Home</a> | <a href="#services">Services</a>
    </div>

    <!-- Sorting Options -->
    <div class="sorting-controls">
        <select>
            <option value="relevance">Sort by Relevance</option>
            <option value="date">Sort by Date</option>
            <option value="popularity">Sort by Popularity</option>
        </select>
    </div>
</header>

<!-- Service Grid Section -->
<div class="service-container">
    <!-- Service Item 1 -->
    <div class="service-item">
        <img src="images/Products/1.png" alt="Hose Flushing & Pressure Testing">
        <h3 class="service-item-title">Hose Flushing & Pressure Testing</h3>
    </div>

    <!-- Service Item 2 -->
    <div class="service-item">
        <img src="images/Products/6.png" alt="Gearbox & Engine Repairs">
        <h3 class="service-item-title">Gearbox & Engine Repairs</h3>
    </div>

    <!-- Service Item 3 -->
    <div class="service-item">
        <img src="images/Products/2.png" alt="Tailored Maintenance">
        <h3 class="service-item-title">Tailored Maintenance</h3>
    </div>

    <!-- Service Item 4 -->
    <div class="service-item">
        <img src="images/Products/3.png" alt="Hydraulic Cylinder Repairs">
        <h3 class="service-item-title">Hydraulic Cylinder Repairs</h3>
    </div>

    <!-- Service Item 5 -->
    <div class="service-item">
        <img src="images/Products/4.png" alt="Pumps & Motors">
        <h3 class="service-item-title">Pumps & Motors</h3>
    </div>

    <!-- Service Item 6 -->
    <div class="service-item">
        <img src="images/Products/5.png" alt="Refurbishment">
        <h3 class="service-item-title">Refurbishment</h3>
    </div>
</div>


<!-- Footer -->
<footer class="page-footer">
            <!-- Footer content here -->
            <footer class="page-footer">
                <div class="footer-nav">
                    <div class="container clearfix">
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
                                <a class="phone__number" href="tel:0123456789">011 892 0400</a>
                            </div>
                            <div class="email">
                                Email:
                                <a href="mailto:support@yourwebsite.com" class="email__addr">support@clowdy.co.za</a>
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
                            <a href=" https://www.facebook.com/share/18c9Xcw52i/?mibextid=LQQJ4d" class="banner-social__link"><i class="icon-facebook"></i></a>
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
        </footer>
</body>
</html>
