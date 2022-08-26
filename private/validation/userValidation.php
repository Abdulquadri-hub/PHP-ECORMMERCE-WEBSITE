<?php

function validateUser($user)
{
    $errors = array();

    if (empty($user['firstname']) || !preg_match("/^[a-zA-Z0-9]+$/",$user['firstname'])) {
        
        $errors['firstname'] = "Only letters & numbers is allowed in firstname";
    }
    if (empty($user['lastname']) || !preg_match("/^[a-zA-Z0-9]+$/",$user['lastname'])) {
        
        $errors['lastname'] = "Only letters & numbers is allowed in lastname";
    }
    if (empty($user['email']) || !filter_var( $user['email'],FILTER_VALIDATE_EMAIL)) {
            
        $errors['email'] = "E-mail is not valid ";
    }
    if (empty($user['password']) || $user['password'] != $user['password2']) {
        
        $errors['password'] = "The pasword do not match";
    }
    if (strlen($user['password']) < 8 ) {
        
        $errors['password'] = "Password must be at least 8 character long";
    }
    $existsEmail = selectOne('customers', ['email'=>$user['email']]);
    if ($existsEmail) {
        $errors['email'] = "User email Already Exists";
        // if (isset($user['updateUser']) && $existsEmail['id'] != $user['id']) {
        //     $errors['email'] = "User email Already Exists";
        // }

        // if (isset($user['createAdmin'])) {
        //     $errors['email'] = "users name Already Exists";
        // }
    }

    return $errors;
}


function validateLogin($user)
{
    $errors = array();

    if (empty($user['email']) || !filter_var($user['email'],FILTER_VALIDATE_EMAIL)) {
        
        $errors['email'] = "Email is required";
    }
    if (empty($user['password'])) {
        
        $errors['password'] = "pasword is required";
    }
    return $errors;
}

