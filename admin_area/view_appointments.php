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
                <i class="fa fa-dashboard"></i> Dashboard / View Appointments
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-calendar fa-fw"></i> View Appointments
                </h3>
            </div>

            <div class="panel-body">
                <!-- Sorting Filter -->
                <div class="row">
                    <div class="col-md-6">
                        <form method="GET" action="index.php">
                            <input type="hidden" name="view_appointments" value="1">
                            <label for="sort">Sort by Name:</label>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Truck Type</th>
                                <th>Department</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Reason</th>
                                <th>Location</th>
                                <th>Picture</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        // Query to fetch data from appointments table
                        $get_appointments = "SELECT * FROM appointments ORDER BY name $sort_order";
                        $run_appointments = mysqli_query($con, $get_appointments);

                        if (!$run_appointments) {
                            die("SQL Error: " . mysqli_error($con));
                        }

                        $i = 0;
                        while ($row_appointments = mysqli_fetch_array($run_appointments)) {
                            $appointment_id = $row_appointments['id'];
                            $name = $row_appointments['name'];
                            $email = $row_appointments['email'];
                            $phone = $row_appointments['phone'];
                            $truck_type = $row_appointments['truck_type'];
                            $department = $row_appointments['department'];
                            $appointment_date = $row_appointments['appointment_date'];
                            $appointment_time = $row_appointments['appointment_time'];
                            $reason = $row_appointments['reason'];
                            $location = $row_appointments['location'];
                            $picture_url = $row_appointments['picture_url'];

                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $truck_type; ?></td>
                                <td><?php echo $department; ?></td>
                                <td><?php echo $appointment_date; ?></td>
                                <td><?php echo $appointment_time; ?></td>
                                <td><?php echo $reason; ?></td>
                                <td><?php echo $location; ?></td>
                                <td>
                                    <?php
                                    if ($picture_url) {
                                        echo "<a href='../$picture_url' target='_blank'>View Picture</a>";
                                    } else {
                                        echo "No Picture";
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
}
?>
