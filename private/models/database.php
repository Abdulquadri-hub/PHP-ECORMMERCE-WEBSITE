<?php

define("SERVER", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DBNAME", "ecommerce");

$conn = mysqli_connect(SERVER,USER,PASSWORD,DBNAME);

if (empty($conn)) {
    die("connection failed");
}