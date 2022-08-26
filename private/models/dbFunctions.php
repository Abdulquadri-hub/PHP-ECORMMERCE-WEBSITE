<?php
require "database.php";
require_once(ROOT."/private/core/helper.php");
function show($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    die();
}

function executeQuery($query, $data)
{
    global $conn;
    $stmt = $conn->prepare($query);
    $values = array_values($data); 
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}

function selectAll($table, $conditions=[])
{
    global $conn;
    $query = "select * from $table";
    if(empty($conditions))
    {
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        $i = 0;
        foreach ($conditions as $key => $value) 
        {
            if ($i === 0) {
                $query = $query . " where $key=?";
            }else {
                $query = $query . " and $key=?";
            }
            $i++;
        }
        $stmt = executeQuery($query, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
    }

    function selectOne($table, $conditions)
    {
        global $conn;
        $query = "select * from $table";
        $i = 0;
        foreach ($conditions as $key => $value) 
        {
            if ($i === 0) {
                $query = $query . " WHERE $key=?";
            }else {
                $query = $query . " AND $key=?";
            }
            $i++;
        }
        $query = $query . " LIMIT 1";
        $stmt = executeQuery($query, $conditions);
        $record = $stmt->get_result()->fetch_assoc();
        return $record;
    }


    function create($table,$data)
    {
        global $conn;
        $query = "insert into $table set ";
        $i = 0;
        foreach ($data as $key => $value) 
        {
            if ($i === 0) {
                $query = $query . " $key=?";
            }else {
                $query = $query . ", $key=?";
            }
            $i++;
        }
        $stmt = executeQuery($query, $data);
        $id = $stmt->insert_id;
        return $id;
    }

    function update($table, $id, $data)
    {
        global $conn;
        $query = "update $table set ";
        $i = 0;
        foreach ($data as $key => $value) 
        {
            if ($i === 0) {
                $query = $query . " $key=?";
            }else {
                $query = $query . ", $key=?";
            }
            $i++;
        }
        $query = $query . " where id=?";
        $data['id'] = $id;
        $stmt = executeQuery($query, $data);
        return $stmt->affected_rows;
    }

function delete($table, $id)
{
    global $conn;
    $query = "delete from $table where id=?";

    $stmt = executeQuery($query, ['id' => $id]);
    return $stmt->affected_rows;
}

// admin select
function getCategory()
{
    global $conn;
    $userId = $_SESSION['id'];
    $query = "select * from category where user_id = ? order by created_at desc";
    $stmt = executeQuery($query, ['id'=>$userId]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getProduct()
{
    global $conn;
    $userId = $_SESSION['id'];
    $query = "select * from products where user_id = ? order by created_at desc";
    $stmt = executeQuery($query, ['id'=>$userId]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getBrand()
{
    global $conn;
    $userId = $_SESSION['id'];
    $query = "select * from brand where user_id = ? order by created_at desc";
    $stmt = executeQuery($query, ['id'=>$userId]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getCustomer()
{
    global $conn;
    if($brands = selectAll('customers')){
        return $brands;
    }else {
        return false;
    }
}

// Homepage select
$search = $_GET['search'] ?? null;
function getUniqueProduct()
{
    global $conn;
    if (!isset($_GET['search'])) {
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $query = "select * from products order by rand() limit 0,9";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }else {
            if (isset($_GET['brand'])) {
                $brandSlug = $_GET['brand'];
                $query = "select b.*, p.name, p.slug, p.image, p.description, p.price from brand as b join products as p on b.id = p.brand_id where b.slug = ?";
                $stmt = executeQuery($query, ['slug'=>$brandSlug]);
                $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                return $records;
            }
        }
    }else {
        if (isset($_GET['category'])) {
            $categorySlug = $_GET['category'];
            $query = "select c.*, p.name, p.slug, p.image, p.description, p.price from category as c join products as p on c.id = p.category_id where c.slug = ?";
            $stmt = executeQuery($query, ['slug'=>$categorySlug]);
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }
    }
} else {
    if (isset($_GET['search'])) 
    {
    $search = $_GET['search'];
     $query = "select * from products where meta_keyword like ?";
    $stmt = executeQuery($query, ['meta_keyword'=>"%$search%"]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
    }
}
}

function getProductDetails()
{
    global $conn;
    if (isset($_GET['product'])) {
        $productSlug = $_GET['product'];
            $query = "select * from products  where slug = ?  limit 0,1";
            $stmt = executeQuery($query, ['slug'=>$productSlug]);
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
    }  else {
        if (isset($_GET['search'])) 
        {
        $search = $_GET['search'];
         $query = "select * from products where meta_keyword like ?";
        $stmt = executeQuery($query, ['meta_keyword'=>"%$search%"]);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
        }
    }
}

// IP ADDRESS
/* Many times we need to get the IP address of the visitor for different purposes. It is very easy to collect the IP address in PHP. PHP provides PHP $_SERVER variable to get the user IP address easily. We can track the activities of the visitor on the website for the security purpose, or we can know that who uses my website and many more.

The simplest way to collect the visitor IP address in PHP is the REMOTE_ADDR. Pass the 'REMOTE_ADDR' in PHP $_SERVER variable. It will return the IP address of the visitor who is currently viewing the webpage.*/

function getIPAddress() {  
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    //whether ip is from the remote address  
    else{  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
}  

$brands = selectAll('brand');
$categorys = selectAll('category');
$products = getUniqueProduct();
$productDetails = getProductDetails();
