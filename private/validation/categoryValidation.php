
<?php

#category
function validateCategory($category)
{
    $errors = array();

    if (empty($category['name']) || !preg_match("/^[a-z A-Z]+$/",$category['name'])) 
    {
        $errors['name'] = "Only letters is allowed in category name";
    }
    
    if (empty($category['meta_title'])) {
        
        $errors['meta_title'] = "category metatitle is required";
    }

        
    if (empty($category['description'])) {
        
        $errors['description'] = "category description is required";
    }

    if (empty($category['meta_description'])) {
        
        $errors['meta_description'] = "category metadescription is required";
    }

    if (empty($category['meta_keyword'])) {
        
        $errors['meta_keyword'] = "category meta keyword is required";
    }

    if (empty($category['slug'])) {
        
        $errors['slug'] = "category slug is required";
    }

    $categoryExists = selectOne('category', ['name'=>$category['name']]);
    if ($categoryExists) {
        if (isset($category['updateCategory']) && $categoryExists['id'] != $category['id']) {
            $errors['name'] = "category name Already Exists";
        }

        if (isset($category['addCategory'])) {
            $errors['name'] = "category name Already Exists";
        }
    }

    return $errors;
}