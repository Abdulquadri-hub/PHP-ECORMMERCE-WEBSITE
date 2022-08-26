<?php

if (count($errors) === 0) 
{
    unset($_POST['addBrand']);
    $_POST['slug'] = slug($_POST['slug']);
    $_POST['status'] = isset($_POST['status']) ? 1 : 0 ; 
    $_POST['user_id'] = $_SESSION['id'];
    $brandId = create($table, $_POST);
}