<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

<!DOCTYPE html>
<html>
<head>
    <title> Insert Service </title>
</head>
<body>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Service
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-cogs fa-fw"></i> Insert Service
                </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">

                    <!-- Service Title -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Service Title </label>
                        <div class="col-md-6">
                            <input type="text" name="service_title" class="form-control" required>
                        </div>
                    </div>

                    <!-- Service Image -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Service Image </label>
                        <div class="col-md-6">
                            <input type="file" name="service_image" class="form-control" required>
                        </div>
                    </div>

                    <!-- Service Button Text -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Service Button Text </label>
                        <div class="col-md-6">
                            <input type="text" name="service_button" class="form-control" required>
                        </div>
                    </div>

                    <!-- Service URL -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Service URL </label>
                        <div class="col-md-6">
                            <input type="url" name="service_url" class="form-control" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Insert Service" class="btn btn-primary form-control">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $service_title = $_POST['service_title'];
    $service_button = $_POST['service_button'];
    $service_url = $_POST['service_url'];

    // Handle image upload
    $service_image = $_FILES['service_image']['name'];
    $temp_image = $_FILES['service_image']['tmp_name'];
    move_uploaded_file($temp_image, "product_images/$service_image");

    $insert_service = "INSERT INTO services (service_title, service_image, service_button, service_url)
                       VALUES ('$service_title', '$service_image', '$service_button', '$service_url')";

    $run_service = mysqli_query($con, $insert_service);

    if ($run_service) {
        echo "<script>alert('Service has been inserted successfully!')</script>";
        echo "<script>window.open('index.php?view_services','_self')</script>";
    }
}
?>
<?php } ?>
