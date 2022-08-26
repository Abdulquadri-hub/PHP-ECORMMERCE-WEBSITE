<?php
require_once(ROOT."/private/models/dbFunctions.php");
require_once(ROOT."/private/core/helper.php");
require_once(ROOT."/private/validation/userValidation.php");
require_once(ROOT."/private/models/session.php");
require_once(ROOT.'/private/core/middleware.php');

$errors = [];
$table = "customers";
$customers = getCustomer();
$accounts = selectOne('customers',['id'=>$_SESSION['id']]);
if (isset($_POST['signup'])) 
{

    $errors = validateUser($_POST);

    // Register user actions
    include_once(ROOT."/private/actions/registerUser.php");
}


if (isset($_POST['signin'])) {

    $errors = validateLogin($_POST);

    // login user actions
    include_once(ROOT."/private/actions/loginUser.php");

}