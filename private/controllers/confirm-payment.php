<?php
require_once(ROOT."/private/models/dbFunctions.php");
require_once(ROOT."/private/core/helper.php");

if (!empty($_GET['orderId'])) {
    $orderId = $_GET['orderId'];
    $order = selectOne('orders',['id'=>$orderId]);
    $invoice_number = $order['invoice_number'];
    $amount_due = $order['amount_due'];
}else {
    die("Error getting order");
}

if (isset($_POST['pay'])) {
    unset($_POST['pay']);
    $_POST['order_id'] = $orderId;
    $paymentId = create('payment',$_POST);
    $query = "update orders set status = 'complete' where id = ?";
    $paymentId = executeQuery($query,['id'=>$orderId]);
    redirect("user/myOrder");
}
