<?php


$id = $_POST['delete'] ?? null;
if (!empty($id)) {
    $productId = delete($table, $id);
    redirect("admin/product/home");
    exit;
}else{
    redirect("admin/product/home");
    exit;
}