<?php
    if (count($errors) === 0) 
    {
        unset($_POST['updateBrand']);
        $_POST['slug'] = slug($_POST['slug']);
        $_POST['status'] = isset($_POST['status']) ? 1 : 0 ; 
        $id = $_POST['id'];
        unset($_POST['id']);
        $brandId =  update($table, $id, $_POST);
    }