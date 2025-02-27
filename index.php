<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <title>AEM</title>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Sponsor data - images are loaded from the assets folder
    const sponsors = [
        { name: "Sponsor 1", image: "images/Volvo.png" },
        { name: "Sponsor 2", image: "images/MAN.png" },
        { name: "Sponsor 3", image: "images/isuzu.png" },
        { name: "Sponsor 4", image: "images/Hino.png" },
        { name: "Sponsor 5", image: "images/Heil.png" },
        { name: "Sponsor 6", image: "images/Fuso.png" },
        { name: "Sponsor 7", image: "images/mercedes.png" }
        // { name: "Sponsor 8", image: "assets/sponsor8.png" }
    ];

    // DOM elements
    const container = document.getElementById('sponsorsContainer');
    const indicatorsContainer = document.getElementById('indicators');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const carousel = document.querySelector('.sponsors-carousel');

    // Configuration
    let currentIndex = 0;
    let itemsPerView = getItemsPerView();
    let totalSlides = Math.ceil(sponsors.length / itemsPerView);
    let autoplayInterval;

    // Initialize carousel
    function initCarousel() {
        // Add sponsor items
        sponsors.forEach((sponsor, index) => {
            const sponsorItem = document.createElement('div');
            sponsorItem.className = 'sponsor-item';
            sponsorItem.innerHTML = `
                <img src="${sponsor.image}" alt="${sponsor.name}" class="sponsor-image">
            `;
            container.appendChild(sponsorItem);
        });

        // Create indicators
        updateIndicators();

        // Set initial position
        updateCarousel();

        // Start autoplay
        startAutoplay();
    }

    // Get items per view based on screen size
    function getItemsPerView() {
        if (window.innerWidth < 576) return 1;
        if (window.innerWidth < 768) return 2;
        if (window.innerWidth < 992) return 3;
        return 4;
    }

    // Update indicators based on current view
    function updateIndicators() {
        indicatorsContainer.innerHTML = '';
        itemsPerView = getItemsPerView();
        totalSlides = Math.ceil(sponsors.length / itemsPerView);

        for (let i = 0; i < totalSlides; i++) {
            const indicator = document.createElement('div');
            indicator.className = `indicator ${i === currentIndex ? 'active' : ''}`;
            indicator.addEventListener('click', () => {
                currentIndex = i;
                updateCarousel();
                resetAutoplay();
            });
            indicatorsContainer.appendChild(indicator);
        }
    }

    // Update carousel position and indicators
    function updateCarousel() {
        // Update slide position
        const translateValue = -currentIndex * (100 / itemsPerView) * itemsPerView;
        container.style.transform = `translateX(${translateValue}%)`;

        // Update indicators
        const indicators = document.querySelectorAll('.indicator');
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === currentIndex);
        });
    }

    // Go to previous slide
    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateCarousel();
        resetAutoplay();
    }

    // Go to next slide
    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel();
        resetAutoplay();
    }

    // Start autoplay
    function startAutoplay() {
        autoplayInterval = setInterval(nextSlide, 3000); // 3-second interval
    }

    // Reset autoplay timer
    function resetAutoplay() {
        clearInterval(autoplayInterval);
        startAutoplay();
    }

    // Pause autoplay on hover
    carousel.addEventListener('mouseenter', () => {
        clearInterval(autoplayInterval);
    });

    // Resume autoplay on mouse leave
    carousel.addEventListener('mouseleave', () => {
        startAutoplay();
    });

    // Event listeners
    prevBtn.addEventListener('click', prevSlide);
    nextBtn.addEventListener('click', nextSlide);

    window.addEventListener('resize', () => {
        const newItemsPerView = getItemsPerView();
        if (newItemsPerView !== itemsPerView) {
            // If view size changed, adjust current index and update
            const currentPosition = currentIndex * itemsPerView;
            itemsPerView = newItemsPerView;
            currentIndex = Math.floor(currentPosition / itemsPerView);
            updateIndicators();
            updateCarousel();
        }
    });

    // Initialize the carousel
    initCarousel();
        });

        document.addEventListener("DOMContentLoaded", function () {
            const hero = document.querySelector('.hero');
            const images = [
                'https://aem-images.s3.eu-central-1.amazonaws.com/Products/1.0.jpg',
                'https://aem-images.s3.eu-central-1.amazonaws.com/Products/2.1.jpg'
            ];
            let currentImageIndex = 0;

            function changeBackground() {
                const imageUrl = images[currentImageIndex];
                hero.style.backgroundImage = `url(${imageUrl})`;
                console.log(`Background image set to: ${imageUrl}`); // Debugging line
                currentImageIndex = (currentImageIndex + 1) % images.length;
            }

            function previousImage() {
                currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
                changeBackground();
            }

            function nextImage() {
                currentImageIndex = (currentImageIndex + 1) % images.length;
                changeBackground();
            }

            setInterval(changeBackground, 5000); // Change every 5 seconds
            changeBackground(); // Set the initial background image

            // Attach event listeners to buttons
            document.querySelector('.slider-btn.left').addEventListener('click', previousImage);
            document.querySelector('.slider-btn.right').addEventListener('click', nextImage);
        });

        function slide(sliderId, direction) {
            const slider = document.getElementById(sliderId);
            const scrollAmount = slider.offsetWidth * direction;
            slider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        }

        
        document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.querySelector('.navbar-toggle');
        const navbarNav = document.querySelector('.navbar-nav');

        toggleButton.addEventListener('click', function () {
            navbarNav.classList.toggle('active');
            toggleButton.classList.toggle('active');
            });
        });

        const images = ["images/2.jpg", "images/1.jpg", "images/banner.jpg"];
        let currentIndex = 0;

        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            document.getElementById("image").src = images[currentIndex];
        }

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
    <main>
       
        <header class="header">
        <!-- Left: Logo -->
        <div class="logo-container">
            <img src="images\logo13.jpg" alt="Company Logo" class="logo">
        </div>

        <!-- Center: Navigation Links -->
        <nav class="nav-links">
            <a href="index.php">Home</a> |
            <a href="shopTruck.php">Shop</a> |
            <a href="#">Services</a> |
            <!-- <a href="about.php">About Us</a> | -->
            <!-- <a href="#">Promotions</a> -->
        </nav>

        <!-- Right: User Options & Icons -->
        <div class="user-actions">
            <a href="login.php">Login</a> |
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

        <!-- Search Bar -->
        <div class="search-bar">
            <div class="dropdown">
                <button class="dropbtn">All <i class="fas fa-caret-down"></i></button>
            </div>
            <input type="text" placeholder="What are you looking for?">
            <!-- <span class="instant-search">instant search</span> -->
            <button class="search-btn"><i class="fas fa-search"></i></button>
        </div>
        

        <div class="container">
    <div class="sidebar">
        <div class="shop-title">Shop</div>
        <nav>
            <a href="shopTruck.php" class="nav-item">
                <div class="nav-content">
                    <!-- Truck icon -->
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M1 3h15v13H1zM16 8h4l3 3v5h-7V8z"/>
                        <circle cx="5.5" cy="18.5" r="2.5"/>
                        <circle cx="19.5" cy="18.5" r="2.5"/>
                    </svg>
                    <span>Trucks</span>
                </div>
                <svg class="arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 18l6-6-6-6"/>
                </svg>
            </a>
            
            <a href="shopTruck.php" class="nav-item">
                <div class="nav-content">
                    <!-- Parts icon -->
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 20h16a2 2 0 0 0 2-2V8l-7-7H6a2 2 0 0 0-2 2v17"/>
                        <path d="M12 3v7h7"/>
                        <circle cx="9" cy="13" r="2"/>
                        <circle cx="15" cy="13" r="2"/>
                    </svg>
                    <span>Part & Spares</span>
                </div>
                <svg class="arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 18l6-6-6-6"/>
                </svg>
            </a>
            
            <a href="shopTruck.php" class="nav-item">
                <div class="nav-content">
                    <!-- Service icon -->
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"/>
                        <line x1="16" y1="8" x2="2" y2="22"/>
                        <line x1="17.5" y1="15" x2="9" y2="15"/>
                    </svg>
                    <span>Services</span>
                </div>
                <svg class="arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 18l6-6-6-6"/>
                </svg>
            </a>
            
            <a href="shopTruck.php" class="nav-item">
                <div class="nav-content">
                    <!-- Factory icon -->
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M2 20h20"/>
                        <path d="M12 20v-8l-6 4v4"/>
                        <path d="M6 12V8l-4 2v10"/>
                        <path d="M18 20v-4l-6-4"/>
                        <path d="M22 20V8l-4 2"/>
                    </svg>
                    <span>Manufacture</span>
                </div>
                <svg class="arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 18l6-6-6-6"/>
                </svg>
            </a>
        </nav>
    </div>
    
    
    <!-- Your page content goes here -->
    <div class="main-content">
        <div class="image-container">
        <img id="image" src="images/2.jpg" alt="Image">
        <button class="next-btn" src="arrow.svg"  onclick="nextImage()"><</button>
        </div>
        <div class="caption">
            <h4>Your manufacturing and engineering needs in one place</h4>
        </div>
        <section class="services">
            <div class="service-item">
                <h2>Trucks</h2>
                <img src="images\Products\19.png" alt="item">
                <a href="shopTruck.php"><button>Buy or Order now</button></a>
            </div>
            <div class="service-item">
                <h2>Parts+ Spares</h2>
                <img src="images\Products\A.jpg" alt="item">
                <a href="shopTruck.php"><button>Buy or Order now</button></a>
            </div>
            <div class="service-item">
                <h2>Services</h2>
                <img src="images\Products\15.png" alt="item">
                <a href="shopTruck.php"><button>Buy or Order now</button></a>
            </div>
            <div class="service-item">
                <h2>Manufacture</h2>
                <img src="images\D.jpg" alt="item">
                <a href="shopTruck.php"><button>Buy or Order now</button></a>
            </div>
        </section>
        
        </div>
            <div class="ads-container">
            <div class="ad-item">
                <img src="images/Products/15.png" alt="Ad 1">
                <p class="caption">Heavy-Duty Mining Truck</p>
            </div>
            <div class="ad-item">
                <img src="images/Products/6.6.png" alt="Ad 2">
                <p class="caption">Eco-Friendly Hauler</p>
            </div>
        </div>
    </div>


        
        <!-- <section id="two" class="wrapper style3 fade-up">
            <div class="inner">
                <h2>What we do</h2>
                <p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
                <div class="features">
                    <section>
                        <span class="icon solid major fa-code"></span>
                        <h3>Trucks</h3>
                        <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                    </section>
                    <section>
                        <span class="icon solid major fa-lock"></span>
                        <h3>Book online repairs</h3>
                        <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                    </section>
                    <section>
                        <span class="icon solid major fa-cog"></span>
                        <h3>Parts & Spares</h3>
                        <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                    </section>
                    <section>
                        <span class="icon solid major fa-desktop"></span>
                        <h3>Partners</h3>
                        <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                    </section>
                    
                </div>
                <ul class="actions">
                    <li><a href="index.php" class="button">Learn more</a></li>
                </ul>
            </div>
        </section> -->
        

       




            <!-- <div class="hero-text">Africa Engineering and Manufacturing</div> -->
            <!-- <button class="slider-btn left">&#10094;</button>
            <button class="slider-btn right">&#10095;</button> -->
            <!-- <a href="#" class="btn1"></a> -->
            <!-- <div class="buy-sell-container"> -->
                <!-- <div class="buy-sell-item"> -->
                    <!-- <img src="https://aem-images.s3.eu-central-1.amazonaws.com/Products/1.0.jpg" alt="Buy Now Image"> -->
                    <!-- <span class="buy-sell-text"><a href="book_repair.php">Book online repairs</a></span> -->
                <!-- </div> -->
                <!-- <div class="buy-sell-item"> -->
                    <!-- <img src="https://aem-images.s3.eu-central-1.amazonaws.com/Products/2.0.jpg" alt="Sell Now Image"> -->
                    <!-- <span class="buy-sell-text"><a href="shop.php">Buy Parts & Spares</a></span> -->
                <!-- </div>
            </div>
        </div> -->




        <!-- Main Content Section -->
        <!-- <div id="content" class="container"> -->
            <!-- Trucks Section -->
            <!-- <div class="category-heading" data-filter="trucks">
                <h1>Trucks</h1>
            </div>
            <div class="row spares" data-filter="spares">
                <?php  ?>   getPro2();
            </div> -->

            <!-- Parts & Spares Section -->
            <!-- <div class="category-heading" data-filter="spares">
                <h1>Parts & Spares</h1>
            </div>
            <div class="row trucks" data-filter="trucks">
                <?php  ?>  getPro();
            </div> -->

            <!-- Services Section -->
            <!-- <div class="category-heading" data-filter="services">
                <h1>Services</h1>
            </div>
            <div class="row trucks" data-filter="services">
                <?php  ?> getPro3();
            </div> -->

            <!-- Manufacturers Section -->
            <!-- <div class="category-heading" data-filter="manufacturers">
                <h1>Manufacturers</h1>
            </div>
            <div class="row trucks" data-filter="manufacturers">
                <?php  ?> getManufacturers();
            </div> -->

            <!-- Related Services Section -->
            <!-- <div class="row">
                <div class="wrapper">
                    <h1>Related Services</h1>
                </div>
                <div class="slider-container">
                    <button class="slider-btn prev" onclick="slide('related-services', -1)">&#10094;</button>
                    <div id="related-services" class="slider">
                        <div class="col-md-3"><img src="https://testclowdy.s3.us-east-1.amazonaws.com/A.jpg" alt="Image 1" class="img-fluid"></div>
                        <div class="col-md-3"><img src="https://testclowdy.s3.us-east-1.amazonaws.com/C.jpg" alt="Image 2" class="img-fluid"></div>
                        <div class="col-md-3"><img src="https://testclowdy.s3.us-east-1.amazonaws.com/D.jpg" alt="Image 3" class="img-fluid"></div>
                        <div class="col-md-3"><img src="https://testclowdy.s3.us-east-1.amazonaws.com/E.jpg" alt="Image 4" class="img-fluid"></div>
                    </div>
                    <button class="slider-btn next" onclick="slide('related-services', 1)">&#10095;</button>
                </div>
            </div> -->

            <!-- Featured Brands Section -->
            <!-- <div class="row">
                <div class="wrapper">
                    <h1>Featured Brands</h1>
                </div>
                <div class="slider-container">
                    <button class="slider-btn prev" onclick="slide('featured-brands', -1)">&#10094;</button>
                    <div id="featured-brands" class="slider">
                        <div class="col-md-3"><img src="https://testclowdy.s3.us-east-1.amazonaws.com/Fuso.png" alt="Image 1" class="img-fluid"></div>
                        <div class="col-md-3"><img src="https://testclowdy.s3.us-east-1.amazonaws.com/MAN.png" alt="Image 2" class="img-fluid"></div>
                        <div class="col-md-3"><img src="https://testclowdy.s3.us-east-1.amazonaws.com/Heil.png" alt="Image 3" class="img-fluid"></div>
                        <div class="col-md-3"><img src="https://testclowdy.s3.us-east-1.amazonaws.com/Hino.png" alt="Image 4" class="img-fluid"></div>
                        <div class="col-md-3"><img src="https://testclowdy.s3.us-east-1.amazonaws.com/isuzu.png" alt="Image 5" class="img-fluid"></div>
                    </div>
                    <button class="slider-btn next" onclick="slide('featured-brands', 1)">&#10095;</button>
                </div>
            </div>
            <br><br>
        </div> -->

        <section class="sponsors-section">
        <h2 class="sponsors-title">Featured Brands</h2>
        
        <div class="sponsors-carousel">
            <div class="sponsors-container" id="sponsorsContainer">
                <!-- Sponsor items will be added dynamically -->
            </div>
            
            <div class="carousel-nav">
                <button class="carousel-btn" id="prevBtn">&#10094;</button>
                <button class="carousel-btn" id="nextBtn">&#10095;</button>
            </div>
            
            <div class="carousel-indicators" id="indicators">
                <!-- Indicators will be added dynamically -->
            </div>
        </div>
        </section>

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
</body>
</html>