<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>

<!DOCTYPE html>
<html>
<head>
<title> Insert Trucks </title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'#product_desc,#product_features' });</script>
</head>
<body>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"> </i> Dashboard / Insert Trucks
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-truck fa-fw"></i> Insert Trucks
                </h3>
            </div>

            <div class="panel-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">

                    <!-- Product Title -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Title </label>
                        <div class="col-md-6">
                            <input type="text" name="product_title" class="form-control" required>
                        </div>
                    </div>

                    <!-- Product URL -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product URL </label>
                        <div class="col-md-6">
                            <input type="text" name="product_url" class="form-control" required>
                            <p style="font-size:15px; font-weight:bold;">Product Url Example:</p>
                        </div>
                    </div>

                    <!-- Manufacturer -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Select A Manufacturer </label>
                        <div class="col-md-6">
                            <select class="form-control" name="manufacturer">
                                <option> Select A Manufacturer </option>
                                <?php
                                $get_manufacturer = "select * from manufacturers";
                                $run_manufacturer = mysqli_query($con, $get_manufacturer);
                                while($row_manufacturer= mysqli_fetch_array($run_manufacturer)){
                                    $manufacturer_id = $row_manufacturer['manufacturer_id'];
                                    $manufacturer_title = $row_manufacturer['manufacturer_title'];
                                    echo "<option value='$manufacturer_id'>$manufacturer_title</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Product Category -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Category </label>
                        <div class="col-md-6">
                            <select name="product_cat" class="form-control">
                                <option> Select a Product Category </option>
                                <?php
                                $get_p_cats = "select * from product_categories";
                                $run_p_cats = mysqli_query($con,$get_p_cats);
                                while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
                                    $p_cat_id = $row_p_cats['p_cat_id'];
                                    $p_cat_title = $row_p_cats['p_cat_title'];
                                    echo "<option value='$p_cat_id'>$p_cat_title</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Category </label>
                        <div class="col-md-6">
                            <select name="cat" class="form-control">
                                <option> Select a Category </option>
                                <?php
                                $get_cat = "select * from categories ";
                                $run_cat = mysqli_query($con,$get_cat);
                                while ($row_cat=mysqli_fetch_array($run_cat)) {
                                    $cat_id = $row_cat['cat_id'];
                                    $cat_title = $row_cat['cat_title'];
                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Product Images -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Image 1 </label>
                        <div class="col-md-6">
                            <input type="file" name="product_img1" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Image 2 </label>
                        <div class="col-md-6">
                            <input type="file" name="product_img2" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Image 3 </label>
                        <div class="col-md-6">
                            <input type="file" name="product_img3" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Image 4 </label>
                        <div class="col-md-6">
                            <input type="file" name="product_img4" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Image 5 </label>
                        <div class="col-md-6">
                            <input type="file" name="product_img5" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Image 6 </label>
                        <div class="col-md-6">
                            <input type="file" name="product_img6" class="form-control" required>
                        </div>
                    </div>

                    <!-- Other Fields -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Features </label>
                        <div class="col-md-6">
                            <textarea name="product_features" class="form-control" rows="15" id="product_features"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Keywords </label>
                        <div class="col-md-6">
                            <input type="text" name="product_keywords" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Label </label>
                        <div class="col-md-6">
                            <input type="text" name="product_label" class="form-control" required>
                        </div>
                    </div>
                    <!-- Product Quantity -->
<div class="form-group">
    <label class="col-md-3 control-label"> Product Quantity </label>
    <div class="col-md-6">
        <input type="number" name="product_quantity" class="form-control" required>
    </div>
</div>

<!-- Category -->
<div class="form-group">
    <label class="col-md-3 control-label"> Category </label>
    <div class="col-md-6">
        <input type="text" name="category" class="form-control" required>
    </div>
</div>

<!-- Brand -->
<div class="form-group">
    <label class="col-md-3 control-label"> Brand </label>
    <div class="col-md-6">
        <input type="text" name="brand" class="form-control" required>
    </div>
</div>

<!-- New or Old -->
<div class="form-group">
    <label class="col-md-3 control-label"> New or Old </label>
    <div class="col-md-6">
        <select name="new_or_old" class="form-control" required>
            <option value="New">New</option>
            <option value="Old">Old</option>
        </select>
    </div>
</div>

<!-- Safety -->
<div class="form-group">
    <label class="col-md-3 control-label"> Safety </label>
    <div class="col-md-6">
        <textarea name="safety" class="form-control" rows="5"></textarea>
    </div>
</div>

<!-- Warranty -->
<div class="form-group">
    <label class="col-md-3 control-label"> Warranty </label>
    <div class="col-md-6">
        <input type="number" name="warranty" class="form-control" required>
    </div>
</div>

<!-- Liters -->
<div class="form-group">
    <label class="col-md-3 control-label"> Liters </label>
    <div class="col-md-6">
        <input type="text" name="liters" class="form-control">
    </div>
</div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Save" class="btn btn-primary form-control">
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
if(isset($_POST['submit'])){

    // Collect form data
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $manufacturer_id = $_POST['manufacturer'];
    $product_keywords = $_POST['product_keywords'];
    $product_label = $_POST['product_label'];
    $product_url = $_POST['product_url'];
    $product_features = $_POST['product_features'];

    // New fields
    $product_quantity = $_POST['product_quantity'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $new_or_old = $_POST['new_or_old'];
    $safety = $_POST['safety'];
    $warranty = $_POST['warranty'];
    $liters = $_POST['liters'];

    // Handle file uploads for the images
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    $product_img4 = $_FILES['product_img4']['name'];
    $product_img5 = $_FILES['product_img5']['name'];
    $product_img6 = $_FILES['product_img6']['name'];

    move_uploaded_file($_FILES['product_img1']['tmp_name'], "product_images/$product_img1");
    move_uploaded_file($_FILES['product_img2']['tmp_name'], "product_images/$product_img2");
    move_uploaded_file($_FILES['product_img3']['tmp_name'], "product_images/$product_img3");
    move_uploaded_file($_FILES['product_img4']['tmp_name'], "product_images/$product_img4");
    move_uploaded_file($_FILES['product_img5']['tmp_name'], "product_images/$product_img5");
    move_uploaded_file($_FILES['product_img6']['tmp_name'], "product_images/$product_img6");

    // Insert data into trucks table
    $insert_product = "INSERT INTO trucks (p_cat_id, cat_id, manufacturer_id, date, product_title, product_url, product_img1, product_img2, product_img3, product_img4, product_img5, product_img6, product_features, product_keywords, product_label, product_quantity, category, brand, new_or_old, safety, warranty, liters) 
    VALUES ('$product_cat', '$cat', '$manufacturer_id', NOW(), '$product_title', '$product_url', '$product_img1', '$product_img2', '$product_img3', '$product_img4', '$product_img5', '$product_img6', '$product_features', '$product_keywords', '$product_label', '$product_quantity', '$category', '$brand', '$new_or_old', '$safety', '$warranty', '$liters')";

    $run_product = mysqli_query($con, $insert_product);

    if($run_product){
        echo "<script>alert('Truck Product has been inserted successfully')</script>";
        echo "<script>window.open('index.php?view_trucks','_self')</script>";
    } else {
        echo "<script>alert('Failed to insert truck product')</script>";
    }
}

?>

<?php } ?>
