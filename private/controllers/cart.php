<?php

// cart 
function cart()
{
    global $conn;
    if (isset($_GET['cart'])) {
        $ip = getIPAddress();  
        $productSlug = $_GET['cart'];
        $cartExists = selectAll('cart',['product_slug' => $productSlug, 'ip_address' =>$ip]);
        if(!$cartExists)
        {
            $cart = create('cart',['product_slug' => $productSlug, 'ip_address' =>$ip]);
        } else {
            redirect("index");
        }
    }
}

function cartItem()
{
    global $conn;
    if (isset($_GET['cart'])) {
        $ip = getIPAddress();  
        $query = "select * from cart where ip_address = ?";
        $query = executeQuery($query, ['ip_address'=>$ip]);
        $rows = $query->get_result();
        $count = $rows->num_rows;
        return $count; 
    } else{
        $ip = getIPAddress();  
        $query = "select * from cart where ip_address = ?";
        $query = executeQuery($query, ['ip_address'=>$ip]);
        $rows = $query->get_result();
        $count = $rows->num_rows;
        return $count;
}
}

// total price not yet working...
function totalCartPrice()
{
    global $conn;
    $ip = getIPAddress(); 
    $totalPrice = 0;
    $query = "select c.*, p.price from cart as c join products as p on c.product_slug = p.slug where ip_address = '$ip'";
    $result = mysqli_query($conn,$query);
    while ($row = mysqli_fetch_array($result)) {
        $productPrice = array($row['price']);
        $ProductValues = array_sum($productPrice);
        $totalPrice += $ProductValues;
    }
    return $totalPrice;
}

// get all carted product
function getAllCartProducts(){
    global $conn;
    $ip = getIPAddress(); 
    $query = "select c.*, p.price, p.image, p.name from cart as c join products as p on c.product_slug = p.slug where ip_address = ?";
    $stmt = executeQuery($query,['ip_address'=>$ip]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

cart();
$allCarts = getAllCartProducts();
$cartPrice = totalCartPrice();
$cartItem = cartItem();

// update cart
if (isset($_POST['updateCart'])) {
    $ip = getIPAddress();
    $cartPrice = totalCartPrice();
    unset($_POST['delete'], $_POST['updateCart']);
    $quantity = $_POST['qty'];
    $query = "update cart set quantity = ? where ip_address = ?";
    if(executeQuery($query,['quantity'=>$quantity, 'ip_address'=>$ip])){
        $cartPrice = $cartPrice * $quantity;
        return $cartPrice;
        // echo "<script>window.open('cart','_self')</script>";
    }
}

// delete cart
function removeCart(){
    if (isset($_POST['remove'])) {
        unset($_POST['qty'],$_POST['delete'],$_POST['remove']);
        foreach ($_POST['removeCart'] as $remove_slug) {
        // echo $remove_slug;
        $query = "delete from cart where product_slug = ?";
        if(executeQuery($query,['product_slug'=>$remove_slug])){
            echo "<script>window.open('cart','_self')</script>";
        }
        }
    }
}
removeCart();