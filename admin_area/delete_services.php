<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['delete_service'])){

$delete_id = $_GET['delete_service'];

$delete_pro = "delete from services where service_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_pro);

if($run_delete){

echo "<script>alert('One Service Has been deleted')</script>";

echo "<script>window.open('index.php?view_services','_self')</script>";

}

}

?>

<?php } ?>