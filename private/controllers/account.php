<?php
require_once(ROOT."/private/models/dbFunctions.php");
require_once(ROOT."/private/core/helper.php");

$accounts = selectOne('customers',['id'=>$_SESSION['id']]);

if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    $userEdit = selectOne('customers',['id'=>$userId]);
    $firstname = $userEdit['firstname'];
    $lastname = $userEdit['lastname'];
    $email = $userEdit['email'];
    $id = $userEdit['id'];
}

if (isset($_POST['editAccount'])) {
    unset($_POST['editAccount']);
    $editId = update('customers',$userId,$_POST);
    redirect("user/account/home");
}

if (isset($_POST['delete'])) {
    unset($_POST['delete']);
    $id = $_SESSION['id'];
    $deleteUser = delete('customers',$id);
    session_destroy();
    redirect("index");
    // show($deleteUser);
}