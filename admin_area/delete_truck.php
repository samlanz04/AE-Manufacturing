<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['delete_truck'])){

$delete_id = $_GET['delete_truck'];

$delete_pro = "delete from trucks where product_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_pro);

if($run_delete){

echo "<script>alert('One Truck Has been deleted')</script>";

echo "<script>window.open('index.php?view_truck','_self')</script>";

}

}

?>

<?php } ?>