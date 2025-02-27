<?php

$host = "ls-d452bc3b2fac1873a5428b4500f305c5409331ad.crs4yuum0kxf.us-east-1.rds.amazonaws.com";
$dbname = "ecom_store";
$username = "dbmasteruser";
$password = ")~*>:8pxt^cb+o6Ph(HmOXUM}gh=,d`.";
$db_port = 3306;

// Establishing the database connection
$db = mysqli_connect($host, $username, $password, $dbname, $db_port);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

/// IP address code starts /////
function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }
/// IP address code Ends /////

// items function Starts ///

function items(){

global $db;

$ip_add = getRealUserIp();

$get_items = "select * from cart where ip_add='$ip_add'";

$run_items = mysqli_query($db,$get_items);

$count_items = mysqli_num_rows($run_items);

echo $count_items;

}


// items function Ends ///

// total_price function Starts //

function total_price(){

global $db;

$ip_add = getRealUserIp();

$total = 0;

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($db,$select_cart);

while($record=mysqli_fetch_array($run_cart)){

$pro_id = $record['p_id'];

$pro_qty = $record['qty'];

$get_price = "select * from products where product_id='$pro_id'";

$run_price = mysqli_query($db,$get_price);

while($row_price=mysqli_fetch_array($run_price)){


$sub_total = $row_price['product_price']*$pro_qty;

$total += $sub_total;



}





}

echo "$" . $total;


}



// total_price function Ends //
function getPro2() {

  global $db;

  // Fetch the latest 10 products from the 'trucks' table
  $get_trucks = "SELECT * FROM trucks ORDER BY date DESC LIMIT 10";
  $run_trucks = mysqli_query($db, $get_trucks);

  // Loop through each truck
  while ($row_trucks = mysqli_fetch_array($run_trucks)) {

      // Assign variables to product details
      $product_id = $row_trucks['product_id'];
      $product_title = $row_trucks['product_title'];
      $product_url = $row_trucks['product_url'];
      $product_img1 = $row_trucks['product_img1'];
      $product_label = $row_trucks['product_label'];
      $manufacturer_id = $row_trucks['manufacturer_id'];
      $product_price = $row_trucks['product_quantity']; // Adjust as per the actual price column
      $product_psp_price = $row_trucks['warranty']; // This column might represent a price, adjust accordingly

      // Fetch the manufacturer details
      $get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_id='$manufacturer_id'";
      $run_manufacturer = mysqli_query($db, $get_manufacturer);
      $row_manufacturer = mysqli_fetch_array($run_manufacturer);
      $manufacturer_name = $row_manufacturer['manufacturer_title'];

      // Handle product label display if on sale or gift
      if ($product_label == "Sale" || $product_label == "Gift") {
          $product_price = "<del> R$" . $product_price . " </del>";
          $product_psp_price = "| R$" . $product_psp_price;
      } else {
          $product_psp_price = "";
          $product_price = "R$" . $product_price;
      }

      // Display product label if it exists
      if ($product_label != "") {
          $product_label_html = "
              <a class='label sale' href='#' style='color:black;'>
                  <div class='thelabel'>$product_label</div>
                  <div class='label-background'></div>
              </a>
          ";
      } else {
          $product_label_html = "";
      }

      // Echo the HTML to display the product details
      echo "
          <div class='col-md-4 col-sm-6 single'>
              <div class='product'>
                  <a href='$product_url'>
                      <img src='admin_area/product_images/$product_img1' class='img-responsive'>
                  </a>

                  <div class='text'>
                      <center>
                          <p class='btn btn-primary'>$manufacturer_name</p>
                      </center>
                      <hr>
                      <h3><a href='$product_url'>$product_title</a></h3>
                      <p class='buttons'>
                          <a href='$product_url' class='btn btn-default'>View details</a>
                          
                      </p>
                  </div>

                  $product_label_html
              </div>
          </div>
      ";
  }
}


function getPro(){

global $db;

$get_products = "select * from products order by 2 DESC LIMIT 10";

$run_products = mysqli_query($db,$get_products);

while($row_products=mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

echo "

<div class='col-md-4 col-sm-6 single' >

<div class='product' >

<a href='details.php?pro_id=$pro_id' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<h3><a href='details.php?pro_id=$pro_id' >$pro_title</a></h3>

<p class='price' >$ $pro_price</p>

<p class='buttons' >

<a href='details.php?pro_id=$pro_id' class='btn btn-default' >View details</a>

<a href='details.php?pro_id=$pro_id' class='btn btn-primary'>

<i class='fa fa-shopping-cart'></i> Add to cart

</a>


</p>

</div>


</div>

</div>

";




}


}


?>
