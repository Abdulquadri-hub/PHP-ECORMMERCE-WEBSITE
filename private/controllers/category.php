<?php
require_once(ROOT."/private/models/dbFunctions.php");
require_once(ROOT."/private/core/helper.php");
require_once(ROOT."/private/validation/categoryValidation.php");
require_once(ROOT.'/private/core/middleware.php');

$errors = [];
$table = "category";
$categorys = getCategory();

if (isset($_POST['addCategory'])) 
{
    $errors = validateCategory($_POST);

    // add category actions
    include_once(ROOT."/private/actions/addCategory.php");
}


// update
if (!empty($_GET['update'])) {
    $id = $_GET['update'];
    $category = selectOne($table, ['id'=>$id]);
    $id = $category['id'];
    $name = $category['name'];
    $metaTitle = $category['meta_title'];
    $description = $category['description'];
    $metaDescription = $category['meta_description'];
    $metaKeyword = $category['meta_keyword'];
    $slug = $category['slug'];
}

if (isset($_POST['updateCategory'])) 
{
    $errors = validateCategory($_POST);
    // update category actions
    include_once(ROOT."/private/actions/updateCategory.php");

}


//delete()
if (!empty($_POST['delete'])) {

    //delete category actions
    include_once(ROOT."/private/actions/deleteCategory.php");
}

