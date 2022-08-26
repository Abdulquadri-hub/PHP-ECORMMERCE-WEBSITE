<?php
    if (empty(is_dir("uploads"))) {
        mkdir('uploads');
    }

if (count($errors) === 0) 
{
    unset($_POST['updateProduct']);
    $image = $_FILES['image'] ?? null;
    $imagePath = $product['image'];
    if ($image && $image['tmp_name']) 
    {
        if ($product['image']) {
            unlink($product['image']);
        }
        $imagePath = 'uploads/'.randomString(8).'/'.$image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);
    }
    $_POST['slug'] = slug($_POST['slug']);
    $_POST['status'] = isset($_POST['status']) ? 1 : 0 ; 
    $_POST['image'] = $imagePath;
    $id = $_POST['id'];
    unset($_POST['id']);
    $productId =  update($table, $id, $_POST);
}