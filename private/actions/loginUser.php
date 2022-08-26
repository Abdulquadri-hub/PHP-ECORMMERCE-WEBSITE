<?php

if (count($errors) === 0) {
    unset($_POST['signin']);
    $customer = selectOne($table, ['email'=> $_POST['email']]);
    if ($customer && password_verify($_POST['password'], $customer['password'])) {
        loginUser($customer);
    }else {
        array_push($errors, "Invalid Login Details");
    }
}