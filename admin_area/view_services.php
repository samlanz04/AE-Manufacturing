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
                    <i class="fa fa-dashboard"></i> Dashboard / View Services
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-cogs fa-fw"></i> View Services
                    </h3>
                </div>

                <div class="panel-body">
                    <!-- Sorting Filter -->
                    <div class="row">
                        <div class="col-md-6">
                            <form method="GET" action="index.php">
                                <input type="hidden" name="view_services" value="1">
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
                                    <th>#</th>
                                    <th>Service Title</th>
                                    <th>Service Image</th>
                                    <th>Button Text</th>
                                    <th>Service URL</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                            $i = 0;
                            // Query to fetch and sort services
                            $get_services = "SELECT * FROM services ORDER BY service_title $sort_order";
                            $run_services = mysqli_query($con, $get_services);

                            while ($row_service = mysqli_fetch_array($run_services)) {
                                $service_id = $row_service['service_id'];
                                $service_title = $row_service['service_title'];
                                $service_image = $row_service['service_image'];
                                $service_button = $row_service['service_button'];
                                $service_url = $row_service['service_url'];

                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $service_title; ?></td>
                                    <td><img src="product_images/<?php echo $service_image; ?>" width="60" height="60"></td>
                                    <td><?php echo $service_button; ?></td>
                                    <td><a href="<?php echo $service_url; ?>" target="_blank"><?php echo $service_url; ?></a></td>
                                    <td>
                                        <a href="index.php?delete_service=<?php echo $service_id; ?>" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i> Delete
                                        </a>
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
