<?php
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
                <i class="fa fa-dashboard"></i> Dashboard / View Trucks
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Trucks
                </h3>
            </div>

            <div class="panel-body">
                <!-- Sorting Filter -->
                <div class="row">
                    <div class="col-md-6">
                        <form method="GET" action="index.php">
                            <input type="hidden" name="view_trucks" value="1">
                            <label for="sort">Sort by Title:</label>
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
                                <th>Truck ID</th>
                                <th>Truck Title</th>
                                <th>Truck Image</th>
                                <th>Truck Quantity</th>
                                <th>Truck Keywords</th>
                                <th>Truck Date</th>
                                <th>Delete</th>
                                <!-- <th>Edit</th> -->
                                <th>Preview</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $i = 0;
                        // Update the query to include sorting
                        $get_trucks = "SELECT * FROM trucks ORDER BY product_title $sort_order";
                        $run_trucks = mysqli_query($con, $get_trucks);

                        while ($row_truck = mysqli_fetch_array($run_trucks)) {
                            $truck_id = $row_truck['product_id'];
                            $truck_title = $row_truck['product_title'];
                            $truck_image = $row_truck['product_img1'];
                            $truck_quantity = $row_truck['product_quantity'];
                            $truck_keywords = $row_truck['product_keywords'];
                            $truck_date = $row_truck['date'];

                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $truck_title; ?></td>
                                <td><img src="product_images/<?php echo $truck_image; ?>" width="60" height="60"></td>
                                <td><?php echo $truck_quantity; ?></td>
                                <td><?php echo $truck_keywords; ?></td>
                                <td><?php echo $truck_date; ?></td>
                                <td>
                                    <a href="index.php?delete_truck=<?php echo $truck_id; ?>">
                                        <i class="fa fa-trash-o"> </i> Delete
                                    </a>
                                </td>
                                <!-- <td>
                                    <a href="index.php?edit_truck=<?php echo $truck_id; ?>">
                                        <i class="fa fa-pencil"> </i> Edit
                                    </a>
                                </td> -->
                                <td>
                                    <a href="truck_preview.php?truck_id=<?php echo $truck_id; ?>" class="btn btn-info btn-sm">Preview</a>
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

<?php } ?>
