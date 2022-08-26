<?php

function LoginFirst($redirect = "login") {
    if (empty(isset($_SESSION['id']))){
        $_SESSION['message'] = "Login First";
        header('location: '.BASEURL.$redirect);
        exit;
    }
    return false;
}

function onlyAdmin($redirect = "index"){
    if (empty($_SESSION['admin'] == 1)) {
        header('location: '.BASEURL.$redirect);
        exit;
    }
    return false;
}

function onlyUser($redirect = "admin/dashboard"){
    if (isset($_SESSION['id']) || isset($_SESSION['admin'])) {
        header('location: '.BASEURL.$redirect);
        exit;
    }
    return false;
}
