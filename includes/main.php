<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEM</title>
    <style>
        /* Basic styles for the header and layout */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .page-header {
            background-color: #f8f8f8;
            padding: 20px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .logo {
            float: left;
        }

        .header-controls-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-left: 20%;
        }

        .header-controls {
            display: flex;
            align-items: center;
            margin-right: auto;
            margin-left: -80px;
        }

        .search-input {
            padding: 10px;
            margin: 0 10px;
            border: 3px solid #000080;
            border-radius: 4px;
            font-size: 18px;
            width: 550px;
            box-sizing: border-box;
            margin-top: 25px;
            z-index: 1;
            position: relative;
        }

        .search-button {
            padding: 10px 15px;
            border: 3px solid #000080;
            background-color: #f1f1f1;
            cursor: pointer;
            margin-top: 25px;
        }

        /* Hamburger menu styles */
        .hamburger-menu {
            position: relative;
            margin-top: 10px;
            background-color: #ddd9d9;
            max-width: 22%;
            margin-left: -10%;
            margin-bottom: -100px;
        }

        .hamburger {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            margin-top: -655x;
            z-index: 1;
            color: #000080;
        }
        .shop-by-department {
          font-weight: bold;
          margin-left: 2px; /* Space between hamburger and text */
            cursor: pointer;
            color: #000080;
        }
        .hamburger-menu__list {
            display: block; /* Change this from 'none' to 'block' */
            position: absolute;
             top: 100%;
             left: 0; /* Aligns the menu list to the left side */
            background-color: white;
             box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
             list-style-type: none;
             padding: 0;
                margin: 0;
    z-index: 1000;
    width: 250px; /* Adjust width as needed */
}

.hamburger-menu__item {
    padding: 10px 15px;
    background: white;
    /* Remove the margin-left: -1150px; */
}

        .hamburger-menu__item a {
            text-decoration: none;
            color: black;
        }

        .hamburger-menu__item:hover {
            background-color: #f0f0f0;
        }
        
        .logo__img {
            width: 50%;
            height: 50%;
            max-width: 237px;
            margin-top: -35px;
            margin-left: -45%;
        }

        /* Styles for the dropdown */
        .dropdownA {
            padding: 10px;
            margin-right: 10px;
            border: 3px solid #000080;
            border-radius: 4px;
            font-size: 18px;
            box-sizing: border-box;
            margin-top: 25px;
            margin-right: -13px
        }

        /* Styling login and cart sections */
        .login, .basket {
            display: flex;
            align-items: center;
            margin-left: 10px;
            margin-top: 20px;
        }

        .login__item, .basket a {
            margin-left: 10px;
        }
/* CSS Styling */
.login-dropdown {
    position: relative;
    display: inline-block;
    margin-top: 25px;
}

.login-toggle {
    background: none;
    border: 1px solid #ccc;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 18px;
    margin-left: 10px;
    border-radius: 4px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.arrow {
    transition: transform 0.3s ease;
}

.login-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.login-content .login__item {
    padding: 12px 16px;
    text-align: left;
}

.login-content .login__item a {
    color: black;
    text-decoration: none;
}

.login-content .login__item:hover {
    background-color: #f1f1f1;
}

/* Rotate arrow when active */
.login-toggle.active .arrow {
    transform: rotate(180deg);
}
.expand-arrow {
    margin-left: 10px;
    cursor: pointer;
    float: right;
}

.submenu {
    display: none;
    position: absolute;
    left: 100%; /* Display submenu to the right */
    top: 0;
    background-color: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    list-style-type: none;
    padding: 0;
    margin: 0;
    width: 200px; /* Adjust width as needed */
}

.submenu li {
    padding: 10px;
}

.submenu li a {
    text-decoration: none;
    color: black;
}

.submenu li:hover {
    background-color: #f0f0f0;
}
.currency__change {
        float: right; 
        margin-right: 20px; 
        text-align: right;
    }
    </style>
</head>

<body>
    <header class="page-header">
            <div class="container clearfix">
                <div class="currency">
                    <a class="currency__change" href="customer/my_account.php?my_orders">
                        <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo "Welcome :Guest";
                        } else {
                            echo "Welcome : " . $_SESSION['customer_email'] . "";
                        }
                        ?>
                    </a>
                </div>
        </div>

        <div class="page-header__bottomline">
            <div class="container clearfix">
                <div class="logo-container">
                    <div class="logo">
                        <a class="logo__link" href="index.php">
                            <img class="logo__img" src="images/image.jpeg" alt="AEM logotype" width="245" height="20">
                        </a>
                    </div>
                </div>

                <div class="header-controls-wrapper">
                    <div class="header-controls">
                    <select class="dropdownA">
                    <option value="All">All</option>
                    <option value="Trucks">Trucks</option>
                    <option value="Spares">Spares</option>
                    <option value="Services">Services</option>
                    <option value="Manufacturer">Manufacturer</option>
                    </select>

                        <input type="text" placeholder="What are you looking for?" class="search-input">
                        <button class="search-button">Search</button>
                    </div>

                    <!-- Move login and cart to the right of the search bar -->
                   <!-- HTML Structure -->
