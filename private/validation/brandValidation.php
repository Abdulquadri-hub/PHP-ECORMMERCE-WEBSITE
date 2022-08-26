
<?php

#brand
function validatebrand($brand)
{
    $errors = array();

    if (empty($brand['name']) || !preg_match("/^[a-z A-Z]+$/",$brand['name'])) 
    {
        $errors['name'] = "Only letters is allowed in brand name";
    }
    
    if (empty($brand['meta_title'])) {
        
        $errors['meta_title'] = "brand metatitle is required";
    }

        
    if (empty($brand['description'])) {
        
        $errors['description'] = "brand description is required";
    }

    if (empty($brand['meta_description'])) {
        
        $errors['meta_description'] = "brand metadescription is required";
    }

    if (empty($brand['meta_keyword'])) {
        
        $errors['meta_keyword'] = "brand meta keyword is required";
    }

    if (empty($brand['slug'])) {
        
        $errors['slug'] = "brand slug is required";
    }

    $brandExists = selectOne('brand', ['name'=>$brand['name']]);
    if ($brandExists) {
        if (isset($brand['updateBrand']) && $brandExists['id'] != $brand['id']) {
            $errors['name'] = "brand name Already Exists";
        }

        if (isset($brand['addBrand'])) {
            $errors['name'] = "brand name Already Exists";
        }
    }

    return $errors;
}