<?php
require_once(ROOT."/private/models/dbFunctions.php");
require_once(ROOT."/private/core/helper.php");

function getPendingOrder(){
    global $conn;
    $query = "select o.*, c.firstname from orders as o join customers as c on o.user_id =c.id where status = ?";
    $query = executeQuery($query,['status'=>'pending']);
    $rows = $query->get_result();
    $count = $rows->num_rows;
    return $count;
}
$getPendingOrders = getPendingOrder();