<!-- HTML Structure -->
<div class="login-dropdown">
    <button class="login-toggle" id="login-toggle">
        Login <span class="arrow">&#9660;</span>
    </button>
    <div class="login-content" id="login-content">
        <li class="login__item">
            <?php
            if (!isset($_SESSION['customer_email'])) {
                echo '<a href="customer_register.php" class="login__link">Register</a>';
            } else {
                echo '<a href="my_account.php?my_orders" class="login__link">My Account</a>';
            }
            ?>
        </li>
        <li class="login__item">
            <?php
            if (!isset($_SESSION['customer_email'])) {
                echo '<a href="checkout.php" class="login__link">Sign In</a>';
            } else {
                echo '<a href="../logout.php" class="login__link">Log out</a>';
            }
            ?>
        </li>
    </div>
</div>
                    <div class="basket">
                        <a href="cart.php" class="btn btn--basket">
                            <i class="icon-basket"></i>
                            <?php items(); ?> items
                        </a>
                    </div>
                </div>
                <br>
                <!-- Hamburger Menu -->
                <div class="hamburger-menu">
                    <button class="hamburger" id="hamburger-btn">
                        &#9776;
                    </button>
                    <span class="shop-by-department">Shop by Department</span>
                    <ul class="hamburger-menu__list" id="hamburger-menu">
                    <li class="hamburger-menu__item">
        <a class="categories__link categories__link--active" href="shop.php">Trucks</a>
        <span class="expand-arrow">&#9654;</span>
        <ul class="submenu">
        <li><a href="product-view.php">All Trucks</a></li>
        <li><a href="compactor.php">Compactor bodies</a></li>
        <li><a href="compactor.php">Cherry pickers</a></li>
        <li><a href="compactor.php">Crane Truck</a></li>
        <li><a href="compactor.php">Skip loader</a></li>
        <li><a href="compactor.php">Rollback</a></li>
        <li><a href="compactor.php">Roll on truck</a></li>
        <li><a href="compactor.php">Tipper truck</a></li>
        <li><a href="compactor.php">Water tankers</a></li>
        </ul>
    </li>

    <li class="hamburger-menu__item">
        <a href="#item2">Parts & Spares</a>
        <span class="expand-arrow">&#9654;</span>
        <ul class="submenu">
        <li><a href="compactor.php">Compactor bodies</a></li>
        <li><a href="compactorbodies.php">Hose fittings & Adapters</a></li>
        <li><a href="compactor.php">Hydraulic Cylinders</a></li>
        <li><a href="compactorbodies.php">Valve Banks</a></li>
        <li><a href="compactor.php">Steel Tubing</a></li>
        <li><a href="compactorbodies.php">PTO gears & Piston Pipes</a></li>
        <li><a href="compactor.php">Hydraulic hoses/pumps</a></li>
        <li><a href="shop.php">Buy Parts</a></li>
        </ul>
    </li>

    <li class="hamburger-menu__item">
        <a href="#item2">Services</a>
        <span class="expand-arrow">&#9654;</span>
        <ul class="submenu">
           <li><a href="request-quote.php">Build Your Truck</a></li>
            <li><a href="services.php">Types of services</a></li>
            <li><a href="appoitment_details.php">Services Booking</a></li>
            <li><a href="#">Hose Flushing and Pressure Testing</a></li>
            <li><a href="#">Hydraulic Cylinder Repairs</a></li>
            <li><a href="#">Pumps and Motors</a></li>
            <li><a href="#">Resealing Cartridge Valves</a></li>
            <li><a href="#">Brake Reconditioning</a></li>
            <li><a href="#">Gearbox and Engine Repairs</a></li>
            <li><a href="#">Tailored Maintenance</a></li>
            <li><a href="#">On-Site Repairs</a></li>
            <li><a href="#">Refurbishment</a></li>
        </ul>
    </li>
    <li class="hamburger-menu__item">
        <a href="#item3">Manufacturers</a>
        <span class="expand-arrow">&#9654;</span>
        <ul class="submenu">
        <li><a href="request-quote.php">Hydraulic Cylinders</a></li>
        <li><a href="request-quote.php">Pins and bushes</a></li>
        <li><a href="request-quote.php">Boiling</a></li>
        <li><a href="request-quote.php">Brickmaking</a></li>
        <li><a href="request-quote.php">Machines</a></li>
        </ul>
    </li>
    <!-- <li class="hamburger-menu__item">
        <a href="#item4">Shop Industry</a>
        <span class="expand-arrow">&#9654;</span>
        <ul class="submenu">
            <li><a href="#">Parts Subcategory 1</a></li>
            <li><a href="#">Parts Subcategory 2</a></li>
        </ul>
    </li> -->
    <!-- <li class="hamburger-menu__item">
        <a href="#item5">Waste & Water</a>
        <span class="expand-arrow">&#9654;</span>
        <ul class="submenu">
            <li><a href="#">Parts Subcategory 1</a></li>
            <li><a href="#">Parts Subcategory 2</a></li>
        </ul>
    </li> -->
    <!-- <li class="hamburger-menu__item">
        <a href="#item6">Mining</a>
        <span class="expand-arrow">&#9654;</span>
        <ul class="submenu">
            <li><a href="#">Parts Subcategory 1</a></li>
            <li><a href="#">Parts Subcategory 2</a></li>
        </ul>
    </li> -->
    <li class="hamburger-menu__item">
        <a href="#item7">Agriculture</a>
        <span class="expand-arrow">&#9654;</span>
        <ul class="submenu">
            <li><a href="#">Parts Subcategory 1</a></li>
            <li><a href="#">Parts Subcategory 2</a></li>
        </ul>
    </li>
    <li class="hamburger-menu__item">
        <a href="#item8">Local Stores</a>
        <span class="expand-arrow">&#9654;</span>
        <ul class="submenu">
            <li><a href="localstore.php">JHB</a></li>
            <li><a href="localstore.php">CPT</a></li>
        </ul>
    </li>
    <li class="hamburger-menu__item">
        <a href="#item9">Transportation</a>
        <span class="expand-arrow">&#9654;</span>
        <ul class="submenu">
            <li><a href="#">Parts Subcategory 1</a></li>
            <li><a href="#">Parts Subcategory 3</a></li>
        </ul>
    </li>
    <!-- Repeat similar structure for other items with subcategories -->
