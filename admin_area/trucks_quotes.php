<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    $sort_order = isset($_GET['sort']) && in_array($_GET['sort'], ['ASC', 'DESC']) ? $_GET['sort'] : 'ASC';
?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Quotes
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
                <div class="row">
                    <div class="col-md-6">
                        <form method="GET" action="index.php">
                            <input type="hidden" name="trucks_quotes" value="1">
                            <label for="sort">Sort by Product Title:</label>
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
                                <th>Reference Number</th>
                                <th>Product Title</th>
                                <th>Contact Name</th>
                                <th>Contact Email</th>
                                <th>Contact Phone</th>
                                <th>Additional Info</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Upload Quote</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $get_quotes = "SELECT * FROM quotes ORDER BY product_title $sort_order";
                        $run_quotes = mysqli_query($con, $get_quotes);

                        if (!$run_quotes) {
                            die("SQL Error: " . mysqli_error($con));
                        }

                      //  $i = 0;
                        while ($row_quotes = mysqli_fetch_array($run_quotes)) {
                            $quote_id = $row_quotes['quote_id']; // Ensure $quote_id is set
                            $reference_number = $row_quotes['reference_number'];
                            $product_title = $row_quotes['product_title'];
                            $contact_name = $row_quotes['contact_name'];
                            $contact_email = $row_quotes['contact_email'];
                            $contact_phone = $row_quotes['contact_phone'];
                            $additional_info = $row_quotes['additional_info'];
                            $created_at = $row_quotes['created_at'];
                            $status = $row_quotes['status'];
                            $pdf = $row_quotes['pdf'];

                            //$i++;
                        ?>
                            <tr>
                                <td><?php echo $reference_number; ?></td>
                                <td><?php echo $product_title; ?></td>
                                <td><?php echo $contact_name; ?></td>
                                <td><?php echo $contact_email; ?></td>
                                <td><?php echo $contact_phone; ?></td>
                                <td><?php echo $additional_info; ?></td>
                                <td><?php echo $created_at; ?></td>
                                <td>
                                    <?php if ($status == 0) { ?>
                                        <a href="index.php?trucks_quotes=<?php echo $quote_id; ?>&status=1">
                                            <button type="button" class="btn btn-success">Mark Completed</button>
                                        </a>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-success" disabled>Completed</button>
                                    <?php } ?>
                                </td>
                                <td>
                                    <form action="upload_pdf.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="quote_id" value="<?php echo $quote_id; ?>">
                                        <input type="file" name="pdf" accept=".pdf" required>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </form>
                                    <?php
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
    if (isset($_GET['trucks_quotes']) && isset($_GET['status'])) {
        $quote_id = intval($_GET['trucks_quotes']);
        $status = intval($_GET['status']);
        $trucks_quotes = "UPDATE quotes SET status = $status WHERE quote_id = $quote_id";
        $run_update = mysqli_query($con, $trucks_quotes);

        if ($run_update) {
            echo "<script>alert('Status updated successfully');</script>";
            echo "<script>window.open('index.php?trucks_quotes=1','_self');</script>";  // Corrected the redirect URL
        } else {
            echo "<script>alert('Error updating status: " . mysqli_error($con) . "');</script>";
        }
    }
}
?>
