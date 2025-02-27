<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AEM</title>
    <link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .steps {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #2a7d2a;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .form-section {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-column {
            flex: 1;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        .upload-section {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .upload-icon {
            font-size: 40px;
        }

        .submit-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            background-color: #2a7d2a;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #225d22;
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
    <div class="container">
        <h2>Build Your Truck</h2>
        
        <div class="steps">
            <div class="step">
                <div class="step-icon">✔</div>
                <span>Choose Vehicle Type</span>
            </div>
            <div class="step">
                <div class="step-icon">✔</div>
                <span>Time Slot</span>
            </div>
            <div class="step">
                <div class="step-icon">✔</div>
                <span>Done</span>
            </div>
        </div>
        
        <form action="process-quote.php" method="post">
            <div class="form-section">
                <div class="form-column">
                    <div class="form-group">
                        <label for="truck-type">Truck Type</label>
                        <select id="truck-type" name="truck_type" required>
                            <option value="">Choose Here</option>
                            <option value="type1">Type 1</option>
                            <option value="type2">Type 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <select id="brand" name="brand" required>
                            <option value="">Choose Here</option>
                            <option value="brand1">Brand 1</option>
                            <option value="brand2">Brand 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="features">Features</label>
                        <select id="features" name="features" required>
                            <option value="">Choose Here</option>
                            <option value="feature1">Feature 1</option>
                            <option value="feature2">Feature 2</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-column">
                    <div class="form-group">
                        <label for="vehicle-size">Vehicle Size</label>
                        <select id="vehicle-size" name="vehicle_size" required>
                            <option value="">Choose Here</option>
                            <option value="size1">Size 1</option>
                            <option value="size2">Size 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="body-volume">Body Volume</label>
                        <select id="body-volume" name="body_volume" required>
                            <option value="">Choose Here</option>
                            <option value="volume1">Volume 1</option>
                            <option value="volume2">Volume 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="engine-power">Engine Power Specs</label>
                        <select id="engine-power" name="engine_power" required>
                            <option value="">Choose Here</option>
                            <option value="power1">Power 1</option>
                            <option value="power2">Power 2</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="upload-section" onclick="document.getElementById('file-input').click()">
                <div class="upload-icon">🖼️</div>
                <div class="upload-text">Upload Picture</div>
                <input type="file" id="file-input" accept="image/*" onchange="handleFileUpload(event)" style="display: none;">
            </div>

            <button type="submit" class="submit-btn">Submit Here</button>
        </form>
    </div>
</body>
</html>
