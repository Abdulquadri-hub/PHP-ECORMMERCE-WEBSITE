<?php

// clean slug url
function slug($string){
    $string = preg_replace("/[^A_Za-z0-9\-]/", "-",$string);
    $string = str_replace(' ', "-",$string);
    $string = trim($string); //trim white spaces
    $string = strtolower($string); //string to lower case
    return $string;
}

// getRandom string
function randomString($n) 
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for($i = 0; $i < $n; $i++) { 
        
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }
    return $str;
}
// get avlue

function getValue($key,$default = "")
{
    if (isset($_POST[$key])) {
        return $_POST[$key];
    }
    return $default;
}


function get_Date($date)
{
    return date("jS M, Y",strtotime($date));
}

function redirect($link)
{
    header("location: ". BASEURL. trim($link,"/"));
    die;
}

function getSelect($key,$value)
{
    if (isset($_POST[$key])) {

        if ($_POST[$key] == $value)
        {
            return "selected";
        }
        return "";
    }

}

function esc($var)
{
    return htmlspecialchars($var);
} 

