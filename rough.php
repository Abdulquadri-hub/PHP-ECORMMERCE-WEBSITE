<?php
require_once(ROOT."/private/models/dbFunctions.php");
require_once(ROOT."/private/core/helper.php");
require_once(ROOT."/private/validation/categoryValidation.php");

$errors = [];
$table = "category";
$id = "";
$name = "";
$metaTitle = "";
$description = "";
$metaDescription = "";
$metaKeyword = "";
$slug = "";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = validateCategory($_POST);

    
if (empty(is_dir("uploads"))) {
    mkdir('uploads');
}

    if (count($errors) === 0) {

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
    $categoryId = create($table, $_POST);

    }
}

// update category

if (isset($_GET['id'])) 
{
    $categoryId = $_GET['id']; 
    $category = selectOne($table,['id'=>$categoryId]);
    $id = $category['id'];
    $name = $category['name'];
    $metaTitle = $category['meta_title'];
    $description = $category['description'];
    $metaDescription = $category['meta_description'];
    $metaKeyword = $category['meta_keyword'];
    $slug = $category['slug'];
}



    if (isset($_POST['save'])) 
    {
        echo "yes";
        // $errors = validateCategory($_POST);

        // if (count($errors) === 0) {
        //     echo "yes";
        // }
    } -->
