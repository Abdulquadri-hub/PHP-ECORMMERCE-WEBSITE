<?php
require_once(ROOT."/private/models/dbFunctions.php");
require_once(ROOT."/private/core/helper.php");
require_once(ROOT."/private/validation/productValidation.php");
require_once(ROOT.'/private/core/middleware.php');


$errors = [];
$table = "products";
$products = getProduct();
$categorys = getCategory();
$brands = getBrand();

if (isset($_POST['addProduct'])) 
{
    $errors = validateProduct($_POST);

    // add product action
    include_once(ROOT."/private/actions/addProduct.php");
}


// update
if (!empty($_GET['update'])) {
    $id = $_GET['update'];
    $product = selectOne($table, ['id'=>$id]);
    // show($product);
    $id = $product['id'];
    $name = $product['name'];
    $metaTitle = $product['meta_title'];
    $description = $product['description'];
    $metaDescription = $product['meta_description'];
    $metaKeyword = $product['meta_keyword'];
    $slug = $product['slug'];
    $image = $product['image'];
    $price = $product['price'];
    $categoryId = $product['category_id'];
    $brandId = $product['brand_id'];
}

if (isset($_POST['updateProduct'])) 
{
    $errors = validateproduct($_POST);

// update product actions
include_once(ROOT."/private/actions/updateProduct.php");

}


//delete()
if (isset($_POST['delete'])) {

    // delete product actions
    include_once(ROOT."/private/actions/deleteProduct.php");

}


if (isset($_GET['search'])) 
{
$search = $_GET['search'];
 $query = "select * from products where meta_keyword like ?";
$stmt = executeQuery($query, ['meta_keyword'=>"%$search%"]);
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
// show($records);
return $records;
}
