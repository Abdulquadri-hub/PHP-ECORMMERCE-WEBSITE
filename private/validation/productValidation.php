
<?php

#product
function validateProduct($product)
{
    $errors = array();

    if (empty($product['name']) || !preg_match("/^[a-z A-Z]+$/",$product['name'])) 
    {
        $errors['name'] = "Only letters is allowed in product name";
    }
    
    if (empty($product['meta_title'])) {
        
        $errors['meta_title'] = "product metatitle is required";
    }

        
    if (empty($product['description'])) {
        
        $errors['description'] = "product description is required";
    }

    if (empty($product['meta_description'])) {
        
        $errors['meta_description'] = "product metadescription is required";
    }

    if (empty($product['meta_keyword'])) {
        
        $errors['meta_keyword'] = "product meta keyword is required";
    }

    if (empty($product['slug'])) {
        
        $errors['slug'] = "product slug is required";
    }

    if (empty($product['price']) || !preg_match("/[0-9]/",$product['price'])) {
        
        $errors['price'] = "Only numbers is allowed in product price";
    }

    $productExists = selectOne('products', ['name' => $product['name']]);
    if ($productExists) {
        if ($productExists) {
            if (isset($product['updateProduct']) && $productExists['id'] != $product['id']) {
                $errors['name'] = "product name Already Exists";
            }
    
            if (isset($product['addProduct'])) {
                $errors['name'] = "product name Already Exists";
            }
        }
    }

    return $errors;
}