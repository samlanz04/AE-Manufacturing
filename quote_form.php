<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEM-Request a Quote</title>
    <link rel="shortcut icon" href="images/Favicon.ICO" type="image/x-icon">
    <style>
        /* General body styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
        }

        /* Title styles */
        .quote-title {
            text-align: center;
            color: #000080;
            margin-bottom: 20px;
        }

        /* Form container */
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        /* Label styling */
        .form-label {
            display: block;
            color: #000080;
            margin-bottom: 8px;
            font-weight: bold;
        }

        /* Input styling */
        .form-input,
        .form-textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 1em;
            color: #000080;
        }

        /* Textarea styling */
        .form-textarea {
            height: 100px;
            resize: vertical;
        }

        /* Button styling */
        .form-button,
        .exit-button {
            background-color: #000080;
            color: #ffffff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            width: 100%;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .form-button:hover,
        .exit-button:hover {
            background-color: #333399;
        }

        /* Exit button styling (optional if different from form button) */
        .exit-button {
            background-color: #800000; /* Dark red */
        }

        .exit-button:hover {
            background-color: #990000;
        }
        .quote-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #ffffff;
        font-size: 1em;
        color: #000080;
        margin-bottom: 15px;
        appearance: none; /* Remove default dropdown arrow in some browsers */
        -webkit-appearance: none; /* For Safari */
        -moz-appearance: none; /* For Firefox */
    }

    /* Custom dropdown arrow */
    .quote-input::-ms-expand {
        display: none; /* Remove default arrow in IE */
    }

    .quote-input-container {
        position: relative;
    }

    .quote-input-container::after {
        content: '▼'; /* Custom arrow */
        font-size: 1.5em;
        color: #000080;
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
    }

    /* Hover and focus styles for the dropdown */
    .quote-input:hover,
    .quote-input:focus {
        border-color: #000080;
        outline: none;
    }

    /* Option styles for dropdown */
    .quote-input option {
        padding: 10px;
        background-color: #ffffff;
        color: #000080;
    }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="quote-title">Request a Quote for a Truck</h1>
        <form action="submit_quote.php" method="POST">
            <label for="customer_name" class="form-label">Name:</label>
            <input type="text" name="customer_name" required class="form-input">

            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" required class="form-input">

            <label for="phone" class="form-label">Phone:</label>
            <input type="text" name="phone" class="form-input">

            <div class="quote-input-container">
    <select name="truck_model" required class="quote-input">
        <option value="Compactor body">Compactor body</option>
        <option value="Cherry pickers">Cherry pickers</option>
        <option value="Crane Truck">Crane Truck</option>
        <option value="Skip loader">Skip loader</option>
        <option value="Rollback">Rollback</option>
        <option value="Roll on / Hook lift Truck">Roll on / Hook lift Truck</option>
        <option value="Tipper truck">Tipper truck</option>
        <option value="Water tankers">Water tankers</option>
        <option value="Vacuum Tankers">Vacuum Tankers</option>
        <option value="Bin Washer Machine">Bin Washer Machine</option>
        <option value="Road Sweeper">Road Sweeper</option>
        <option value="Concrete Mixer">Concrete Mixer</option>
    </select>
</div>


            <label for="quantity" class="form-label">Quantity:</label>
            <input type="number" name="quantity" min="1" required class="form-input">

            <label for="comments" class="form-label">Additional Comments:</label>
            <textarea name="comments" class="form-textarea"></textarea>

            <button type="submit" class="form-button">Submit Quote Request</button>
        </form>
        <!-- Exit button -->
        <button onclick="window.location.href='index.php'" class="exit-button">Exit</button>
    </div>
</body>
</html>
