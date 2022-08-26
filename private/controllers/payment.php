<?php
require_once(ROOT."/private/models/dbFunctions.php");
require_once(ROOT."/private/core/helper.php");

$user_ipAddress = getIPAddress();
$user = selectOne('customers', ['user_ip_address'=>$user_ipAddress]);
$users = selectAll('payment');