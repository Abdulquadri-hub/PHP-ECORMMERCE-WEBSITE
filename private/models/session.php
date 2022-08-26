<?php
function loginUser($customer)
{
    $_SESSION['auth'] = true;
    $_SESSION['id'] = $customer['id'];
    $_SESSION['admin'] = $customer['admin'];
    $_SESSION['firstname'] = $customer['firstname'];
    $_SESSION['lastname'] = $customer['lastname'];
    $_SESSION['email'] = $customer['email'];
    $_SESSION['user_ip_address'] = $customer['user_ip_address'];
    $_SESSION['expire'] = time();
    $_SESSION['message'] = "Welcome";
    if ($_SESSION['admin'] == 1) {
        redirect("admin/dashboard");
    }else {
        $cartItems = selectAll('cart',['ip_address'=>$_SESSION['user_ip_address']]);
        if ($cartItems) {
            redirect("payment");
        }else {
            redirect("user/dashboard");
        }
        }
}