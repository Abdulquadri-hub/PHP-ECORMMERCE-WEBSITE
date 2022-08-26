<?php
require_once(ROOT."/private/models/dbFunctions.php");
require_once(ROOT."/private/core/helper.php");

if (isset($_GET['userId'])) {
$userId = $_GET['userId'];
}

// $table = "cart";

    $ip = getIPAddress(); 
    $totalPrice = 0;
    $invoiceNumber = mt_rand();
    $status = "pending";
    $query = "select c.*, p.price, p.id from cart as c join products as p on c.product_slug = p.slug where ip_address = '$ip'";
    $result = mysqli_query($conn,$query);
    $countProduct = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $productId = $row['id'];
        $productPrice = array($row['price']);
        $ProductValues = array_sum($productPrice);
        $totalPrice += $ProductValues;
    }

    $query = "select * from cart";
    $result = mysqli_query($conn,$query);
    $getQuantity = mysqli_fetch_array($result);
    $quantity = $getQuantity['quantity'];
    if ($quantity == 0) {
        $quantity = 1;
        $subTotal = $totalPrice;
    }else {
        $quantity = $quantity;
        $subTotal = $totalPrice * $quantity;
    }
// insert into orders
$query = "insert into orders set user_id = ?, amount_due = ?, invoice_number = ?, total_products = ?, status = ?";
$orderId = executeQuery($query,['user_id'=>$userId,'amount_due'=>$subTotal,'invoice_number '=>$invoiceNumber,'total_products'=>$countProduct, 'status'=>$status]);
if ($orderId) 
{
// insert into pending orders
$query = "insert into pending_orders set user_id = ?, invoice_number = ?, product_id = ?,quantity = ?, status = ?";
$orderId = executeQuery($query,['user_id'=>$userId,'invoice_number'=>$invoiceNumber,'product_id'=>$productId, 'quantity'=>$quantity, 'status'=>$status]);
// delete cart instantly
$query = "delete from cart where ip_address = ?";
$deleteCart = executeQuery($query,['ip_address'=>$ip]);
    redirect("user/dashboard");
}else {
    die("error inserting user");
}

