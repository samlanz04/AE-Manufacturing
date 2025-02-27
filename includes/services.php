<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Grid</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Basic styling for the page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Header styling */
        header {
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .nav-links {
            font-size: 16px;
        }

        header .sorting-options {
            display: flex;
            align-items: center;
            margin-left: auto; /* Push to the right */
        }

        header .sorting-options select {
            padding: 5px;
            margin-right: 10px;
        }

        header .view-icons {
            display: flex;
            gap: 10px;
            cursor: pointer;
        }

        header .view-icons i {
            font-size: 18px;
        }

        /* Main content styling */
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
        }
        .service-card img {
    width: 100%;
    height: auto;
    border-bottom: 1px solid #eee;
    border-top-left-radius: 150px;  /* Top-left corner */
    border-top-right-radius: 150px; /* Top-right corner */
}

        .service-card {
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

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .service-card img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #eee;
        }

        .service-card h3 {
            margin: 10px 0;
            color: #333;
        }

        .service-card p {
            color: #777;
            padding: 0 10px 20px;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .service-card {
                width: 45%; /* Two cards per row */
            }
        }

        @media (max-width: 480px) {
            .service-card {
                width: 100%; /* One card per row */
            }
        }
        .service-card h3{
            color:#000080;
        }
    </style>
</head>
<body>
<!-- Start -->

<!-- End -->

    <!-- Header Section -->
    <header>
        <!-- Navigation Links -->
        <div class="nav-links">
            <a href="../index.php">Home</a> | <a href="#services">Services</a>
        </div>

        <!-- Sorting Options -->
        <div class="sorting-options">
            <select>
                <option value="relevance">Sort by Relevance</option>
                <option value="date">Sort by Date</option>
                <option value="popularity">Sort by Popularity</option>
            </select>

            <!-- View Mode Icons -->
            
        </div>
    </header>

    <!-- Service Grid Section -->
    <div class="container">
        <!-- Service Card 1 -->
        <div class="service-card">
        <img src="../images/Products/1.png" alt="Hose Flushing & Pressure Testing">
            <h3>Hose Flushing & Pressure Testing</h3>
        </div>

        <!-- Service Card 2 -->
        <div class="service-card">
            <img src="../images/Products/6.png" alt="Gearbox & Engine Repairs">
            <h3>Gearbox & Engine Repairs</h3>
        </div>

        <!-- Service Card 3 -->
        <div class="service-card">
        <img src="../images/Products/2.png" alt="Tailored Maintenance">
            <h3>Tailored Maintenance</h3>
        </div>

        <!-- Service Card 4 -->
        <div class="service-card">
        <img src="../images/Products/3.png" alt="Hydraulic Cylinder Repairs">
            <h3>Hydraulic Cylinder Repairs</h3>
        </div>

        <!-- Service Card 5 -->
        <div class="service-card">
        <img src="../images/Products/4.png" alt="Pumps & Motors">
            <h3>Pumps & Motors</h3>
        </div>

        <!-- Service Card 6 -->
        <div class="service-card">
        <img src="../images/Products/5.png" alt="Refurbishment">
            <h3>Refurbishment</h3>
        </div>
    </div>

</body>
</html>
