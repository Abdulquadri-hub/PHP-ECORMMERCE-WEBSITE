<?php


if (!empty($id)) {
    $brandId = delete($table, $id);
    redirect("admin/brand/home");
    exit;
}else{
    redirect("admin/brand/home");
    exit;
}