<?php
require_once(ROOT."/private/models/dbFunctions.php");
require_once(ROOT."/private/core/helper.php");
require_once(ROOT."/private/validation/brandValidation.php");
require_once(ROOT.'/private/core/middleware.php');

$errors = [];
$table = "brand";
$brands = getBrand();

if (isset($_POST['addBrand'])) 
{
    $errors = validateBrand($_POST);

    include_once(ROOT."/private/actions/addBrand.php");
}


// update
if (!empty($_GET['update'])) {
    $id = $_GET['update'];
    $brand = selectOne($table, ['id'=>$id]);
    $id = $brand['id'];
    $name = $brand['name'];
    $metaTitle = $brand['meta_title'];
    $description = $brand['description'];
    $metaDescription = $brand['meta_description'];
    $metaKeyword = $brand['meta_keyword'];
    $slug = $brand['slug'];
}

if (isset($_POST['updateBrand'])) 
{
    $errors = validateBrand($_POST);
    
    include_once(ROOT."/private/actions/updateBrand.php");

}


//delete()
if (isset($_POST['delete'])) {

    $id = $_POST['delete'] ?? null;

    include_once(ROOT."/private/actions/deleteBrand.php");
}