</ul>

                </div>
            </div>
        </div>
    </header>

    <script>
        document.getElementById('hamburger-btn').addEventListener('click', function() {
            var menu = document.getElementById('hamburger-menu');
            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        });
    </script>
    <!-- JavaScript -->
<script>
    document.getElementById('login-toggle').addEventListener('click', function(event) {
        event.preventDefault();
        const loginContent = document.getElementById('login-content');
        const loginToggle = document.getElementById('login-toggle');
        
        // Toggle visibility of dropdown content
        loginContent.style.display = loginContent.style.display === 'block' ? 'none' : 'block';
        
        // Toggle arrow direction
        loginToggle.classList.toggle('active');
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuItems = document.querySelectorAll('.hamburger-menu__item');
        
        menuItems.forEach(item => {
            const submenu = item.querySelector('.submenu');
            const expandArrow = item.querySelector('.expand-arrow');
            
            item.addEventListener('click', function(event) {
                // Close all submenus
                document.querySelectorAll('.submenu').forEach(sub => {
                    if (sub !== submenu) {
                        sub.style.display = 'none';
                    }
                });

                // Toggle the current submenu
                if (submenu.style.display === 'block') {
                    submenu.style.display = 'none';
                } else {
                    submenu.style.display = 'block';
                }
            });
        });
    });
    document.querySelector('.dropdownA').addEventListener('change', function() {
    var selectedValue = this.value.toLowerCase();
    
    // Show All categories (Trucks and Spares)
    if (selectedValue === 'all') {
        document.querySelectorAll('.row, .category-heading').forEach(function(element) {
            element.style.display = 'block';
        });
    }
    // Show only the selected category (Trucks or Spares)
    else {
        document.querySelectorAll('.row, .category-heading').forEach(function(element) {
            if (element.dataset.filter === selectedValue) {
                element.style.display = 'block'; // Show selected category and heading
            } else {
                element.style.display = 'none'; // Hide other categories and headings
            }
        });
    }
});

</script>

</body>
</html>
