<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parts & Spares</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* style.css */
        /* Basic styling for header, sections, and cards */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            font-size: 20px;
        }

        .header-right select {
            padding: 5px;
        }

        main {
            padding: 20px;
        }

        section {
            margin-bottom: 40px;
        }

        .carousel {
            display: flex;
            overflow: hidden;
            gap: 10px;
        }

        .carousel .card {
            flex: 0 0 33%;
            text-align: center;
        }

        .carousel .card img {
            max-width: 100%;
            height: auto;
        }

        .carousel button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
        }

        .carousel button.prev {
            left: 10px;
        }

        .carousel button.next {
            right: 10px;
        }

        .carousel .card h3 {
            margin: 10px 0;
        }

        .carousel .rating {
            font-size: 16px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination button {
            margin: 0 5px;
            padding: 5px 10px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        .pagination button:hover {
            background-color: #555;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .carousel .card {
                flex: 0 0 50%;
            }
        }

        @media (max-width: 480px) {
            .carousel .card {
                flex: 0 0 100%;
            }
        }
        .card img {
    width: 100%;
    height: 200px; /* Fixed height for all images */
    object-fit: cover; /* Ensures images are cropped to maintain aspect ratio */
    border-bottom: 1px solid #eee;
    border-top-left-radius: 150px;  /* Top-left corner */
    border-top-right-radius: 150px; /* Top-right corner */
}
.card h3{
    color:#000080;
    font-weight: 600%;
}
.hose-fittings h2{
    color:#000080;
}
.compactor-bodies h2{
    color:#000080;
}
    </style>
</head>
<body>
    <header>
        <div class="header-left">Home | Parts & Spares</div>
        <div class="header-right">
            <select class="relevance-dropdown">
                <option value="high-to-low">Price: High to Low</option>
                <option value="low-to-high">Price: Low to High</option>
                <option value="top-rated">Top Rated</option>
                <option value="new-or-used">New or Used</option>
            </select>
        </div>
    </header>

    <main>
        <section class="compactor-bodies">
            <h2>Compactor Bodies</h2>
            <div class="carousel">
                <div class="card">
                <img src="../images/Products/15.png" alt="Heil 5000">
                    <h3>Heil 5000</h3>
                    <div class="rating">★★★★★</div>
                </div>
                <div class="card">
                <img src="../images/Products/16.png" alt="Cos.Eco">
                    <h3>Cos.Eco</h3>
                    <div class="rating">★★★★☆</div>
                </div>
                <div class="card">
                <img src="../images/Products/17.png" alt="Oracki">
                    <h3>Oracki</h3>
                    <div class="rating">★★★★☆</div>
                </div>
            </div>
            <div class="pagination">
                <button class="prev">&lt;</button>
                <button class="next">&gt;</button>
            </div>
        </section>

        <section class="hose-fittings">
            <h2>Hose Fittings & Adapters</h2>
            <div class="carousel">
                <div class="card">
                <img src="../images/Products/A.jpg" alt="Fire Truck Hose & Adapter">
                    <h3>Fire Truck Hose & Adapter</h3>
                </div>
                <div class="card">
                <img src="../images/Products/B.jpg" alt="Sewage Truck Hose">
                    <h3>Sewage Truck Hose</h3>
                </div>
                <div class="card">
                <img src="../images/Products/C.jpg" alt="Crane Hydraulic Hoses & Fittings">
                    <h3>Crane Hydraulic Hoses, Fittings & Adapters</h3>
                </div>
            </div>
            <div class="pagination">
                <button class="prev">&lt;</button>
                <button class="next">&gt;</button>
            </div>
        </section>
    </main>

    <script src="script.js">
        // script.js
        const carousels = document.querySelectorAll('.carousel');

        carousels.forEach(carousel => {
            const cards = carousel.querySelectorAll('.card');
            const prevButton = carousel.querySelector('.prev');
            const nextButton = carousel.querySelector('.next');
            let currentIndex = 0;

            prevButton.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + cards.length) % cards.length;
                updateCarousel(carousel, cards, currentIndex);
            });

            nextButton.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % cards.length;
                updateCarousel(carousel, cards, currentIndex);
            });

            function updateCarousel(carousel, cards, index) {
                const offset = index * -100 / cards.length;
                carousel.style.transform = `translateX(${offset}%)`;
            }
        });

        // Add event listener to relevance dropdown (optional)
        const relevanceDropdown = document.querySelector('.relevance-dropdown');
        relevanceDropdown.addEventListener('change', () => {
            // Implement filtering and sorting logic here based on the selected value
        });
    </script>
</body>
</html>
