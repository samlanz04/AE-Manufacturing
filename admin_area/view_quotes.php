<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    // Validate and set sort order
    $sort_order = isset($_GET['sort']) && in_array($_GET['sort'], ['ASC', 'DESC']) ? $_GET['sort'] : 'ASC';
?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Truck Quotes
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Quotes
                </h3>
            </div>

            <div class="panel-body">
                <!-- Sorting Filter -->
                <div class="row">
                    <div class="col-md-6">
                        <form method="GET" action="index.php">
                            <input type="hidden" name="view_quotes" value="1">
                            <label for="sort">Sort by Truck Model:</label>
                            <select name="sort" id="sort" class="form-control" onchange="this.form.submit()">
                                <option value="ASC" <?php if ($sort_order == 'ASC') echo 'selected'; ?>>A-Z</option>
                                <option value="DESC" <?php if ($sort_order == 'DESC') echo 'selected'; ?>>Z-A</option>
                            </select>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Truck Model</th>
                                <th>Quantity</th>
                                <th>Comments</th>
                                <th>Request Date</th>
                                <th>Status</th>
                                <th>Upload Quote</th> <!-- New column for PDF upload -->
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        // Run the query with error handling
                        $get_quotes = "SELECT * FROM truck_quotes ORDER BY truck_model $sort_order";
                        $run_quotes = mysqli_query($con, $get_quotes);

                        if (!$run_quotes) {
                            die("SQL Error: " . mysqli_error($con));
                        }

                        $i = 0;
                        while ($row_quotes = mysqli_fetch_array($run_quotes)) {
                            $quote_id = $row_quotes['id'];
                            $customer_name = $row_quotes['customer_name'];
                            $email = $row_quotes['email'];
                            $phone = $row_quotes['phone'];
                            $truck_model = $row_quotes['truck_model'];
                            $quantity = $row_quotes['quantity'];
                            $comments = $row_quotes['comments'];
                            $request_date = $row_quotes['request_date'];
                            $status = $row_quotes['status']; // Fetch the status field
                            $pdf = $row_quotes['pdf']; // Assuming there's a column 'pdf' for the file path

                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $customer_name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $truck_model; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td><?php echo $comments; ?></td>
                                <td><?php echo $request_date; ?></td>
                                <td>
                                    <!-- Status buttons (Pending and Completed) -->
                                    <?php if ($status == 0) { ?>
                                        <a href="index.php?update_status=<?php echo $quote_id; ?>&status=1">
                                            <button type="button" class="btn btn-success">Completed</button>
                                        </a>
                                        <button type="button" class="btn btn-warning" disabled>Pending</button>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-success" disabled>Completed</button>
                                        <button type="button" class="btn btn-warning" disabled>Pending</button>
                                    <?php } ?>
                                </td>
                                <td>
                                    <!-- Upload PDF form -->
                                    <form action="upload_pdf.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="quote_id" value="<?php echo $quote_id; ?>">
                                        <input type="file" name="pdf" accept=".pdf" required>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </form>
                                    <?php
                                    // Display the uploaded PDF link if it exists
                                    if ($pdf) {
                                        echo "<a href='$pdf' target='_blank'>View PDF</a>";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    // Handle status update
    if (isset($_GET['update_status']) && isset($_GET['status'])) {
        $quote_id = intval($_GET['update_status']); // Secure input
        $status = intval($_GET['status']);
        $update_status = "UPDATE truck_quotes SET status = $status WHERE id = $quote_id";
        $run_update = mysqli_query($con, $update_status);
      
        if ($run_update) {
            echo "<script>alert('Status updated successfully');</script>";
            echo "<script>window.open('index.php?view_truck_quotes=1','_self');</script>";
        } else {
            echo "<script>alert('Error updating status: " . mysqli_error($con) . "');</script>";
        }
    }
    
}
?>

