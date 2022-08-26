<?php


// IP ADDRESS
/* Many times we need to get the IP address of the visitor for different purposes. It is very easy to collect the IP address in PHP. PHP provides PHP $_SERVER variable to get the user IP address easily. We can track the activities of the visitor on the website for the security purpose, or we can know that who uses my website and many more.

The simplest way to collect the visitor IP address in PHP is the REMOTE_ADDR. Pass the 'REMOTE_ADDR' in PHP $_SERVER variable. It will return the IP address of the visitor who is currently viewing the webpage.*/

// function getIPAddress() {  
//     //whether ip is from the share internet  
//     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
//         $ip = $_SERVER['HTTP_CLIENT_IP'];  
//     }  
//     //whether ip is from the proxy  
//     elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
//         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
//     }  
//     //whether ip is from the remote address  
//     else{  
//         $ip = $_SERVER['REMOTE_ADDR'];  
//     }  
//     return $ip;  
// }  

if (count($errors) === 0) 
{
    $userIpAddress = getIPAddress();
    unset($_POST['signup'], $_POST['password2']);
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $_POST['user_ip_address'] = $userIpAddress;
    if (isset($_POST['admin'])) {
        $_POST['admin'] = 1 ;
        $customerId = create($table, $_POST);
        $_SESSION['message'] = "Admin created successfully";
        redirect("admin/user/home");
    }else {
        $_POST['admin'] = 0 ;
        $customerId = create($table, $_POST);
        $cartItems = selectAll('cart',['ip_address'=>$userIpAddress]);
        if ($cartItems) {
            redirect("checkout");
        }else {
            $customer = selectOne($table,['id'=>$customerId]);
            loginUser($customer);
        }
    }
}