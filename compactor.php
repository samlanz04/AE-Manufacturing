<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM-Compactor Bodies</title>
    <link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
    <style>
        .compactor-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-left: 20%;   
        }

        .compactor-item {
            border: 1px solid whitesmoke;
            padding: 20px;
            text-align: left;
        }
        .pagination{
            margin-left: 20% !important;
        }
        .compactor-image {
            max-width: 100%;
            height: auto;
        }

        .compactor-details {
            font-size: 14px;
            margin-top: 10px;
        }

        .compactor-price {
            font-weight: bold;
            font-size: 30px;
        }
        .compactor h1{
            color:#000080;
            margin-left: 20%;
        }
        .compactor-details{
            color:#000080; 
            font-weight: bold;
            font-size: 16px;
        }
        
        .compactor-container img {
    width: 100%;
    height: 200px;
    object-fit: cover; 
    border-bottom: 1px solid #fff;
    border-top-left-radius: 90px;  
    border-top-right-radius: 90px; 
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

// include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php"); 
?>
<header class="header">
    <!-- Navigation Links -->
    <div class="navigation-links">
        <a href="index.php">Home</a> | <a href="#services">Parts & Spares</a>
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
    <div class="compactor">
    <h1>Compactor Bodies</h1>
    </div>

    <div class="compactor-container">
        <div class="compactor-item">
        <a href="quote_form.php">
        <img src="images/Products/15.png" alt="Compactor 1" class="compactor-image">
            <div class="compactor-details">
                Heil 5000<br>
                Waste & Transport<br>
                
            </div>
        </a>
        </div>

        <div class="compactor-item">
        <a href="quote_form.php">
        <img src="images/Products/1.png" alt="Compactor 2" class="compactor-image">
            <div class="compactor-details">
                Cos.Eco<br>
                Waste & Transport<br>
                
            </div>
        </a>
        </div>
 
        <div class="compactor-item">
        <a href="quote_form.php">
        <img src="images/Products/6.png" alt="Compactor 3" class="compactor-image">
            <div class="compactor-details">
                Oracki<br>
                Waste & Transport<br>
               
            </div>
        </a>
        </div>

        <div class="compactor-item">
        <a href="quote_form.php">
        <img src="images/Products/7.png" alt="Compactor 4" class="compactor-image">
            <div class="compactor-details">
                Heil<br>
                Waste & Transport<br>
               
            </div>
        </a>
        </div>

        <div class="compactor-item">
        <a href="quote_form.php">
        <img src="images/Products/8.png"alt="Compactor 5" class="compactor-image">
            <div class="compactor-details">
                HC250<br>
                Waste & Transport<br>
                
            </div>
        </a>
        </div>

        <div class="compactor-item">
        <a href="quote_form.php">
        <img src="images/Products/9.png" alt="Compactor 6" class="compactor-image">
            <div class="compactor-details">
                M2 McCneillus<br>
                Waste & Transport<br>
                
            </div>
        </a>
        </div>

        <div class="compactor-item">
        <a href="quote_form.php">
        <img src="images/Products/10.png" alt="Compactor 7" class="compactor-image">
            <div class="compactor-details">
                Metro McCneillus<br>
                Waste & Transport<br>
                
            </div>
        </a>
        </div>

        <div class="compactor-item">
        <a href="quote_form.php">
        <img src="images/Products/11.png" alt="Compactor 8" class="compactor-image">
            <div class="compactor-details">
                Metro McCneillus<br>
                Waste & Transport<br>
                
            </div>
        </a>
        </div>
    </div>

    <div class="pagination">
        <a href="#">Pages Continues</a>
        <a href="#">↓</a>
    </div>
</body>
</html>