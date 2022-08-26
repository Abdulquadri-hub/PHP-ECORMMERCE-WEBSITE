<?php

$id = $_POST['delete'] ?? null;
if (!empty($id)) {
    $categoryId = delete($table, $id);
    redirect("admin/category/home");
    exit;
}else{
    redirect("admin/category/home");
    exit;
}