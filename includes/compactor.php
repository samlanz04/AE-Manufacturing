<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compactor Bodies</title>
    <style>
        .compactor-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .compactor-item {
            border: 1px solid whitesmoke;
            padding: 20px;
            text-align: left;
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
    border-top-left-radius: 120px;  
    border-top-right-radius: 120px; 
}

    </style>
</head>
<body>
    
    <div class="compactor">
    <h1>Compactor Bodies</h1>
    </div>

    <div class="compactor-container">
        <div class="compactor-item">
        <img src="../images/Products/15.png" alt="Compactor 1" class="compactor-image">
            <div class="compactor-details">
                Heil 5000<br>
                Waste & Transport<br>
                <span class="compactor-price">R15 000</span>
            </div>
        </div>

        <div class="compactor-item">
        <img src="../images/Products/1.png" alt="Compactor 2" class="compactor-image">
            <div class="compactor-details">
                Cos.Eco<br>
                Waste & Transport<br>
                <span class="compactor-price">R15 000</span>
            </div>
        </div>

        <div class="compactor-item">
        <img src="../images/Products/6.png" alt="Compactor 3" class="compactor-image">
            <div class="compactor-details">
                Oracki<br>
                Waste & Transport<br>
                <span class="compactor-price">R15 000</span>
            </div>
        </div>

        <div class="compactor-item">
        <img src="../images/Products/7.png" alt="Compactor 4" class="compactor-image">
            <div class="compactor-details">
                Heil<br>
                Waste & Transport<br>
                <span class="compactor-price">R15 000</span>
            </div>
        </div>

        <div class="compactor-item">
        <img src="../images/Products/8.png"alt="Compactor 5" class="compactor-image">
            <div class="compactor-details">
                HC250<br>
                Waste & Transport<br>
                <span class="compactor-price">R25 000</span>
            </div>
        </div>

        <div class="compactor-item">
        <img src="../images/Products/9.png" alt="Compactor 6" class="compactor-image">
            <div class="compactor-details">
                M2 McCneillus<br>
                Waste & Transport<br>
                <span class="compactor-price">R25 000</span>
            </div>
        </div>

        <div class="compactor-item">
        <img src="../images/Products/10.png" alt="Compactor 7" class="compactor-image">
            <div class="compactor-details">
                Metro McCneillus<br>
                Waste & Transport<br>
                <span class="compactor-price">R25 000</span>
            </div>
        </div>

        <div class="compactor-item">
        <img src="../images/Products/11.png" alt="Compactor 8" class="compactor-image">
            <div class="compactor-details">
                Metro McCneillus<br>
                Waste & Transport<br>
                <span class="compactor-price">R25 000</span>
            </div>
        </div>
    </div>

    <div class="pagination">
        <a href="#">Pages Continues</a>
        <a href="#">↓</a>
    </div>
</body>
</html>