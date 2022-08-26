<?php
    if (empty(is_dir("uploads"))) {
        mkdir('uploads');
    }
if (count($errors) === 0) 
{
    unset($_POST['addProduct']);
    $image = $_FILES['image'] ?? null;
    $imagePath = '';
    if ($image && $image['tmp_name']) 
    {
        $imagePath = 'uploads/'.randomString(8).'/'.$image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);
    }
    $_POST['slug'] = slug($_POST['slug']);
    $_POST['status'] = isset($_POST['status']) ? 1 : 0 ; 
    $_POST['image'] = $imagePath;
    $categoryId = $_POST['category_id'];
    $brandId = $_POST['brand_id'];
    $_POST['user_id'] = $_SESSION['id'];
    $productId = create($table, $_POST);
}